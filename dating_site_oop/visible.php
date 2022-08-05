<?php

session_start();

require "connpdo.php";
$con = new config();


$nama = $_SESSION["nama"];
$phone = $_SESSION["phone_number"];
$test = (int)$_POST['testp'];

if (!empty($nama)) {


    $data = $con->all_from_phone($phone);

    $hasil = (int)$data["token"] - 50;
    $hasil2 = (int)$data["token"] - 5;



    if ($data["set_visible"] == 'true') {
        $total = $con->visible($hasil, "false", $phone);
        
        header("Location: profile.php");
        
    } else {
        $total = $con->visible($hasil2, "true", $phone);
        
        header("Location: profile.php");
        
    }
}
