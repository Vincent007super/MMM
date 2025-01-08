<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #0000FF; /* Diepblauwe achtergrond */
            color: #FFFFFF;
            overflow: hidden;
        }

        h1 {
            color: #000000; /* Lichtblauw/cyaan */
            text-align: center;
            margin: 20px 0;
        }

        .top-bar {
            background: linear-gradient(to right, #FF0000, #00FFFF);
            height: 50px;
            width: 100%;
            position: relative;
            clip-path: polygon(0 0, 100% 0, 100% 50%, 0 100%);
        }

        .music-icon {
            position: absolute;
            top: 10px;
            right: 20px;
            color: #00FFFF;
            font-size: 24px;
        }

        .container {
            background-color: #FFFFFF;
            color: #000000;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 90%;
            margin: 50px auto;
            padding: 30px;
            text-align: center;
        }

        .error-message {
            color: red;
            margin-bottom: 20px;
        }

        form {
            margin: 0;
        }

        label {
            font-weight: bold;
            display: block;
            text-align: left;
            margin-bottom: 5px;
            margin-top: 15px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 15px;
            margin-top: 5px;
            border: 2px solid #FF0000; /* Rood randje */
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        button {
            background-color: #EF5350; /* Rood */
            color: #FFFFFF;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            margin-top: 20px;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #D32F2F;
        }

        p {
            margin-top: 20px;
            font-size: 14px;
        }

        a {
            color: #EF5350; /* Rood accent */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .footer {
            background: linear-gradient(to left, #FF0000, #00FFFF);
            height: 50px;
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
            clip-path: polygon(0 0, 100% 50%, 100% 100%, 0 100%);
        }
    </style>
</head>
<body>
<!-- Bovenbalk -->
<div class="top-bar">
    <div class="music-icon">&#9835;</div> <!-- Muzieksymbool -->
</div>

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
