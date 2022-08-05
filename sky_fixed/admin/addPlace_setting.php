<?php

include("../config/connection.php");

$koneksi = new Config();

if (isset($_POST['add'])) {
    $id_kota = $_POST['id_kota'];
    $alamat = $_POST['alamat'];
    $harga = $_POST['harga'];
    $gambar = $koneksi->upload2();
    $addPlace = $koneksi->addPlace($id_kota, $alamat, $harga, $gambar);
    header("location:dashboard.php");
    exit();
}
