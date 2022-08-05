<?php

session_start();
require "connpdo.php";
$con = new config();

$username = $_GET["username"];


if (!empty($username)) {
    $state = $con->wishAuth($username);
    if ($state > 0) {
        echo "<script>
        document.location.href = 'menupdo.php';
        alert('Sudah ada dalam wishlish');
        </script>";
    } else {
        $insert = $con->wishInsert($username);
        if ($insert) {
            header("Location: menupdo.php");
        }
    }
}
