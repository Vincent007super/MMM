<?php

session_start(); // Start de sessie

if (!isset($_SESSION['user_name'])) {
    header('Location: login.php'); // Stuur niet-ingelogde gebruikers naar login
    exit;
}

// Je beveiligde inhoud
echo "Welkom, " . htmlspecialchars($_SESSION['user_name']) . "!";


include 'views/index_view.php';