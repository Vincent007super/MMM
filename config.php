<?php
$host = '127.0.0.1';
$db = 'MMM_data'; // Vervang dit door je databasenaam
$user = 'glr100193'; // Vervang dit door je gebruikersnaam
$pass = 'A13cd3Man'; // Vervang dit door je wachtwoord
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $conn = new PDO('mysql:host=localhost;dbname=MMM_data;charset=utf8mb4', 'glr100193', 'A13cd3Man');
    echo "Verbonden met de database!";
} catch (PDOException $e) {
    echo "Fout bij verbinding: " . $e->getMessage();
}
