<?php

session_start();

// error_reporting(0);
require "conn.php";
$koneksi = new config();

$id = $_SESSION['id_pelanggan'];
$date = date('Y-m-d');

if (isset($_POST['buy'])) {
    $id_produk = $_POST['id_produk'];
    $id_pelanggan = $id;
    $quantity = $_POST['quantity'];
    $harga_produk = $_POST['harga_produk'];
    $total = $harga_produk * $quantity;
    $add = $koneksi->addCart($id_produk, $id_pelanggan, $date, $harga_produk, $quantity, $total);
    echo "<script>
    alert('product ditambahkan');
    document.location.href = '../cart.php';
    </script>";
}
