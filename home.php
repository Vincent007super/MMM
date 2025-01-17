<?php
require 'config.php'; // Your database connection file

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$Artiest_rows = [];
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Artiest = $conn->query("SELECT * FROM Artiest");

if (!$Artiest || $Artiest->num_rows === 0) {
    die("Geen artiesten gevonden.");
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

while ($artiest_row = $Artiest->fetch_assoc()) {
    $nummers = getnummersByArtiest($conn, $artiest_row['gebrID']);
    $Artiest_rows[] = [
        'Artiest' => $artiest_row,
        'nummers' => $nummers ? $nummers->fetch_all(MYSQLI_ASSOC) : [],
    ];
}

$random_nummers = getRandomnummers($conn);
$conn->close();
include 'views/home_view.php';
