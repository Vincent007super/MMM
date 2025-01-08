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
$profiel_naam = isset($_POST['geblokkeerde']) ? trim($_POST['geblokkeerde']) : null;

if (!$profiel_naam) {
    echo "Geen profielnaam opgegeven.";
    exit;
}

// Voeg de blokkering toe
$sql_blokkeer = "INSERT INTO blocked_users (naam1, naam2) VALUES (:blokker, :geblokkeerde)";
$stmt_blokkeer = $conn->prepare($sql_blokkeer);
$stmt_blokkeer->execute([':blokker' => $huidige_gebruiker, ':geblokkeerde' => $profiel_naam]);

// Verwijder de volg relatie, want je blokkeert deze persoon
$sql_ontvolgen = "DELETE FROM volgend WHERE naam1 = :volger AND naam2 = :gevolgd";
$stmt_ontvolgen = $conn->prepare($sql_ontvolgen);
$stmt_ontvolgen->execute([':volger' => $huidige_gebruiker, ':gevolgd' => $profiel_naam]);

// Redirect terug naar het profiel
header("Location: profiel.php?naam=" . urlencode($profiel_naam));
exit;
?>
