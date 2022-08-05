<?php
session_start();
define("TITLE", "Register | PetsQu Shop");
include('includes/header.php');
require "./config/conn.php";


$koneksi = new config();


if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $signup = $koneksi->register($nama, $alamat, $hp, $username, $password);
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}

?>
<div class="register vh-100">
    <div class="register-main bg-light text-dark rounded-3 my-5">
        <div class="row g-0">
            <div class="col">
                <img src="img/meon2.png" alt="Register image" class="w-100 h-100" style="object-fit: cover; border-top-left-radius:3px; border-bottom-left-radius:3px;">
            </div>
            <div class="col">
                <form method="post" action="register.php">
                    <div class="d-flex
                             justify-content-center
                             align-items-center
                             flex-column">
                        <h3 class="display-4 fs-1 
                            text-center">
                            Register</h3>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            No. Hp</label>
                        <input type="text" class="form-control" name="hp" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" required>
                    </div>

                    <button type="submit" name="register" id="registerBtn" class="btn btn-primary">
                        Register</button>
                    <a href="login.php" style="color:blue; text-decoration: none;" class="mx-2">Already have an account ? Login</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>