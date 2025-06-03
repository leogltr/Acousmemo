<?php
$query = "SELECT * FROM sound ORDER BY RAND()";
$stmt = $pdo->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$cartes = array_slice($result, 0, 8);


if ($cartes) {
    header('Content-Type: application/json');
    echo json_encode($cartes);
} else {
    http_response_code(404);
    echo json_encode(array('message' => 'Sound data not found'));
}
