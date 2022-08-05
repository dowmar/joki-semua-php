<?php

session_start();
define("TITLE", "Login");
include('../includes/header.php');


?>

<div class="login vh-100">
    <div class="login-main bg-light text-dark rounded-3 my-5">
        <div class="row g-0">
            <div class="col">
                <img src="./images/meon2.png" alt="Login image" class="w-100 h-100" style="object-fit: cover; border-top-left-radius:3px; border-bottom-left-radius:3px;">
            </div>
            <div class="col">
                <form method="post" action="../config/login_setting.php">
                    <div class="d-flex
                             justify-content-center
                             align-items-center
                             flex-column">
                        <h3 class="display-4 fs-1 
                            text-center">
                            Login</h3>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Email / ID</label>
                        <input type="text" class="form-control" name="codeOrEmail" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <button type="submit" name="login" id="loginBtn" class="btn btn-primary">
                        Login</button>
                    <a href="register.php" style="color:blue; text-decoration: none;" class="mx-2">Don't have an account? Sign Up</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('../includes/footer.php');

?>