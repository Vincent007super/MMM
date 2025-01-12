<?php
require 'config.php'; // Laad de databaseconfiguratie

$naam = $wachtwoord = $email = ""; // Initialiseer variabelen
$error_message = ""; // Foutmeldingen

// Controleer of het formulier is verzonden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verkrijg de ingevoerde gegevens
    $naam = isset($_POST['naam']) ? trim($_POST['naam']) : '';
    $wachtwoord = isset($_POST['wachtwoord']) ? trim($_POST['wachtwoord']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    // Valideer de invoer
    if (empty($naam) || empty($wachtwoord) || empty($email)) {
        $error_message = "Vul alle velden in!";
    } else {
        // Controleer of de naam al bestaat
        $sql = "SELECT * FROM Gebruiker WHERE naam = :naam";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':naam' => $naam]);

        if ($stmt->rowCount() > 0) {
            $error_message = "De naam bestaat al!";
        } else {
            // Controleer of het e-mailadres al bestaat
            $sql = "SELECT * FROM Gebruiker WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':email' => $email]);

            if ($stmt->rowCount() > 0) {
                $error_message = "Dit e-mailadres is al geregistreerd!";
            } else {
                // Wachtwoord beveiligen
                $hashed_password = password_hash($wachtwoord, PASSWORD_DEFAULT);

                // Genereer verificatie token
                $verificatietoken = bin2hex(random_bytes(50));

                // Voeg de gebruiker toe aan de database met 'geverify' = 0 (nog niet geverifieerd)
                $sql = "INSERT INTO Gebruiker (naam, ww, email, verificatietoken, geverify) 
                        VALUES (:naam, :wachtwoord, :email, :verificatietoken, 0)";
                $stmt = $conn->prepare($sql);

                try {
                    $stmt->execute([
                        ':naam' => $naam,
                        ':wachtwoord' => $hashed_password,
                        ':email' => $email,
                        ':verificatietoken' => $verificatietoken,
                    ]);

                    // Stuur verificatie-e-mail
                    $verificatieLink = "https://100193.stu.sd-lab.nl/Beroeps/verificatie.php?token=$verificatietoken";
                    $subject = "Account Verificatie";
                    $message = "Klik op de volgende link om je account te verifiëren: $verificatieLink";
                    $headers = "From: softwaredeveloperglr@gmail.com";

                    // E-mail verzenden
                    mail($email, $subject, $message, $headers);

                    // Succesvolle registratie, stuur door naar loginpagina
                    header('Location: login.php?success=1');
                    exit;
                } catch (PDOException $e) {
                    $error_message = "Fout bij registratie: " . $e->getMessage();
                }
            }
        }
    }
}
include 'registreren_view.php';
?>
