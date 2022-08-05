<?php

session_start();

require "connpdo.php";

$con = new config();



$phone = $_SESSION['phone_number'];
$result = $con->payment_get_phone($phone);
$cnt = $result['paid'] - $result['registration'];
$total = abs($cnt);

if ($total === 0) {
    session_unset();
    session_destroy();
    echo "<script>
    document.location.href = 'login.php';
    </script>";
}




if (isset($_POST['confirm'])) {
    $convert = $con->convert_token($total, $phone);
    if ($convert) {
        session_unset();
        session_destroy();
        echo "<script>
        document.location.href = 'login.php';
        </script>";
    }
}

if (isset($_POST['bayar'])) {
    $paid = $_POST['paid'];
    $pay = $con->payment_reg($paid, $phone);
    if ($pay) {
        echo "<script>
        document.location.href = 'payment.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.png">
</head>

<body class="d-flex
             justify-content-center
             align-items-center
             vh-100">
    <div class="p-5 shadow rounded" style="min-width: 500px;">

        <?php if ($result['paid'] > $result['registration']) {
        ?>
            <form method="post" action="payment.php">
                <div class="d-flex
	 		            justify-content-center
	 		            align-items-center
	 		            flex-column">

                    <h3 class="display-4 fs-1 
	 		           text-center">
                        Konfirmasi</h3>

                </div>


                <div class="alert alert-warning" role="alert">
                    <p>Maaf Anda lebih bayar Rp.<?= $total; ?> mau
                        masukan Saldo?</p>
                    <p>Sisa uang anda akan kami masukan dalam saldo wallet dengan rate 1:1</p>
                </div>



                <fieldset disabled>
                    <div class="mb-3">
                        <label class="form-label">
                            Jumlah yang harus dibayar</label>
                        <input type="text" class="form-control" name="password" value="<?= $result['registration']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Terbayar</label>
                        <input type="text" class="form-control" name="phone_number" value="<?= $result['paid']; ?>">
                    </div>

                </fieldset>


                <button type="submit" class="btn btn-primary" name="confirm">
                    Konfirmasi</button>
                <a href="logout.php" style="color:black; text-decoration: none;" class="mx-2">Kembali</a>
            </form>
        <?php } else { ?>
            <form method="post" action="payment.php">
                <div class="d-flex
	 		            justify-content-center
	 		            align-items-center
	 		            flex-column">


                    <h3 class="display-4 fs-1 
	 		           text-center">
                        Konfirmasi</h3>

                </div>
                <div class="alert alert-danger" role="alert">
                    Maaf Anda masih
                    kurang bayar Rp. <?= $total ?>
                </div>
                <fieldset disabled>
                    <div class="mb-3">
                        <label class="form-label">
                            Jumlah yang harus dibayar</label>
                        <input type="number" class="form-control" name="regis" value="<?= $result['registration']; ?>">
                    </div>
                </fieldset>
                <div class="mb-3">
                    <label class="form-label">
                        Terbayar</label>
                    <input type="number" class="form-control" min="<?= $result['paid']; ?>" name="paid" placeholder="<?= $result['paid']; ?>">
                </div>

                <button type="submit" class="btn btn-primary" name="bayar">
                    Confirm</button>
                <a href="payment.php" style="color:black; text-decoration: none;" class="mx-2">Sign Up</a>
            </form>
        <?php

        }
        ?>
    </div>
</body>

</html>