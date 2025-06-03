<?php
$queries = [
    "SELECT id_sound, AVG(nb_error) AS avg_error_count
    FROM pair
    WHERE found_order <> -1
    GROUP BY id_sound
    ORDER BY avg_error_count ASC;",

    "SELECT id_sound, AVG(found_order) AS avg_found_order
    FROM pair
    WHERE found_order <> -1
    GROUP BY id_sound
    ORDER BY avg_found_order ASC;",

    "SELECT AVG(nb_error) AS avg_error_count, AVG(found_order) AS avg_order_found
    FROM pair
    WHERE found_order <> -1;",

    "SELECT AVG(nb_move) AS avg_moves
    FROM game;",

    "SELECT AVG(score) AS avg_time_seconds
    FROM game;",

    "SELECT COUNT(*) AS total_games
    FROM game;",

    "SELECT p.id_sound, AVG(g.score) AS avg_time
    FROM pair p
    JOIN game g ON p.id_game = g.id
    WHERE p.found_order <> -1
    GROUP BY p.id_sound
    ORDER BY avg_time ASC;",

    "SELECT p.id_sound, AVG(g.nb_move) AS avg_move
    FROM pair p
    JOIN game g ON p.id_game = g.id
    GROUP BY p.id_sound
    ORDER BY avg_move ASC;",

    "SELECT id_sound, COUNT(*) AS found_by_chance_count
    FROM pair
    WHERE found_order = -1
    GROUP BY id_sound
    ORDER BY found_by_chance_count DESC;",

    "SELECT u.genre, COUNT(u.id) AS user_count
    FROM game g
    JOIN user u ON g.id_user = u.id
    GROUP BY u.genre;",

    "SELECT u.age, COUNT(u.id) AS user_count
    FROM game g
    JOIN user u ON g.id_user = u.id
    GROUP BY u.age;",

    "SELECT u.genre, AVG(g.score) AS avg_speed
    FROM game g
    JOIN user u ON g.id_user = u.id
    GROUP BY u.genre;",

    "SELECT u.age, AVG(g.score) AS avg_speed
    FROM game g
    JOIN user u ON g.id_user = u.id
    GROUP BY u.age;",

    "SELECT u.genre, AVG(g.nb_move) AS avg_move
        FROM game g
        JOIN user u ON g.id_user = u.id
        GROUP BY u.genre;",

    "SELECT u.age, AVG(g.nb_move) AS avg_move
        FROM game g
        JOIN user u ON g.id_user = u.id
        GROUP BY u.age;",

    "SELECT * FROM sound"
];

$results = [];

foreach ($queries as $query) {
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $results[] = $result;
}

header('Content-Type: application/json');
echo json_encode($results);
