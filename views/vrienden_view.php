<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vrienden Page</title>
    <link rel="stylesheet" href="media/styles/vrienden.css">   
    <link rel="shortcut icon" href="media/images/logo.jpg" type="image/x-icon">
</head>
<body>

<?php include 'header.php'; ?>

<h1>Jouw Vrienden</h1>

<!-- Zoekfunctionaliteit -->
<form method="POST" action="">
    <label for="zoekterm">Gebruikersnaam:</label>
    <input type="text" id="zoekterm" name="zoekterm" value="<?php echo htmlspecialchars($zoekterm); ?>" required>
    <button type="submit">Zoek</button>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <h2>Zoekresultaten</h2>
    <?php if (count($zoek_resultaten) > 0): ?>
        <ul>
            <?php foreach ($zoek_resultaten as $resultaat): ?>
                <li>
                    <a href="profiel.php?naam=<?php echo urlencode($resultaat['naam']); ?>">
                        <?php echo htmlspecialchars($resultaat['naam']); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Geen gebruikers gevonden met de naam "<?php echo htmlspecialchars($zoekterm); ?>"</p>
    <?php endif; ?>
<?php endif; ?>

<!-- Gevolgde Gebruikers -->
<h2>Gevolgde Gebruikers</h2>
<?php if (empty($volgende_gebruikers)): ?>
    <p>Je volgt momenteel niemand.</p>
<?php else: ?>
    <ul>
        <?php foreach ($volgende_gebruikers as $gebruiker): ?>
            <li>
                <a href="profiel.php?naam=<?php echo urlencode($gebruiker['naam']); ?>">
                    <?php echo htmlspecialchars($gebruiker['naam']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<!-- Geblokkeerde Gebruikers -->
<h2>Geblokkeerde Gebruikers</h2>
<?php if (empty($geblokkeerde_gebruikers)): ?>
    <p>Je hebt momenteel niemand geblokkeerd.</p>
<?php else: ?>
    <ul>
        <?php foreach ($geblokkeerde_gebruikers as $gebruiker): ?>
            <li>
                <a href="profiel.php?naam=<?php echo urlencode($gebruiker['naam']); ?>">
                    <?php echo htmlspecialchars($gebruiker['naam']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

</body>
</html>
