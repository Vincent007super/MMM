<header>
    <div id="layer1" class="layer1_inactive">
    </div>
    <div id="layer2">
        <!-- Andere inhoud van layer2 -->
    </div>
    
    <div id="menu" class="menu_inactive">
        <a class="pageLinks" href="/MMM/home.php">
            <h3 class="pageTitles">Home</h3>
        </a>
        <a class="pageLinks" href="/MMM/vrienden.php">
            <h3 class="pageTitles">Vrienden</h3>
        </a>
        <a class="pageLinks" href="https://089329.stu.sd-lab.nl/MMM/profiel.php?naam=<?php echo urlencode($_SESSION['user_name']); ?>">
            <h3 class="pageTitles">Profiel</h3>
        </a>
        <a class="pageLinks" href="/MMM/logout.php">
            <h3 class="pageTitles">Uitloggen</h3>
        </a>
    </div>

    <h1 onclick="header()">&#9835;</h1> <!-- Correcte functieaanroep -->
</header>

<script src="code/header.js"></script>
<?php
if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
    exit;
}
?>