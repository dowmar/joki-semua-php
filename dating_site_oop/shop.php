<?php

session_start();


require "connpdo.php";
$con = new config();



$result = $con->showAvatar();

$phone = $_SESSION['phone_number'];


$data = $con->selectToken($phone);


if (isset($_POST['buy'])) {
    $ava_img = $_POST['ava_img'];
    $ava_price = $_POST['ava_price'];

  
    if ($data['token'] <  $ava_price) {
        echo "<script>
        document.location.href = 'shop.php';
        alert('Saldo tidak cukup');
        </script>";
    } else {
        $hasil = (int)$data["token"] - $ava_price;
        $total = $con->updateToken($hasil, $phone);
        if ($total) {
            $msk = $con->insertAvatar($phone, $ava_img);
        }
       
    }
}



?>



<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Collector Show</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #fde3e9;">
        <div class="container-fluid">
            <a class="navbar-brand mx-2" href="menupdo.php">Dating Site</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ms-auto">
                    <?php if (!isset($_SESSION['nama'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                        </li>
                    <?php  } else {  ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter By
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="gender.php">Gender</a></li>
                                <li><a class="dropdown-item" href="phone.php">Phone Number</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="collection.php">Collection</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="wishlish.php">Wishlish</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php"><?= $_SESSION['nama']; ?></a>
                        </li>
                    
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mid mt-5">
        <div class="container">
            <div class="row py-5 justify-content-evenly border border-black">
                <?php foreach ($result as $row) : ?>

                    <form action="shop.php" method="POST" class="col-lg-3 ">
                        <div class="card my-2">
                            <img src="avatar/<?= $row['avatar_img']; ?>" class="profile-img img-fluid mb-3" alt="" style="cursor: pointer;">
                            <h5 class="mx-2" name="tnama"><?= $row["avatar_price"]; ?> Token</h5>
                            <input type="hidden" name="ava_img" value="<?= $row['avatar_img']; ?>">
                            <input type="hidden" name="ava_price" value="<?= $row['avatar_price']; ?>">
                            <div class="tombol d-flex justify-content-end mx-3 my-3">
                                <input type="submit" name="buy" class="pesan mb-3 " value="Buy">
                            </div>

                        </div>
                    </form>

                <?php endforeach ?>
            </div>



        </div>

    </div>




    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script>
        var btnlove = document.getElementById('liked');

        function Toggle() {
            if (btnlove.style.color == "red") {
                btnlove.style.color = "grey"
            } else {
                btnlove.style.color = "red"
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>