<?php
session_start();
include('../config/connection.php');

$koneksi = new Config();


if (isset($_GET['b'])) {
    $result = $koneksi->searchSessionId($_SESSION['game_session']);
    $val = 0;
    $box = $_GET['b'];
    $ply1id = $result['ply1'];
    $ply2id = $result['ply2'];
    $bx = $result['box' . $box];
    $current_pid = $_SESSION['dating_code'];
    if ($current_pid == $ply1id) {
        $val = 1;
    } elseif ($current_pid == $ply2id) {
        $val = 2;
    }

    if ($bx == 0) {
        $box = $_GET['b'];
        $setScoreBox = $koneksi->setScoreBox($box, $val, $_SESSION['game_session']);
        if ($setScoreBox) {
            echo "record inserted!";
        }
    } else {
        echo false;
    }

    // var_dump($ply1id);
}
