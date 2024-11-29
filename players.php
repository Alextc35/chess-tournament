<?php
session_start();

if (!isset($_SESSION['players'])) {
    $_SESSION['players'] = [];
}


if (isset($_POST['addPlayer']) && !empty($_POST['addPlayer'])) {
    $playerName = trim($_POST['addPlayer']);
    $_SESSION['players'][] = $playerName;
}

if (isset($_POST['editPlayer']) && isset($_POST['playerIndex']) && !empty($_POST['editPlayer'])) {
    $playerIndex = (int) $_POST['playerIndex'];
    $newName = trim($_POST['editPlayer']);
    if (isset($_SESSION['players'][$playerIndex])) {
        $_SESSION['players'][$playerIndex] = $newName;
    }
}

if (isset($_POST['deletePlayer']) && isset($_POST['playerIndex'])) {
    $playerIndex = (int) $_POST['playerIndex'];
    if (isset($_SESSION['players'][$playerIndex])) {
        unset($_SESSION['players'][$playerIndex]);
        $_SESSION['players'] = array_values($_SESSION['players']);
    }
}

if (isset($_POST['resetPlayers'])) {
    $_SESSION['players'] = [];
}