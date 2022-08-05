<?php
session_start();
include('../config/connection.php');

$koneksi = new Config();

if (isset($_GET['requestid'])) {
    $request_id = $_GET['requestid'];
    $deleteRequest = $koneksi->deleteRequest($request_id);
    unset($_SESSION['request_id']);
    echo "true";
}
