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
    <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="vrienden.php">Vrienden</a>
  <a href="https://089329.stu.sd-lab.nl/MMM/profiel.php?naam=<?php echo urlencode($_SESSION['user_name']); ?>">
 profiel 
</a>
</div>


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
    <main>
      
    <?php foreach ($Artiest_rows as $row): ?>
        <div class="ArtiestInfo">
            <div class="ArtiestImg" style="background-image: url('<?= $row['Artiest']['image_data'] ?>');"></div>
            <div class="wrapper6">
                <div class="ArtiestName"><?= htmlspecialchars($row['Artiest']['artname']) ?></div>
            </div>
        </div>

        <div class="wrapper1">
            <div class="wrapper2">
                <?php foreach ($row['nummers'] as $nummer): ?>
                    <div class="wrapper3">
                        <div class="nummerImg" style="background-image: url('<?= $nummer['image_dataN'] ?>');"></div>
                        <div class="wrapper4">
                            <h1><?= htmlspecialchars($nummer['Sname']) ?></h1>
                            <div class="wrapper5">
                                <h5><?= htmlspecialchars($row['Artiest']['artname']) ?></h5>
                  
                            </div>
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
                    <div class="nummerImg" style="background-image: url('<?= $nummer['image_dataN'] ?>');"></div>
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