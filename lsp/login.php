<?php
session_start();
define("TITLE", "Login | PetsQu Shop");
include('includes/header.php');
require "./config/conn.php";


$koneksi = new config();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $results = $koneksi->login($username, $password);
    $results_admin = $koneksi->loginAdmin($username, $password);

    if ($results['username'] == $username && $results['password'] == $password) {
        $_SESSION['id_pelanggan'] = $results['id_pelanggan'];
        $_SESSION['nama'] = $results['nama_pelanggan'];
        $_SESSION['username'] = $results['username'];
        header("Location: index.php");
    } elseif ($results_admin['username'] == $username && $results_admin['password'] == $password) {
        $_SESSION['nama'] = $results_admin['nama_admin'];
        $_SESSION['username'] = $results_admin['username'];
        header("Location: index.php");
    } else {
        echo "<script>
        alert('Wrong Username or Password');
        </script>";
    }
}

if (!isset($_SESSION['nama'])) {
?>

    <div class="login vh-100">
        <div class="login-main bg-light text-dark rounded-3 my-5">
            <div class="row g-0">
                <div class="col">
                    <img src="img/meon2.png" alt="Login image" class="w-100 h-100" style="object-fit: cover; border-top-left-radius:3px; border-bottom-left-radius:3px;">
                </div>
                <div class="col">
                    <form method="post" action="login.php">
                        <div class="d-flex
                             justify-content-center
                             align-items-center
                             flex-column">
                            <h3 class="display-4 fs-1 
                            text-center">
                                Login</h3>
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

                        <button type="submit" name="login" id="loginBtn" class="btn btn-primary">
                            Login</button>
                        <a href="register.php" style="color:blue; text-decoration: none;" class="mx-2">Don't have an account? Sign Up</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    header("Location: index.php");
    exit;
}
?>
<?php include('includes/footer.php'); ?>