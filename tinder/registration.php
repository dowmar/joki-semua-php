<?php

include 'functions.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login2.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $foto = $_FILES['foto'];

    // $foto = upload();
    // if (!$foto) {
    //     return false;
    // }

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users
                    VALUES ('','$username', '$email', '$password','$foto')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";

                header("Location: login2.php");
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}

// function upload()
// {
//     $namaFoto = $_FILES['foto']['name'];
//     $ukuranFoto = $_FILES['foto']['size'];
//     $error = $_FILES['foto']['error'];
//     $tmpName = $_FILES['foto']['tmp_name'];

//     if ($error === 4) {
//         echo "<script>alert('pilih gambar terlebih dahulu!');</script>";
//         return false;
//     }
// }

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

    <title>Register</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?= $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?= $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?= $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?= $_POST['cpassword']; ?>" required>
            </div>
            <div class="input-group">
                <input type="file" placeholder="Fotoprofil" name="foto" value="<?= $_FILES['foto']; ?>">
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="login2.php">Login </a></p>
        </form>
    </div>
</body>

</html>