<?php

session_start();

// error_reporting(0);
require "conn.php";
$con = new config();

$id = $_GET["id"];
$jumlah = $_GET["jumlah"];
$harga = $_GET["harga"];
$total = $harga * $jumlah;


if (!empty($id)) {
    $msk = $con->editCart($id, $jumlah, $total);
    header("Location: ../cart.php");
}
