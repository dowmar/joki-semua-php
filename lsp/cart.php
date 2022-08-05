<?php
session_start();
define("TITLE", "Cart | PetsQu Shop");
include('includes/header.php');
require "./config/conn.php";
$con = new config();
$results = $con->showCart();
$id = $_SESSION['id_pelanggan'];
$date = date('Y-m-d');
$test = $con->showTest($id);

?>

<div class="cart">
    <div class="container">
        <div class="row">
            <div class="list-beli col-9">
                <div class="card my-2 bg-white text-dark">

                    <ul class="list-group list-group-flush">

                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Tanggal Pembelian</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Item Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <?php foreach ($test as $row) : ?>
                                <tbody>
                                    <tr>
                                        <form action="./config/editCart.php" method="GET">
                                            <th scope="row"><?= $row['tgl_pembelian']; ?></th>
                                            <th><?= $row['nama_produk']; ?></th>
                                            <td>Rp. <?= $row['harga']; ?></td>

                                            <td>
                                                <input type="hidden" name="id" value="<?= $row["id_pembelian"]; ?>">
                                                <input type="hidden" name="harga" value="<?= $row['harga']; ?>">
                                                <input type="number" name="jumlah" min="1" placeholder="<?= $row['jumlah']; ?>">
                                            </td>

                                            <td>Rp. <?= $row['total']; ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-warning" type="submit" style="width:100px; height:auto;">Edit</button>
                                                <a href="./config/deleteCart.php?id=<?= $row["id_pembelian"]; ?>"><button class="btn btn-danger" type="submit" style="width:100px; height:auto;">Delete</button></a>
                                            </td>
                                        </form>
                                    </tr>
                                </tbody>
                                <?php $test1 += $row['total'] ?>
                            <?php endforeach ?>
                        </table>
                    </ul>


                </div>
            </div>
            <div class="list-beli col-3">
                <form action="./config/historypembelian.php" method="post">
                    <div class="card my-2 bg-white text-dark text-center">
                        <h3 class="mx-2" name="nama_item">Total Bayar</h3>
                        <h4 class="mx-2">Rp. <?= $test1; ?></h4>
            
                        <input type="hidden" name="total_bayar" value="<?= $test1; ?>">
                     
                        <button class="btn-fluid btn btn-success align-self-center" name="pay" type="submit" style="width:100%; height:auto;">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>