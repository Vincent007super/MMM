<?php
require 'config.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
    exit;
}

$huidige_gebruiker = $_SESSION['user_name'];
$profiel_naam = isset($_GET['naam']) ? trim($_GET['naam']) : null;

if (!$profiel_naam) {
    echo "Geen profielnaam opgegeven.";
    exit;
}

// Controleer of de gebruiker het eigen profiel bekijkt
$is_huidige_gebruiker = $huidige_gebruiker === $profiel_naam;

// Ophalen van de profielinformatie (bijv. naam, foto, bio)
$sql_profiel = "SELECT * FROM Gebruiker WHERE naam = :naam";
$stmt_profiel = $conn->prepare($sql_profiel);
$stmt_profiel->execute([':naam' => $profiel_naam]);

// Controleer of het profiel bestaat
$profiel = $stmt_profiel->fetch();

if (!$profiel) {
    echo "Profiel niet gevonden.";
    exit;
}

// Controleer of de gebruiker wordt gevolgd
$sql_volgend = "SELECT * FROM volgend WHERE naam1 = :volger AND naam2 = :gevolgd";
$stmt_volgend = $conn->prepare($sql_volgend);
$stmt_volgend->execute([':volger' => $huidige_gebruiker, ':gevolgd' => $profiel_naam]);
$volgend = $stmt_volgend->fetch() !== false;

// Controleer of de gebruiker is geblokkeerd
$sql_geblokkeerd = "SELECT * FROM blocked_users WHERE naam1 = :blokker AND naam2 = :geblokkeerde";
$stmt_geblokkeerd = $conn->prepare($sql_geblokkeerd);
$stmt_geblokkeerd->execute([':blokker' => $huidige_gebruiker, ':geblokkeerde' => $profiel_naam]);
$geblokkeerd = $stmt_geblokkeerd->fetch() !== false;

// Geef de profielgegevens door aan de view
include 'views/profiel_view.php';
?>
