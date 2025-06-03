<?php
// db_config.php

$host = "localhost";
$db_name = "bdd_memoteam2"; // Remplacez par le nom de votre base de données
$username = "lgaultier"; // Remplacez par votre nom d'utilisateur MySQL
$password = "f4Rk9iQ771"; // Remplacez par votre mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>