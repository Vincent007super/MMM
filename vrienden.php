<?php
require 'config.php';
session_start();
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

// Als er geen gebruikers zijn die je volgt of hebt geblokkeerd
if (empty($volgende_gebruikers) && empty($geblokkeerde_gebruikers)) {
    echo "Je volgt momenteel geen gebruikers en hebt geen gebruikers geblokkeerd.";
    exit;
}

include 'views/vrienden_view.php'
?>