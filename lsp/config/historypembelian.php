<?php

session_start();

// error_reporting(0);
require "conn.php";
$koneksi = new config();

$id = $_SESSION['id_pelanggan'];
$date = date('Y-m-d');

if (isset($_POST['pay'])) {
    $id_pelanggan = $id;
    $total = $_POST['total_bayar'];
    $add = $koneksi->addHistory($id_pelanggan, $date, $total);
    echo "<script>
    alert('Pembayaran Berhasil');
    document.location.href = '../cart.php';
    </script>";
}
