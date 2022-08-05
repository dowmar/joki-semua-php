<?php
session_start();

require "connpdo.php";
$con = new config();



if (isset($_POST['login'])) {

    $phone = $_POST['phone_number'];
    $password = $_POST['password'];
    $results = $con->login($phone);

    if ($results['phone_number'] == $phone && $results['password'] == $password) {
        $_SESSION['nama'] = $results['nama'];
        $_SESSION['phone_number'] = $results['phone_number'];
        header("Location: menupdo.php");
    } else {
        echo "<script>
        document.location.href = 'login.php';
        alert('Wrong Phone Number / Password');
        </script>";
    }
}

if (!isset($_SESSION['nama'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="img/logo.png">
    </head>

    <body class="d-flex
             justify-content-center
             align-items-center
             vh-100">
        <div class="w-400 p-5 shadow rounded">
            <form method="post" action="login.php">
                <div class="d-flex
	 		            justify-content-center
	 		            align-items-center
	 		            flex-column">

                    <h3 class="display-4 fs-1 
	 		           text-center">
                        LOGIN</h3>

                </div>
                <div class="mb-3">
                    <label class="form-label">
                        Phone Number</label>
                    <input type="text" class="form-control" name="phone_number">
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Password</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <button type="submit" class="btn btn-primary" name="login">
                    LOGIN</button>
                <a href="signup.php" style="color:black; text-decoration: none;" class="mx-2">Sign Up</a>
            </form>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: menupdo.php");
    exit;
}
?>