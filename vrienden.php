<?php
require 'config.php';
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
    exit;
}

$huidige_gebruiker = $_SESSION['user_name'];

// Ophalen van de gebruikers die de huidige gebruiker volgt
$sql_volgend = "SELECT u.naam FROM volgend v 
                JOIN Gebruiker u ON v.naam2 = u.naam 
                WHERE v.naam1 = :volger";
$stmt_volgend = $conn->prepare($sql_volgend);
$stmt_volgend->execute([':volger' => $huidige_gebruiker]);
$volgende_gebruikers = $stmt_volgend->fetchAll();

// Ophalen van de gebruikers die de huidige gebruiker heeft geblokkeerd
$sql_geblokkeerd = "SELECT u.naam FROM blocked_users b
                    JOIN Gebruiker u ON b.naam2 = u.naam
                    WHERE b.naam1 = :blokker";
$stmt_geblokkeerd = $conn->prepare($sql_geblokkeerd);
$stmt_geblokkeerd->execute([':blokker' => $huidige_gebruiker]);
$geblokkeerde_gebruikers = $stmt_geblokkeerd->fetchAll();

// Zoekfunctionaliteit
$zoek_resultaten = [];
$zoekterm = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $zoekterm = isset($_POST['zoekterm']) ? trim($_POST['zoekterm']) : '';

    if (!empty($zoekterm)) {
        // Zoek in de database naar gebruikersnamen die overeenkomen
        $sql_zoek = "SELECT naam FROM Gebruiker WHERE naam LIKE :zoekterm";
        $stmt = $conn->prepare($sql_zoek);
        $stmt->execute([':zoekterm' => "%$zoekterm%"]);
        $zoek_resultaten = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

include 'views/vrienden_view.php'
?>