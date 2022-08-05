<?php
// session_start();

// $username = $_SESSION['nama_lengkap'];
// var_dump($username);
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    <script src="https://kit.fontawesome.com/d76f402439.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/everything.css">
    <link rel="stylesheet" href="./css/everything.css">

    <title><?php echo TITLE; ?></title>


</head>

<body>
    <nav class="navbar navbar-expand-md bg-faded justify-content-center">
        <div class="container">
            <a href="#" class="navbar-brand d-flex w-50 me-auto">Sky Wedding</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
                <ul class="navbar-nav w-100 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="../user/index.php">List Online</a>
                    </li>
                </ul>

                <?php
                if (!isset($_SESSION['dating_code'])) {
                ?>
                    <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="../form_menu/login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../form_menu/register.php">Register</a>
                        </li>
                    </ul>
                <?php  } else { ?>
                    <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Hi, <?= $_SESSION['nama_lengkap']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../form_menu/logout.php">Logout</a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </nav>