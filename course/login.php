<?php
session_start();

require "connect.php";

$con = new config();

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $results = $con->login($email);

    if ($results['email'] == $email && $results['password'] == $password) {
        $_SESSION['nama'] = $results['nama'];
        $_SESSION['email'] = $results['email'];
        header("Location: index.php");
    } else {
        echo "<script>
        document.location.href = 'login.php';
        alert('Wrong Phone Number / Password');
        </script>";
    }
}


if (!isset($_SESSION['nama'])) {
?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/everything.css">
        <title>Login</title>
    </head>

    <body>
        <header class="fixed-header">
            <nav class="navbar navbar-expand-lg bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <h2>Ubemy</h2>
                    </a>
                    <div class="functional-buttons">
                        <ul>
                            <li><a href="#">Log in</a></li>

                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        <div class="login">
            <div class="container bg-dark text-white">
                <div class="row">
                    <div class="col">
                        <img src="img/meon2.png" alt="Login image" class="w-100 h-100" style="object-fit: none;">
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
                                    Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <button type="submit" name="login" id="loginBtn" class="btn btn-primary">
                                Login</button>
                            <a href="register.php" style="color:white; text-decoration: none;" class="mx-2">Don't have an account? Sign Up</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
















        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit;
}
?>