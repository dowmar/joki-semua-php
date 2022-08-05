<?php

session_start();
include('../config/connection.php');

$koneksi = new Config();

if (isset($_GET['requestid'])) {
    $requestid = $_GET['requestid'];
    $oneRequest = $koneksi->oneRequest($requestid);
    $receiver_id = $oneRequest['receiver_id'];
    $check_session = $koneksi->searchSession($receiver_id, $_SESSION['dating_code']);
    $_SESSION['game_session'] = $check_session['session_id'];
    $_SESSION['pid'] = $receiver_id;
    $_SESSION['plytype'] = "sender";
    $_SESSION['boxs'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
    echo "true";
} else {
    echo "false";
}
