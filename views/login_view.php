<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="stylesheet" href="../media/styles/style.css">
</head>
<div class="container">
    <h1>Inloggen</h1>

    <!-- Foutmelding weergeven -->
    <?php
    if (!empty($error_message)) {
        echo "<p class='error-message'>$error_message</p>";
    }
    ?>

    <form method="POST" action="../login.php">
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam" value="<?php echo htmlspecialchars($naam); ?>" placeholder="Vul je naam in" required>

        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" id="wachtwoord" name="wachtwoord" placeholder="Vul je wachtwoord in" required>

        <button type="submit">Inloggen</button>
    </form>

    <p>Heb je nog geen account? <a href="../registreren.php">Registreer je hier</a></p>
</div>

<!-- Onderbalk -->
<div class="footer"></div>
</body>
</html>
