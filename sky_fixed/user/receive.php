<?php
session_start();
include('../config/connection.php');

$koneksi = new Config();

if (isset($_POST['requestId'])) {
    $reqId = $_POST['requestId'];
    $updateStatus = $koneksi->updateRequest($reqId);
    $oneRequest = $koneksi->oneRequest($reqId);
    $senderId = $oneRequest['sender_id'];
    $ply1 = $_SESSION['dating_code'];
    $deleteExist = $koneksi->deleteExist($ply1, $senderId);
    $addSession = $koneksi->insertSession($ply1, $senderId, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $searchSession = $koneksi->searchSession($ply1, $senderId);
    $_SESSION['game_session'] =  $searchSession['session_id'];
    $_SESSION['pid'] = $senderId;
    $_SESSION['plytype'] = "rec";
    $_SESSION['boxs'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0);
    header("Location:../game/game.php");
    exit();
}
