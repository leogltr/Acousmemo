<?php
if (empty($_POST['pseudo'])) {
    http_response_code(400);
    echo json_encode(array('message' => 'Pseudo manquant'));
    exit;
}

// Récupérer les données postées et nettoyer les espaces superflus
$pseudo = trim($_POST['pseudo']);
$genre = $_POST['genre'] ?? null;
$age = $_POST['age'] ?? null;
$instrument = $_POST['instrument'] ?? null;
$solfege = $_POST['solfege'] ?? null;
$musique = $_POST['musique'] ?? null;
$pathologie = $_POST['pathologie'] ?? null;

// Préparer la requête SQL pour insérer l'utilisateur
$query = "INSERT INTO user (pseudo, genre, age, instrument, solfege, musique, pathologie) VALUES (:pseudo, :genre, :age, :instrument, :solfege, :musique, :pathologie)";
$stmt = $pdo->prepare($query);

// Lier les paramètres
$stmt->bindParam(':pseudo', $pseudo);
$stmt->bindParam(':genre', $genre);
$stmt->bindParam(':age', $age);
$stmt->bindParam(':instrument', $instrument);
$stmt->bindParam(':solfege', $solfege);
$stmt->bindParam(':musique', $musique);
$stmt->bindParam(':pathologie', $pathologie);

// Exécuter la requête
if ($stmt->execute()) {
    // Récupérer l'ID de l'utilisateur créé
    $utilisateurId = $pdo->lastInsertId();

    // Préparer la réponse JSON
    $reponse = array(
        'message' => 'Utilisateur créé avec succès',
        'id' => $utilisateurId
    );

    http_response_code(201);
    echo json_encode($reponse);
} else {
    // Erreur lors de l'insertion de l'utilisateur
    http_response_code(500);
    echo json_encode(array('message' => 'Erreur lors de la création de l\'utilisateur'));
}