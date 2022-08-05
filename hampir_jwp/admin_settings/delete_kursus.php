<?php

session_start();
require "conn.php";
$con = new config();

$id = $_GET["id"];


if (!empty($id)) {
    $msk = $con->deleteProduct($id);

    header("Location: ../admin_product.php");
}
