<?php
$host = "localhost";
$dbname = "boutique_db";
$user = "root";
$pass = "";

try {
    $cnx = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
