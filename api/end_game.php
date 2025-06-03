<?php
//create a game in the database and return the game id (	id	id_user	nb_move	score	)

$user_id = $_POST['user'] ?? null;
$nb_move = $_POST['nbMoves'] ?? 0;
$score = $_POST['score'] ?? 0;

if (empty($user_id)) {
    http_response_code(400);
    echo json_encode(array('message' => 'User id manquant'));
    exit;
}

$query = "INSERT INTO game (id_user, nb_move, score) VALUES (:id_user, :nb_move, :score)";
$stmt = $pdo->prepare($query);

$stmt->bindParam(':id_user', $user_id);
$stmt->bindParam(':nb_move', $nb_move);
$stmt->bindParam(':score', $score);

if ($stmt->execute()) {
    $gameId = $pdo->lastInsertId();

    $response = array(
        'message' => 'Game created successfully',
        'id' => $gameId
    );

    $query2 = "INSERT INTO pair (id_sound, id_game, nb_error, found_order) VALUES (:id_sound, :id_game, :nb_error, :found_order)";

    $stmt2 = $pdo->prepare($query2);

    //string to array  error
        $erreur = json_decode($_POST['errors'], true);
        foreach ($erreur as $id_sound => $data) {
            // Utilisez l'ID du son et les données correspondantes
            $stmt2->bindParam(':id_sound', $id_sound);
            $stmt2->bindParam(':id_game', $gameId);
            $stmt2->bindParam(':nb_error', $data['error']);
            $stmt2->bindParam(':found_order', $data['find']);
            $stmt2->execute();
        }
    
    http_response_code(201);
    echo json_encode($response);
} else {
    http_response_code(500);
    echo json_encode(array('message' => 'Error creating game'));
}
