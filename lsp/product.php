<?php
session_start();
define("TITLE", "Product | PetsQu Shop");
include('includes/header.php');
require "./config/conn.php";

$id = $_SESSION['id_pelanggan'];

$koneksi = new config();

$results = $koneksi->showItems();

if (isset($_POST['cari'])) {

    $key = $_POST['key'];
    $results = $koneksi->showSearch($key);
}

?>
<div class="special my-5">
    <h2 class="text-center">Search Items</h2>
    <form action="product.php" method="POST" class="d-flex justify-content-center">
        <input type="text" class="cari form-control me-2" name="key" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="cari" style="width:100px; height:auto;">Search</button>
    </form>
</div>
<div class="hot-items">

    <h2 class="text-center">Hot Items</h2>
    <div class="container row py-5 border border-black mx-auto">

        <?php foreach ($results as $row) : ?>
            <!-- Form  yang akan di looping -->
            <form action="./config/addCart.php" method="POST" class="col-lg-4 ">
                <div class="card my-2 bg-dark text-white ">
                    <div class="modal fade" id="produk<?= $row['id_produk']; ?>" tabindex="-1" role="dialog" aria-labelledby="produkModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" id="profile">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark">Deskripsi Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <img src="list-produk/<?= $row['gambar_produk']; ?>" class="profile-img img-fluid mb-3" alt="">
                                            </div>
                                            <div class="col-md-6 text-dark">
                                                <h4><?= $row["nama_produk"]; ?></h4>
                                                <p><?= $row["deskripsi_produk"]; ?></p>
                                                <p>Harga : Rp. <?= $row["harga_produk"]; ?></p>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <img src="list-produk/<?= $row['gambar_produk']; ?>" class="profile-img img-fluid mb-3 vh-75" alt="" style="cursor: pointer;">
                    <h3 class="mx-2"><?= $row["nama_produk"]; ?></h3>
                    <h5 class="mx-2">Rp. <?= $row["harga_produk"]; ?></h5>
                    <input type="hidden" name="id_produk" value="<?= $row['id_produk']; ?>">
                    <input type="hidden" name="nama_produk" value="<?= $row['nama_produk']; ?>">
                    <input type="hidden" name="harga_produk" value="<?= $row['harga_produk']; ?>">

                    <div class="tombol d-flex justify-content-evenly mx-3 my-3">
                        <input type="number" class="form-control" name="quantity" style="height: 40px; width: auto">
                        <input type="submit" name="buy" class="btn btn-primary mb-3" style="height: 40px; width: auto" value="Buy">
                        <input type="button" data-bs-toggle="modal" data-bs-target="#produk<?= $row['id_produk']; ?>" style="height: 40px; width: auto" value=" Detail">
                    </div>

                </div>
            </form>

        <?php endforeach ?>

    </div>


</div>
<div class="products">

    <h2 class="text-center">Produk</h2>

    <div class="container row py-5 border border-black mx-auto">
        <?php foreach ($results as $row) : ?>
            <!-- Form  yang akan di looping -->
            <form action="" method="POST" class="col-lg-4 ">
                <div class="card my-2 bg-dark text-white">
                    <img src="list-produk/<?= $row['gambar_produk']; ?>" class="profile-img img-fluid mb-3" alt="" style="cursor: pointer;">
                    <h3 class="mx-2" name="nama_item"><?= $row["nama_produk"]; ?></h3>
                    <h5 class="mx-2" name="harga_item">Rp. <?= $row["harga_produk"]; ?></h5>
                    <input type="hidden" name="item_name" value="<?= $row['nama_produk']; ?>">
                    <input type="hidden" name="item_price" value="<?= $row['harga_produk']; ?>">

                    <div class="tombol d-flex justify-content-evenly mx-3 my-3">
                        <input type="number" name="quantity" style="height: 30px; width: 75px;">
                        <input type="submit" name="buy" class="pesan mb-3 " value="Buy">
                    </div>

                </div>
            </form>

        <?php endforeach ?>

    </div>


</div>
<?php include('includes/footer.php'); ?>