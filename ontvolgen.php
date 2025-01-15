<?php

require 'config.php';

session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
    exit;
}

$huidige_gebruiker = $_SESSION['user_name'];
$profiel_naam = isset($_POST['gevolgd']) ? trim($_POST['gevolgd']) : null;

if (!$profiel_naam) {
    echo "Geen profielnaam opgegeven.";
    exit;
}

// Verwijder de volg relatie
$sql_ontvolgen = "DELETE FROM volgend WHERE naam1 = :volger AND naam2 = :gevolgd";
$stmt_ontvolgen = $conn->prepare($sql_ontvolgen);
$stmt_ontvolgen->execute([':volger' => $huidige_gebruiker, ':gevolgd' => $profiel_naam]);

// Redirect terug naar het profiel
header("Location: profiel.php?naam=" . urlencode($profiel_naam));
exit;

