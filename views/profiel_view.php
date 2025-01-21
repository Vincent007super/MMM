<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel - <?php echo htmlspecialchars($profiel_naam); ?></title>
    <link rel="stylesheet" href="media/styles/profiel.css">
    <link rel="stylesheet" href="media/styles/site.css">
</head>
<body>

    <?php include 'header.php' ?>

<h1>Profiel van <?php echo htmlspecialchars($profiel_naam); ?></h1>

<?php if ($profiel): ?>
    <p>Naam: <?php echo htmlspecialchars($profiel['naam']); ?></p>

    <?php if ($is_huidige_gebruiker): ?>
        <p>Dit is jouw profiel.</p>
    <?php else: ?>
        <?php if ($geblokkeerd): ?>
            <form action="deblokkeer.php" method="post">
                <input type="hidden" name="geblokkeerde" value="<?php echo htmlspecialchars($profiel_naam); ?>">
                <button type="submit">Deblokkeren</button>
            </form>
        <?php else: ?>
            <form action="blokkeer.php" method="post">
                <input type="hidden" name="geblokkeerde" value="<?php echo htmlspecialchars($profiel_naam); ?>">
                <button type="submit">Blokkeren</button>
            </form>
            <?php if ($volgend): ?>
                <form action="ontvolgen.php" method="post">
                    <input type="hidden" name="gevolgd" value="<?php echo htmlspecialchars($profiel_naam); ?>">
                    <button type="submit">Ontvolgen</button>
                </form>
            <?php else: ?>
                <form action="volgen.php" method="post">
                    <input type="hidden" name="gevolgd" value="<?php echo htmlspecialchars($profiel_naam); ?>">
                    <button type="submit">Volgen</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
<?php else: ?>
    <p>Profiel niet gevonden.</p>
<?php endif; ?>
</body>
</html>
