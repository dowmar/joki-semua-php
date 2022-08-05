<?php

include("connection.php");

$koneksi = new Config();

if (isset($_POST['register'])) {
    $nama = $_POST['regNama'];
    $dateCode = $_POST['regCode'];
    $date = $_POST['regDate'];
    $gender = $_POST['regGender'];
    $email = $_POST['regEmail'];
    $phone = $_POST['regPhone'];
    $datePhoto = $koneksi->upload();
    $password = $_POST['regPassword'];
    $status = "active";

    // var_dump($gender);

    if ($gender == "Pria") {
        $no_gender = "01";
    } else {
        $no_gender = "02";
    }


    $dating_code = strval("Sky" . $dateCode . $no_gender);
    $phone = strval("+65" . $phone);

    $checkuser = $koneksi->checkuser($dating_code);
    if ($checkuser != null) {
        echo "<script>
        alert('ID Dating Code sudah terpakai')
        </script>";
    } else {
        $register = $koneksi->register($dating_code, $nama, $date, $gender, $email, $phone, $datePhoto, $password, $status);
        echo "<script>
        document.location.href = '../form_menu/login.php';
        </script>";
    }
}
