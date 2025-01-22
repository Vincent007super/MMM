<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vrienden Page</title>
    <link rel="stylesheet" href="media/styles/vrienden.css">   
    <link rel="shortcut icon" href="media/images/logo.jpg" type="image/x-icon">

</head>
<body>

<?php include 'header.php'?> 

<h1>Jouw Vrienden</h1>

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
