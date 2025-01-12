<?php
// verificatie.php
require 'config.php'; // Laad de databaseconfiguratie

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Zoek de gebruiker met het token
    $sql = "SELECT * FROM Gebruiker WHERE verificatietoken = :token";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':token' => $token]);

    $user = $stmt->fetch();

    if ($user) {
        // Markeer de gebruiker als geverifieerd
        $sql = "UPDATE Gebruiker SET geverify = 1 WHERE verificatietoken = :token";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':token' => $token]);

        echo "<h1>Je account is succesvol geverifieerd!</h1>";
    } else {
        echo "<h1>Ongeldig verificatietoken!</h1>";
    }
} else {
    echo "<h1>Geen token opgegeven!</h1>";
}
?>
