<?php
session_start();
include('connection.php');

$koneksi = new Config();


if (isset($_POST['login'])) {
    $codeOrEmail = $_POST['codeOrEmail'];
    $password = $_POST['password'];


    $checkuser = $koneksi->checkuser($codeOrEmail);
    if ($checkuser['dating_code'] == 'Sky99909') {
        $_SESSION['dating_code'] = $checkuser['dating_code'];
        $_SESSION['nama_lengkap'] = $checkuser['nama_lengkap'];
        echo "<script>
        alert('Login Sebagai Admin Berhasil');
        document.location.href = '../admin/dashboard.php';
        </script>";
        exit();
    }
    // var_dump($checkuser);
    if (($checkuser == null)) {
        echo "<script>
        alert('ID atau email anda tidak terdaftar');
        document.location.href = '../form_menu/login.php';
        </script>";
    } elseif ($checkuser['status'] == 'inactive') {
        echo "<script>
        alert('Anda telah di Banned');
        document.location.href = '../form_menu/login.php';
        </script>";
    } else {
        $_SESSION['dating_code'] = $checkuser['dating_code'];
        $_SESSION['nama_lengkap'] = $checkuser['nama_lengkap'];
        $login = $koneksi->login($codeOrEmail, $password);
        $delete = $koneksi->deleteOnline($_SESSION['dating_code']);
        $online = $koneksi->online($_SESSION['dating_code'], $_SESSION['nama_lengkap']);
        var_dump($checkuser['nama_lengkap']);
        echo "<script>
        alert('Anda berhasil login');
        document.location.href = '../user/index.php';
        </script>";
    }
}
