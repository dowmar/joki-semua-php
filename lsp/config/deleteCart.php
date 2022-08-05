<?php

session_start();

// error_reporting(0);
require "conn.php";
$con = new config();

$id = $_GET["id"];


if (!empty($id)) {
    $msk = $con->deleteCart($id);

    header("Location: ../cart.php");
}
