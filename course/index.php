<?php
session_start();

error_reporting(0);

require "connect.php";

$con = new config();

$results = $con->showItems();

$email = $_SESSION['email'];


if (isset($_POST['buy'])) {

    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    (int)$price_total = (int)$item_price;


    if ($price_total === 0) {
        echo "<script>
        alert('quantity cannot be 0');
        document.location.href = 'index.php';
        </script>";
    }

    $add_cart = $con->addCart($email, $item_name, $item_price, $price_total);
    echo "<script>
    document.location.href = 'index.php';
    </script>";
}


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js" integrity="sha512-eH6+OZuv+ndnPTxzVfin+li0PXKxbwi1gWWH2xqmljlTfO3JdBlccZkwWd0ZcWAtDTvsqntx1bbVSkWzHUtfQQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Halaman Utama</title>
</head>

<body>
    <header class="fixed-header">
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <h2>Ubemy</h2>
                </a>

                <?php if (!isset($email)) { ?>
                    <div class="functional-buttons">
                        <ul>
                            <li><a href="login.php">Log in</a></li>
                        </ul>
                    </div>
                <?php }
                if (isset($email) && $email == "admin@gmail.com") { ?>
                    <div class="functional-buttons">
                        <ul>
                            <li><a href="cart.php">Cart</a></li>
                            <li><a href="admin.php">Admin</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                <?php } else if (isset($email) && $email != "admin@gmail.com") { ?>
                    <div class="functional-buttons">
                        <ul>
                            <li><a href="cart.php">Cart</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                <?php } ?>

            </div>
        </nav>
    </header>


    <div class="shop">
        <div class="container row py-5 justify-content-evenly">
            <!-- <h2 class="text-center">MENU</h2> -->


            <?php foreach ($results as $row) : ?>
                <!-- Form Card yang akan di looping -->
                <form action="" method="POST" class="col-lg-3 ">
                    <div class="card my-2 bg-dark text-white">

                        <img src="img/<?= $row['img_item']; ?>" class="profile-img img-fluid mb-3" alt="" style="cursor: pointer;">
                        <h3 class="mx-2" name="nama_item"><?= $row["nama_item"]; ?></h3>
                        <h5 class="mx-2" name="harga_item">Rp. <?= $row["harga_item"]; ?></h5>
                        <input type="hidden" name="item_name" value="<?= $row['nama_item']; ?>">
                        <input type="hidden" name="item_price" value="<?= $row['harga_item']; ?>">

                        <div class="tombol d-flex justify-content-evenly mx-3 my-3">
                            <input type="submit" name="buy" class="pesan mb-3 " value="Buy">
                        </div>

                    </div>
                </form>

            <?php endforeach ?>

        </div>
    </div>
















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            jQuery('<div class="quantity-nav"><button class="quantity-button quantity-up">&#xf106;</button><button class="quantity-button quantity-down">&#xf107</button></div>').insertAfter('.quantity input');
            jQuery('.quantity').each(function() {
                var spinner = jQuery(this),
                    input = spinner.find('input[type="number"]'),
                    btnUp = spinner.find('.quantity-up'),
                    btnDown = spinner.find('.quantity-down'),
                    min = input.attr('min'),
                    max = input.attr('max');

                btnUp.click(function() {
                    var oldValue = parseFloat(input.val());
                    if (oldValue >= max) {
                        var newVal = oldValue;
                    } else {
                        var newVal = oldValue + 1;
                    }
                    spinner.find("input").val(newVal);
                    spinner.find("input").trigger("change");
                });

                btnDown.click(function() {
                    var oldValue = parseFloat(input.val());
                    if (oldValue <= min) {
                        var newVal = oldValue;
                    } else {
                        var newVal = oldValue - 1;
                    }
                    spinner.find("input").val(newVal);
                    spinner.find("input").trigger("change");
                });

            });
        });
    </script>
</body>

</html>