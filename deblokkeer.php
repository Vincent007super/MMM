<?php
require 'config.php';

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

// Verwijder de blokkering
$sql_deblokkeer = "DELETE FROM blocked_users WHERE naam1 = :blokker AND naam2 = :geblokkeerde";
$stmt_deblokkeer = $conn->prepare($sql_deblokkeer);
$stmt_deblokkeer->execute([':blokker' => $huidige_gebruiker, ':geblokkeerde' => $profiel_naam]);

// Redirect terug naar het profiel
header("Location: profiel.php?naam=" . urlencode($profiel_naam));
exit;
?>
