<?php
require 'config.php'; // Your database connection file

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$Artiest_rows = [];
// Connect to the database
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all Artiest
$Artiest = $conn->query("SELECT * FROM Artiest");

// Function to fetch random nummers for an Artiest
function getnummersByArtiest($conn, $gebrID, $limit = 6) {
    $sql = "SELECT * FROM nummers WHERE gebrID = $gebrID LIMIT $limit";
    return $conn->query($sql);
}

// Function to fetch random nummers
function getRandomnummers($conn, $limit = 4) {
    $sql = "SELECT nummers.*, Artiest AS artname 
            FROM nummers 
            JOIN Artiest ON nummers.gebrID = Artiest.gebrID 
            ORDER BY RAND() LIMIT $limit";
    return $conn->query($sql);
}

// Prepare the data for the page
if ($Artiest) {

    if (empty($Artiest_rows)) {
        die("Geen artiesten gevonden.");
    }

    while ($Artiest_rows = $Artiest->fetch_assoc()) {
        $nummers = getnummersByArtiest($conn, $artiest_row['gebrID']);
        $Artiest_rows[] = [
            'Artiest' => $artiest_row,
            'nummers' => $nummers ? $nummers->fetch_all(MYSQLI_ASSOC) : [],
            'image' => $artiest_row['image_data'], // Controleer of deze kolom bestaat
        ];
    }
} else {
    die("Fout bij ophalen van artiesten: " . $conn->error);
}
// Fetch random nummers
$random_nummers = getRandomnummers($conn);

// Close connection
$conn->close();

include 'views/home_view.php';