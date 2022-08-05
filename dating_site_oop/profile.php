<?php

session_start();


require "connpdo.php";
$con = new config();


$nama = $_SESSION['nama'];
$result = $con->profile($nama);

$random_avatar = rand(1, 3);

switch ($random_avatar) {
    case 1:
        $avatar_test = 'beruang1.png';
        break;
    case 2:
        $avatar_test = 'beruang2.png';
        break;
    case 3:
        $avatar_test = 'beruang3.png';
        break;
    default:
        $avatar_test = 'beruang1.png';
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
    <title>Menu</title>
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
        <div class="container d-flex justify-content-center">

            <div class="card mb-3" style="min-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="rounded-top text-black d-flex flex-row" style="background-color: #fde3e9; height:200px;">
                            <div class="ms-4 d-flex flex-column" style="max-width: 150px; max-height: 150px;">
                                <?php if ($result['set_visible'] == 'false') { ?>
                                    <img src="avatar_hide/<?= $avatar_test; ?>" alt="" class="img-fluid img-thumbnail mt-4 mb-2" style="max-width: 150px; max-height: 100px; z-index: 1;">
                                <?php } else { ?>
                                    <img src="avatar/<?= $result['avatar']; ?>" alt="" class="img-fluid img-thumbnail mt-4 mb-2" style="max-width: 150px; max-height: 100px; z-index: 1;">
                                <?php } ?>
                                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;">
                                    Change Avatar
                                </button>
                            </div>
                            <div class="ms-3" style="margin-top: 100px;">
                                <h5><?= $result['nama']; ?></h5>
                                <p><?= $result["username"]; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row  g-0">
                        <div class="col-md-12">
                            <div class="rounded-top text-white d-flex flex-row" style="background-color: #fde3e9; height:100px; z-index:-1;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">My profile</h5>
                            <div class="p-4" style="background-color: #f8f9fa;">
                                <p class="card-text"><?= $result["gender"]; ?></p>
                                <p class="card-text">Currently interested in <?= $result["interest"]; ?></p>
                                <p class="card-text">My Phone Number is <?= $result["phone_number"]; ?></p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="d-flex pt-2" style="background-color: #f8f9fa;">
                                <p class="mt-2 mx-2">Token : <?= $result["token"]; ?></p>
                                <form action="token.php">
                                    <button type="submit" class="btn btn-secondary" name="token">Isi Token</button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="d-flex pt-2" style="background-color: #f8f9fa;">
                                <p class="mt-2 mx-2">Visible : </p>
                                <?php if ($result["set_visible"] === "true") { ?>
                                    <form action="visible.php">
                                        <button type="submit" class="btn btn-secondary" name="visible_off">Set OFF</button>
                                    </form>
                                <?php
                                } elseif ($result["set_visible"] === "false") { ?>
                                    <form action="visible.php" method="POST">
                                        <input type="hidden" name="testp" value="<?= $random_avatar; ?>">
                                        <button type="submit" class="btn btn-secondary" name="visible_on">Set ON</button>
                                    </form>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>