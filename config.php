<?php
// Informations de connexion à la base de données
$host = "localhost"; // Adresse de l'hôte de la base de données
$dbName = "budget"; // Nom de la base de données
$username = "root"; // Nom d'utilisateur de la base de données


// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
