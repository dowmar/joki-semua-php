<?php
session_start();
define("TITLE", "Pick Wedding Location");
include('../includes/header.php');
include('../config/connection.php');

$placeId = $_POST['placeId'];
$currentId = $_SESSION['dating_code'];
$partnerId = $_POST['partnerId'];
$currentName = $_SESSION['nama_lengkap'];

// var_dump($_POST['currentId']);

$koneksi = new Config();
$location = $koneksi->showSpecificPlace($placeId);
$user = $koneksi->checkuser($currentId);
$partner = $koneksi->checkuser($partnerId);




?>
<div class="free vh-100">
    <div class="free-main bg-light text-dark rounded-3 my-5">
        <div class="row g-0" style="width: 1400px;">
            <div class="col">
                <img src="../imgLocation/<?= $location['gambar']; ?>" alt="Free image" class="w-100 h-100" style="object-fit: cover; border-top-left-radius:3px;
                 border-bottom-left-radius:3px;">
            </div>
            <div class="col">
                <form method="POST" action="checkout_setting.php">
                    <div class="d-flex
                             justify-content-center
                             align-items-center
                             flex-column">
                        <h3 class="display-4 fs-1 
                            text-center">
                            Checkout</h3>
                    </div>
                    <div class="mb-3">
                        <p>Anda dengan Nama <span style="color:blue"> <?= $user['nama_lengkap']; ?></span></p>
                        <input type="hidden" name="currId" value="<?= $user['dating_code']; ?>">
                    </div>
                    <div class="mb-3">
                        <p>dan Partner Anda <span style="color:blue"> <?= $partner['nama_lengkap']; ?></span></p>
                        <input type="hidden" name="partnerId" value="<?= $partner['dating_code']; ?>">
                    </div>
                    <div class="mb-3">
                        <p>Memilih Wedding Location di <span style="color:blue"> <?= $location['nama_lokasi']; ?></span></p>
                        <input type="hidden" name="locationId" value="<?= $location['id_lokasi']; ?>">
                    </div>
                    <div class="mb-3">
                        <p>Yang Beralamat di <span style="color:blue"> <?= $location['alamat']; ?></span></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Total Pembayaran : Rp.</label>
                        <span style="color: green;">
                            <?= $location['harga']; ?>
                        </span>
                    </div>

                    <button type="submit" name="confirm" id="freeBtn" class="btn btn-success">
                        Confirm</button>

                </form>
            </div>
        </div>
    </div>
</div>
<?php
include('../includes/footer.php');

?>