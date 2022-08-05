<?php
include("../config/connection.php");

$koneksi = new Config();

if (isset($_POST['confirm'])) {
    $currId = $_POST['currId'];
    $partnerId = $_POST['partnerId'];
    $locationId = $_POST['locationId'];
    $checkout = $koneksi->checkout($currId, $partnerId, $locationId);
    echo "<script>
    alert('Berhasil Checkout Happy Wedding');
    document.location.href = '../user/index.php';
    </script>";
}
