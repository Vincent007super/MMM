
<!-- login_view.php (HTML-weergave) -->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="media/styles/login.css">
</head>
<body>
<h1>Inloggen</h1>

<!-- Foutmelding weergeven -->
<?php
if (!empty($error_message)) {
    echo "<p style='color: red;'>$error_message</p>";
}
?>

<form method="POST" action="login.php">
    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" value="<?php echo htmlspecialchars($naam); ?>" required>
    <br><br>
    <label for="wachtwoord">Wachtwoord:</label>
    <input type="password" id="wachtwoord" name="wachtwoord" required>
    <br><br>
    <button type="submit">Inloggen</button>
</form>

<p>Heb je nog geen account? <a href="registreren.php">Registreer je hier</a></p>
</body>
</html>
