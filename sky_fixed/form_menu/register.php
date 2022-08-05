<?php

define("TITLE", "Register");
include('../includes/header.php');





?>

<div class="register vh-100">
    <div class="register-main bg-light text-dark rounded-3 my-5">
        <div class="row g-0" style="width: 1500px;">
            <div class="col">
                <img src="img/meon2.png" alt="Register image" class="w-100 h-100" style="object-fit: cover; border-top-left-radius:3px; border-bottom-left-radius:3px;">
            </div>
            <div class="col">
                <form method="post" action="../config/register_setting.php" enctype="multipart/form-data">
                    <div class="d-flex
                             justify-content-center
                             align-items-center
                             flex-column">
                        <h3 class="display-4 fs-1 
                            text-center">
                            Register</h3>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Nama Lengkap</label>
                        <input type="text" class="form-control" name="regNama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Dating Code</label>
                        <input type="number" min="0" max="999" class="form-control" name="regCode" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Tanggal Lahir</label>
                        <input type="date" class="form-control" name="regDate" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Gender :</label>
                        <br>
                        <div class="d-flex justify-content-evenly">
                            <input class="form-check-input" type="radio" name="regGender" value="Pria">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Pria
                            </label>
                            <input class="form-check-input" type="radio" name="regGender" value="Wanita">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Wanita
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Email</label>
                        <input type="text" class="form-control" name="regEmail" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Phone</label>
                        <input type="text" class="form-control" name="regPhone" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Photo</label>
                        <input type="file" class="form-control" name="regPhoto" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Password</label>
                        <input type="password" class="form-control" name="regPassword" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" required>
                    </div>

                    <button type="submit" name="register" id="registerBtn" class="btn btn-primary">
                        Register</button>
                    <a href="login.php" style="color:blue; text-decoration: none;" class="mx-2">Already have an account ? Login</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('../includes/footer.php');

?>