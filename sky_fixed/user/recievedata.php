<?php
session_start();

if (isset($_GET['r'])) {

    include('../config/connection.php');
    $koneksi = new Config();
    $ret = "";
    $result = $koneksi->searchSessionId($_SESSION['game_session']);
    $count = $result['count'];
    $boxs = array(0, $result['box1'], $result['box2'], $result['box3'], $result['box4'], $result['box5'], $result['box6'], $result['box7'], $result['box8'], $result['box9']);
    if (
        $boxs[1] == 1 && $boxs[2] == 1 && $boxs[3] == 1 ||
        $boxs[4] == 1 && $boxs[5] == 1 && $boxs[6] == 1 ||
        $boxs[7] == 1 && $boxs[8] == 1 && $boxs[9] == 1 ||

        $boxs[1] == 1 && $boxs[4] == 1 && $boxs[7] == 1 ||
        $boxs[2] == 1 && $boxs[5] == 1 && $boxs[8] == 1 ||
        $boxs[3] == 1 && $boxs[6] == 1 && $boxs[9] == 1 ||

        $boxs[1] == 1 && $boxs[5] == 1 && $boxs[9] == 1 ||
        $boxs[3] == 1 && $boxs[5] == 1 && $boxs[7] == 1
    ) {
        $ret = "pl1";
        echo $ret;
    } else if (
        $boxs[1] == 2 && $boxs[2] == 2 && $boxs[3] == 2 ||
        $boxs[4] == 2 && $boxs[5] == 2 && $boxs[6] == 2 ||
        $boxs[7] == 2 && $boxs[8] == 2 && $boxs[9] == 2 ||

        $boxs[1] == 2 && $boxs[4] == 2 && $boxs[7] == 2 ||
        $boxs[2] == 2 && $boxs[5] == 2 && $boxs[8] == 2 ||
        $boxs[3] == 2 && $boxs[6] == 2 && $boxs[9] == 2 ||

        $boxs[1] == 2 && $boxs[5] == 2 && $boxs[9] == 2 ||
        $boxs[3] == 2 && $boxs[5] == 2 && $boxs[7] == 2
    ) {
        $ret = "pl2";
        echo $ret;
    } else if ($count == 9) {
        $ret = "draw";
        echo $ret;
    }
    if ($ret == "") {
        $result = $koneksi->searchSessionId($_SESSION['game_session']);
        $ply1id = $result['ply1'];
        $ply2id = $result['ply2'];
        $pl1scr = $result['ply1scr'];
        $pl2scr = $result['ply2scr'];
        $count = $result['count'];
        $turn = $result['turn'];
        $boxs = array($result['box1'], $result['box2'], $result['box3'], $result['box4'], $result['box5'], $result['box6'], $result['box7'], $result['box8'], $result['box9']);
        for ($i = 0; $i < 9; $i++) {
            if ($_SESSION['boxs'][$i] != $boxs[$i]) {

                $_SESSION['boxs'][$i] = $boxs[$i];
                echo $i + 1;
            }
        }
    }
    // var_dump($ret);
}
