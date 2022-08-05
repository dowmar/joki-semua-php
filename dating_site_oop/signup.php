<?php
session_start();

require "connpdo.php";

$con = new config();

$daftar = rand(100000, 125000);

if (isset($_POST['testo'])) {

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $interest = $_POST['interest'];
    $reg = $_POST['daftar'];
    $paid = $_POST['paid'];
    $password = $_POST['password'];
    $photo = $_POST['photo'];

    $_SESSION['phone_number'] =  $phone_number;

    $signup = $con->register($nama, $photo, $username, $gender, $phone_number, $password, $interest, $reg, $paid, "true");
    echo "<script>
    document.location.href = 'payment.php';
    </script>";
}

if (!isset($_SESSION['nama'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up</title>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="img/logo.png">

    </head>
    <body class="d-flex
             justify-content-center
             align-items-center
             vh-100">
        <div class="w-400 p-5 shadow rounded">
            <form method="post" action="signup.php">
                <div class="d-flex
	 		            justify-content-center
	 		            align-items-center
	 		            flex-column">

                    <h3 class="display-4 fs-1 
	 		           text-center">
                        Sign Up</h3>
                </div>

                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-warning" role="alert">
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php }

                ?>

                <div class="mb-3">
                    <label class="form-label">
                        Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        Gender :</label>
                    <br>

                    <div class="d-flex justify-content-evenly">
                        <input class="form-check-input" type="radio" name="gender" value="pria">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Men
                        </label>
                        <input class="form-check-input" type="radio" name="gender" value="wanita">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Women
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        Interested In : </label>
                    <br>
                    <div class="d-flex justify-content-evenly">
                        <input class="form-check-input" type="radio" name="interest" value="pria">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Men
                        </label>
                        <input class="form-check-input" type="radio" name="interest" value="wanita">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Women
                        </label>
                    </div>

                </div>
                <div class="mb-3">
                    <label class="form-label">
                        Upload Profile Photo:</label>
                    <input type="file" class="form-control" name="photo" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">
                        Biaya Pendaftaran : Rp. <?= $daftar; ?></label>
                    <input type="hidden" class="form-control" name="daftar" id="daftar" value="<?= $daftar; ?>">
                    <input type="number" min="100000" class="form-control" name="paid" id="payment" placeholder="<?= $daftar; ?>" required>
                </div>

                <button type="submit" name="testo" id="signUpButton" class="btn btn-primary">
                    Sign Up</button>
                <a href="login.php" style="color:black; text-decoration: none;" class="mx-2">Login</a>
            </form>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>

    </html>
<?php
} else {
    header("Location: menupdo.php");
    exit;
}
?>