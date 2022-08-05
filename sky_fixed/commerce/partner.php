<?php

session_start();
define("TITLE", "Partner");
include('../includes/header.php');
include('../config/connection.php');

$koneksi = new Config();

$partnerId = $_POST['partnerId'];
$_SESSION['partnerId'] = $partnerId;
$checkPartner = $koneksi->checkuser($partnerId);

// var_dump($_SESSION['partnerId']);

?>
<div class="free vh-100">
    <div class="free-main bg-light text-dark rounded-3 my-5">
        <div class="row g-0" style="width: 800px;">
            <div class="col">
                <img src="../imgProfile/<?= $checkPartner['photo']; ?>" alt="Free image" class="w-100 h-100" style="object-fit: cover; border-top-left-radius:3px;
                 border-bottom-left-radius:3px;">
            </div>
            <div class="col">
                <form method="#" action="">
                    <div class="d-flex
                             justify-content-center
                             align-items-center
                             flex-column">
                        <h3 class="display-4 fs-1 
                            text-center">
                            Here is Your Partner</h3>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Nama Lengkap</label>
                        <p><?= $checkPartner['nama_lengkap']; ?></p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Tanggal Lahir</label>
                        <?= $checkPartner['tanggal_lahir']; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Gender</label>
                        <?= $checkPartner['gender']; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Email</label>
                        <?= $checkPartner['email']; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            No. Handphone</label>
                        <?= $checkPartner['phone']; ?>
                    </div>
                    <a href="place.php?partnerId=<?= $partnerId; ?>">
                        <button type="button" name="free" id="freeBtn" class="btn btn-primary">
                            Pick Date Location</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('../includes/footer.php');

?>