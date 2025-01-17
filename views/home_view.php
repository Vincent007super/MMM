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
        <?php foreach ($Artiest_rows as $row): ?>
            <div class="ArtiestInfo">
                <div class="artistImg">
                    <img src="media/images/artiesten/<?php echo htmlspecialchars($row['Artiest']['image_data']); ?>"
                        alt="<?php echo htmlspecialchars($row['Artiest']['artname']); ?>">

                </div>
                <div class="wrapper6">
                    <div class="ArtiestName"><?= htmlspecialchars($row['Artiest']['artname']) ?></div>
                </div>
            </div>


            <div class="wrapper1">
                <div class="wrapper2">
                    <?php foreach ($row['nummers'] as $nummer): ?>
                        <div class="wrapper3">
                            <div class="nummerImg"
                                style="background-image: url('media/images/nummers/<?= $nummer['image_dataN'] ?>');"></div>
                            <div class="wrapper4">
                                <h1><?= htmlspecialchars($nummer['Sname']) ?></h1>
                                <h5><?= htmlspecialchars($row['Artiest']['artname']) ?></h5>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="wrapper1">
            <div class="wrapper2">
                <?php foreach ($random_nummers as $nummer): ?>
                    <div class="wrapper3">
                        <div class="nummerImg"
                            style="background-image: url('media/images/nummers/<?= $nummer['image_dataN'] ?>');"></div>
                        <div class="wrapper4">
                            <h1><?= htmlspecialchars($nummer['Sname']) ?></h1>
                            <div class="wrapper5">
                            <h5><?= htmlspecialchars($nummer['artname']) ?></h5>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>


</body>

</html>