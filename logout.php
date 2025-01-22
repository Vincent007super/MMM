<?php
// Start de sessie
session_start();

// Verwijder alle sessievariabelen
session_unset();

// Vernietig de sessie
session_destroy();

// Omleiden naar de logout_view.php om een succesbericht te tonen
header('Location: views/logout_view.php');
exit;
?>
