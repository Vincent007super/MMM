<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require 'config.php'; // Laad de databaseconfiguratie

$naam = $wachtwoord = ""; // Initialiseer variabelen
$error_message = ""; // Foutmeldingen

// Controleer of het formulier is verzonden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verkrijg de ingevoerde gegevens
    $naam = isset($_POST['naam']) ? trim($_POST['naam']) : '';
    $wachtwoord = isset($_POST['wachtwoord']) ? trim($_POST['wachtwoord']) : '';

    // Valideer de invoer
    if (empty($naam) || empty($wachtwoord)) {
        $error_message = "Vul alle velden in!";
    } else {
        // Zoek de gebruiker op basis van naam
        $sql = "SELECT * FROM Gebruiker WHERE naam = :naam";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':naam' => $naam]);
        $user = $stmt->fetch();

        if ($user && password_verify($wachtwoord, $user['ww'])) {
            // Controleer of het account geverifieerd is
            if ($user['geverify'] == 0) {
                $error_message = "Je account is nog niet geverifieerd. Controleer je e-mail om je account te verifiëren.";
            } else {
                // Account is geverifieerd, log in de gebruiker
                session_start();
                $_SESSION['user_id'] = $user['id']; // Sla de gebruiker ID op in de sessie
                $_SESSION['user_name'] = $user['naam']; // Sla de naam op in de sessie

                // Doorsturen naar de welkom.php pagina
                header('Location: index.php');
                exit;
            }
        } else {
            $error_message = "Ongeldige gebruikersnaam of wachtwoord.";
        }
    }
}

include 'views/login_view.php';

?>