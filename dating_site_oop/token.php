<?php

session_start();

require "connpdo.php";
$con = new config();

$nama = $_SESSION["nama"];
$phone = $_SESSION["phone_number"];


if (!empty($nama)) {
   
    $data = $con->selectToken($phone);
 
    $hasil = (int)$data["token"] + 100;

    
    $total = $con->tambahToken($hasil, $phone);
   
    header("Location: profile.php");
}
