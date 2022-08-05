<?php


?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
    <script src="https://kit.fontawesome.com/d76f402439.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
    <title><?php echo TITLE; ?></title>

</head>

<body>

    <header class="fixed-header">
        <?php if (!isset($username)) { ?>
            <nav class="navbar navbar-expand-lg bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">
                        <img src="./img/pestsqu2.png" alt="" height="50">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="product.php">Product</a>
                            </li>
                        </ul>
                    </div>
                    <a href="login.php"><button type="button" class="btn btn-outline-dark mx-2">Login</button></a>
                    <a class="navbar-brand" href="Register.php">Register</a>
                </div>
            </nav>
        <?php } elseif ($username == 'admin') { ?>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">
                        <img src="./img/pestsqu2.png" alt="" height="50">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="admin_pelanggan.php">Edit Pelanggan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin_product.php">Edit Product</a>
                            </li>
                        </ul>
                    </div>
                    <a class="navbar-brand">Selamat datang <?= $username; ?></a>
                    <a class="navbar-brand" href="logout.php">Logout</a>
                </div>
            </nav>
        <?php } elseif ($username != 'admin') { ?>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">
                        <img src="./img/pestsqu2.png" alt="" height="50">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="product.php">Product</a>
                            </li>
                        </ul>
                    </div>
                    <a href="cart.php"><i class="fas fa-cart-shopping fa-lg" style="margin: 0 20px"></i></a>
                    <a class="navbar-brand" href="logout.php">Logout</a>
                </div>
            </nav>
        <?php } ?>
    </header>