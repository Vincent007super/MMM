<?php
require 'config.php'; // Your database connection file

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Start de sessie

if (!isset($_SESSION['user_name'])) {
    header('Location: login.php'); // Stuur niet-ingelogde gebruikers naar login
    exit;
}
$profiel_naam = $_SESSION['user_name'];
// Connect to the database

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Artiest = $conn->query("SELECT * FROM Artiest");

if (!$Artiest || $Artiest->num_rows === 0) {
    die("Geen Artiesten gevonden.");
}

function getnummersByArtiest($conn, $gebrID, $limit = 6) {
    $sql = "SELECT * FROM nummers WHERE gebrID = '$gebrID' LIMIT $limit";
    return $conn->query($sql);
}

function getRandomnummers($conn, $limit = 4) {
    $sql = "SELECT nummers.*, Artiest.artname AS artname 
            FROM nummers 
            JOIN Artiest ON nummers.gebrID = Artiest.gebrID 
            ORDER BY RAND() LIMIT $limit";
    return $conn->query($sql);
}
// Prepare the data for the page
$Artiest_rows = [];
while ($Artiest_row = $Artiest->fetch_assoc()) {
    $nummers = getnummersByArtiest($conn, $Artiest_row['gebrID']);
    $Artiest_rows[] = [
        'Artiest' => $Artiest_row,
        'nummers' => $nummers ? $nummers->fetch_all(MYSQLI_ASSOC) : [],
    ];
}


// Fetch random nummers
$random_nummers = getRandomnummers($conn);
$conn->close();
include 'views/home_view.php';
