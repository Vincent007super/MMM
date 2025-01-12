<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="media/styles/home.css">
    <link rel="stylesheet" href="media/styles/site.css">
</head>

<body>
    <?php include 'header.php' ?>

    <main>
    <?php foreach ($artist_rows as $row): ?>
        <div class="artistInfo">
            <div class="artistImg" style="background-image: url('<?= $row['artist']['image_url'] ?>');"></div>
            <div class="wrapper6">
                <div class="artistName"><?= htmlspecialchars($row['artist']['name']) ?></div>
            </div>
        </div>

        <div class="wrapper1">
            <div class="wrapper2">
                <?php foreach ($row['songs'] as $song): ?>
                    <div class="wrapper3">
                        <div class="songImg" style="background-image: url('<?= $song['image_url'] ?>');"></div>
                        <div class="wrapper4">
                            <h1><?= htmlspecialchars($song['title']) ?></h1>
                            <div class="wrapper5">
                                <h5><?= htmlspecialchars($row['artist']['name']) ?></h5>
                                <h5><?= htmlspecialchars($song['duration']) ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="wrapper1">
        <div class="wrapper2">
            <?php foreach ($random_songs as $song): ?>
                <div class="wrapper3">
                    <div class="songImg" style="background-image: url('<?= $song['image_url'] ?>');"></div>
                    <div class="wrapper4">
                        <h1><?= htmlspecialchars($song['title']) ?></h1>
                        <div class="wrapper5">
                            <h5><?= htmlspecialchars($song['artist_name']) ?></h5>
                            <h5><?= htmlspecialchars($song['duration']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>


</body>

</html>