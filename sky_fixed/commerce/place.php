<?php

session_start();
define("TITLE", "Pick Wedding Location");
include('../includes/header.php');
include('../config/connection.php');

$koneksi = new Config();

if (isset($_GET['partnerId'])) {
    $_SESSION['partnerId'] = $_GET['partnerId'];
}

$partnerId =  $_SESSION['partnerId'];

// var_dump($_SESSION['dating_code']);
// var_dump($_SESSION['nama_lengkap']);
// var_dump($_SESSION['partnerId']);

$result = $koneksi->showAllPlace();

if (isset($_POST['jakarta'])) {
    $result = $koneksi->showSpecificPlace(1);
}
if (isset($_POST['singapore'])) {
    $result = $koneksi->showSpecificPlace(2);
}
if (isset($_POST['tangerang'])) {
    $result = $koneksi->showSpecificPlace(3);
}

?>
<div class="online-container vh-100 ">
    <div class="special">
        <h2 class="text-center text-dark">Filter By Location</h2>
        <form action="place.php" method="POST" class="filter d-flex justify-content-center my-5">
            <div class="ct-jkt mx-2">
                <button type="submit" class="btn btn-light border border-1 rounded-3" name="jakarta">
                    <span style="color:dodgerblue">
                        <i>JAKARTA</i>
                    </span>
                </button>
            </div>
            <div class="ct-singa mx-2">
                <button type="submit" class="btn btn-light border border-1 rounded-3" name="singapore">
                    <span style="color:tomato">
                        <i>SINGAPORE</i>
                    </span>
                </button>
            </div>
            <div class="ct-tang mx-2">
                <button type="submit" class="btn btn-light border border-1 rounded-3" name="tangerang">
                    <span style="color:coral">
                        <i>TANGERANG</i>
                    </span>
                </button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="row justify-content-evenly border border-secondary border-2">
            <?php foreach ($result as $row) : ?>
                <form action="./checkout.php" method="POST" class="col-lg-3 ">
                    <div class="card my-2">
                        <img src="../imgLocation/<?= $row["gambar"]; ?>" class="profile-img img-fluid mb-3" alt="" style="cursor: pointer;">
                        <h5 class="mx-2" name="lalamat"><?= $row["alamat"]; ?></h5>
                        <p class="mx-2"><small><span name="lharga"><?= $row["harga"]; ?></span></small></p>
                        <input type="hidden" name="partnerId" value="<?= $partnerId; ?>">
                        <input type="hidden" name="placeId" value="<?= $row["id_lokasi"]; ?>">
                        <div class="tombol d-flex justify-content-evenly my-3">
                            <input type="submit" name="checkout" class="checkout mb-3 " value="Choose">
                        </div>
                    </div>
                </form>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?php
include('../includes/footer.php');

?>