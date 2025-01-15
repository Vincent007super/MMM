<header>
    <div id="layer1" class="layer1_inactive"></div>
    <div id="layer2"></div>
    <h1 onclick="header()">&#9835;</h1>
</header>

<script src="code/header.js"></script>

<?php

// session check
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
    exit;
}

?>