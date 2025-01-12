<?php
require 'config.php';

session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
    exit;
}

$huidige_gebruiker = $_SESSION['user_name'];
$gevolgd = isset($_POST['gevolgd']) ? trim($_POST['gevolgd']) : null;

if (!$gevolgd) {
    echo "Geen gebruiker opgegeven om te volgen.";
    exit;
}

// Voeg de volger toe in de database
$sql_volgen = "INSERT INTO volgend (naam1, naam2) VALUES (:volger, :gevolgd)";
$stmt_volgen = $conn->prepare($sql_volgen);
$stmt_volgen->execute([':volger' => $huidige_gebruiker, ':gevolgd' => $gevolgd]);

// Redirect naar het profiel
header('Location: profiel.php?naam=' . urlencode($gevolgd));
exit;
?>
