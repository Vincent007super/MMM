<?php
// include 'config.php'; // Your database connection file

// // Connect to the database
// $conn = new mysqli($host, $user, $pass, $db);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Fetch all artists
// $artists = $conn->query("SELECT * FROM artists");

// // Function to fetch random songs for an artist
// function getSongsByArtist($conn, $artist_id, $limit = 6) {
//     $sql = "SELECT * FROM songs WHERE artist_id = $artist_id LIMIT $limit";
//     return $conn->query($sql);
// }

// // Function to fetch random songs
// function getRandomSongs($conn, $limit = 4) {
//     $sql = "SELECT songs.*, artists.name AS artist_name 
//             FROM songs 
//             JOIN artists ON songs.artist_id = artists.id 
//             ORDER BY RAND() LIMIT $limit";
//     return $conn->query($sql);
// }

// // Prepare the data for the page
// $artist_rows = [];
// while ($artist = $artists->fetch_assoc()) {
//     $songs = getSongsByArtist($conn, $artist['id']);
//     $artist_rows[] = [
//         'artist' => $artist,
//         'songs' => $songs->fetch_all(MYSQLI_ASSOC),
//     ];
// }

// // Fetch random songs
// $random_songs = getRandomSongs($conn);

// // Close connection
// $conn->close();

include 'views/home_view.php';
