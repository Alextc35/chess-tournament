<?php
session_start();

if(!isset($_SESSION['players']) || empty($_SESSION['players'])) {
    header("Location: index.php");
    exit();
}

$players = $_SESSION['players'];
shuffle($players);

$matchups = [];
for ($i = 0; $i < count($players); $i += 2) {
    if (isset($players[$i + 1])) {
        $matchups[] = [$players[$i], $players[$i + 1]];
    } else {
        $matchups[] = [$players[$i], "Sin oponente"];
    }
}