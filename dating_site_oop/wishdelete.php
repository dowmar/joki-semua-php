<?php

session_start();

error_reporting(0);
require "connpdo.php";
$con = new config();

$phone_number = $_GET["phone_number"];


if (!empty($phone_number)) {
    $msk = $con->wishDelete($phone_number);

    header("Location: wishlish.php");
}
