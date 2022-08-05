<?php
session_start();

error_reporting(0);

require "connect.php";

$con = new config();

$email = $_SESSION['email'];

$results = $con->showCart($email);

if (isset($_POST['buy'])) {

    $total_pembelian = $_POST['total_beli'];
    $jml_bayar = $_POST['total_bayar'];
    $metode_bayar = $_POST['metode'];

    $delete = $con->remove($email);
    $payment = $con->payment($email, $total_pembelian, $jml_bayar, $metode_bayar);
    // $addCourse = $con->mycourse($email, $nama_course);
    echo "<script>
    document.location.href = 'index.php';
    </script>";
}

if (isset($_SESSION['nama'])) {
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
        <title>Cart</title>
    </head>

    <body>
        <header class="fixed-header">
            <nav class="navbar navbar-expand-lg bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="index.php">
                        <h2>Ubemy</h2>
                    </a>
                    <?php if (!isset($_SESSION['nama'])) { ?>
                        <div class="functional-buttons">
                            <ul>
                                <li><a href="login.php">Log in</a></li>

                            </ul>
                        </div>
                    <?php
                    } else { ?>
                        <div class="functional-buttons">
                            <ul>
                                <li><a href="cart.php">Keranjang</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </nav>
        </header>


        <div class="cart">
            <div class="container bg-dark text-white">
                <div class="row">
                    <div class="col">
                        <ul class="list-group list-group-flush">

                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Item Price</th>
                                        <th scope="col">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($results as $row) : ?>
                                        <tr>
                                            <th scope="row"><?= $row['nbarang_cart']; ?></th>
                                            <td>Rp. <?= $row['hbarang_cart']; ?></td>
                                            <td>Rp. <?= $row['hbarang_total']; ?></td>
                                        </tr>
                                        <?php $total += $row['hbarang_total'] ?>
                                    <?php endforeach ?>

                                </tbody>
                            </table>

                        </ul>
                    </div>
                    <div class="col">
                        <form method="post" action="">
                            <div class="d-flex
                             justify-content-center
                             align-items-center
                             flex-column">

                                <h3 class="display-4 fs-1 
                            text-center">
                                    Payment</h3>
                            </div>



                            <div class="payment d-flex align-items-end flex-column">
                                <div class="mb-3">
                                    <h2>Jumlah yang harus dibayar Rp. <?= $total; ?></h2>
                                    <input type="hidden" class="form-control" name="total_beli" id="total_beli" value="<?= $total; ?>">
                                </div>
                            </div>
                            <label class="form-label">
                                Metode Pembayaran : </label>
                            <br>
                            <div class="d-flex justify-content-evenly">
                                <input class="form-check-input" type="radio" name="metode" value="debit">
                                <label class="form-check-label" for="debit">
                                    Debit
                                </label>
                                <input class="form-check-input" type="radio" name="metode" value="kredit">
                                <label class="form-check-label" for="cod">
                                    Kredit
                                </label>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    Jumlah Pembayaran</label>
                                <input type="number" class="form-control" name="total_bayar" required>
                            </div>



                            <button type="submit" name="buy" id="buybutton" class="btn btn-primary">
                                buy</button>
                            <a href="index.php" style="color:white; text-decoration: none;" class="mx-2">Cancel</a>
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