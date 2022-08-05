<?php
session_start();

// error_reporting(0);


require "connect.php";

$con = new config();

$email = $_SESSION['email'];


$history = $con->showHistory();
$items = $con->showItems();



if (isset($_POST['add'])) {


    $nama_item = $_POST['nama_item'];
    $img_item = $_FILES['img_item']['name'];
    $harga_item = $_POST['price_item'];

    $additem = $con->addItem($nama_item, $img_item, $harga_item);
    echo "<script>
    document.location.href = 'admin.php';
    </script>";
}

if ($_SESSION['nama'] == "admin") {
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
        <title>Admin Panel</title>
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
                        <h2 class="text-center">History</h2>
                        <ul class="list-group list-group-flush">

                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Email</th>
                                        <th scope="col">Total Pembelian</th>
                                        <th scope="col">Jumlah Pembayaran</th>
                                        <th scope="col">Metode Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($history as $row) : ?>
                                        <tr>
                                            <th scope="row"><?= $row['email']; ?></th>
                                            <td>Rp. <?= $row['total_pembelian']; ?></td>
                                            <td>Rp. <?= $row['jml_bayar']; ?></td>
                                            <td><?= $row['metode_bayar']; ?></td>

                                        </tr>

                                    <?php endforeach ?>

                                </tbody>
                            </table>

                        </ul>
                    </div>

                    <div class="col">
                        <h2 class="text-center">Course</h2>
                        <ul class="list-group list-group-flush">

                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Course Name</th>
                                        <th scope="col">Course Image</th>
                                        <th scope="col">Course Price</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $row2) : ?>
                                        <tr>
                                            <th scope="row"><?= $row2['nama_item']; ?></th>
                                            <td><?= $row2['img_item']; ?></td>
                                            <td>Rp. <?= $row2['harga_item']; ?></td>
                                        </tr>

                                    <?php endforeach ?>

                                </tbody>
                            </table>

                        </ul>
                    </div>
                    <div class="col">
                        <h2 class="text-center">Add Course</h2>
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">
                                    Nama Course</label>
                                <input type="text" class="form-control" name="nama_item" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    Gambar Course</label>
                                <input type="file" class="form-control" name="img_item" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">
                                    Harga Course</label>
                                <input type="number" class="form-control" name="price_item" required>
                            </div>



                            <button type="submit" name="add" id="addbutton" class="btn btn-primary">
                                Add</button>
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