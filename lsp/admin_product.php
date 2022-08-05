<?php
session_start();
define("TITLE", "Product | Admin PetsQu Shop");
include('includes/header.php');
require "./config/conn.php";
$con = new config();
$results = $con->showItems();
?>
<div class="cart">
    <div class="container">

        <div class="row">
            <div class="list-beli col-12">
                <div class="card my-2 bg-white text-dark">

                    <ul class="list-group list-group-flush">

                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">Gambar Produk</th>
                                    <th scope="col" class="text-center">Nama Produk</th>
                                    <th scope="col" class="text-center">Deskripsi</th>
                                    <th scope="col" class="text-center">Harga Produk</th>
                                    <th scope="col" class="text-center">Action</th>
                                    <th scope="col" class="text-center"><a href="admin_addproduct.php">Tambah</a></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($results as $row) : ?>
                                    <tr>

                                        <td class="w-25 text-center">
                                            <img src="list-produk/<?= $row["gambar_produk"]; ?>" class="img-fluid img-thumbnail w-50" alt="gambar produk">
                                        </td>
                                        <td class="text-center">
                                            <p><?= $row["nama_produk"]; ?></p>
                                        </td>
                                        <td class="text-center"><?= $row["deskripsi_produk"]; ?></td>
                                        <td class="text-center"><?= $row["harga_produk"]; ?></td>
                                        <td class="text-center">
                                            <a href="./admin_editproduct.php?id=<?= $row["id_produk"]; ?>"><button class="btn btn-warning" type="submit" name="edit" style="width:100px; height:auto;">Edit</button></a>
                                            <a href="./config/deleteProduct.php?id=<?= $row["id_produk"]; ?>"><button class="btn btn-danger" type="submit" name="delete" style="width:100px; height:auto;">Delete</button></a>
                                        </td>
                                    </tr>

                                <?php endforeach ?>
                            </tbody>
                        </table>

                    </ul>


                </div>
            </div>

        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>