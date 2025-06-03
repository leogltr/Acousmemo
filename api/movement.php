<?php

// Récupération des données POST
$premiereCarte = $_POST['premiereCarte'] ?? null;
$carte = $_POST['carte'] ?? null;

// Vérification des paramètres
if (empty($premiereCarte) || empty($carte)) {
    http_response_code(400);
    echo json_encode(['message' => 'Paramètres manquants']);
    exit;
}

try {
    // Préparer et exécuter la requête d'insertion
    $query = "INSERT INTO association (id_sound_first, id_sound_second) VALUES (:id_sound_first, :id_sound_second)";
    $stmt = $pdo->prepare($query);
    
    if($premiereCarte < $carte)
    {
        $stmt->bindValue(':id_sound_first', $premiereCarte);
        $stmt->bindValue(':id_sound_second', $carte);
    }
    else
    {
        $stmt->bindValue(':id_sound_first', $carte);
        $stmt->bindValue(':id_sound_second', $premiereCarte);
    }
    
    if ($stmt->execute()) {
        $gameId = $pdo->lastInsertId();
        http_response_code(201);
        echo json_encode([
            'message' => 'Movement created successfully',
            'id' => $gameId
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['message' => 'Erreur lors de la création de movement']);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>