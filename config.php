<?php
$servername = "localhost"; // instead of 127.0.0.1
$username = "glr100193";
$password = "A13cd3Man";
$database = "MMM_data";

// Opties voor PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Fouten gooien als uitzonderingen
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch modus
    PDO::ATTR_EMULATE_PREPARES   => false,                 // Echte prepared statements
];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password, $options);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // Optioneel om succesbericht te tonen
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); // Geeft de foutmelding weer als de verbinding faalt
}
?>
