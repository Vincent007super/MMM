<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="stylesheet" href="media/styles/registreren.css">
    <link rel="shortcut icon" href="media/images/logo.jpg" type="image/x-icon">

</head>
<body>
<h1>Registreren</h1>

<!-- Foutmelding weergeven -->
<?php
if (!empty($error_message)) {
    echo "<p style='color: red;'>$error_message</p>";
}
?>

<form method="POST" action="registreren.php">
    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" value="<?php echo htmlspecialchars($naam); ?>" required>
    <br><br>
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
    <br><br>
    <label for="wachtwoord">Wachtwoord:</label>
    <input type="password" id="wachtwoord" name="wachtwoord" required>
    <br><br>
    <button type="submit">Registreren</button>
</form>

<p>Heb je al een account? <a href="login.php">Log hier in</a></p>
</body>
</html>