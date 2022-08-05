<?php
session_start();
include('../config/connection.php');

$koneksi = new Config();
$dating_code = $_SESSION['dating_code'];
$array = str_split($dating_code, 3);
$partnerid = $array['1'];
$gender = $array['2'];
if ($gender == '01') {
    $oppgender = '02';
} else {
    $oppgender = '01';
}

$results = $koneksi->lookOnline($dating_code, $oppgender);
$partners = $koneksi->partnerOnline($partnerid, $oppgender);

?>

<table class="table table-striped table-bordered table-hover">
    <thead class="thead-light ">
        <h2 class="text-center">List Online</h2>
        <tr>
            <th scope="col" class="text-center">Dating Code</th>
            <th scope="col" class="text-center">Nama</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $row) : ?>
            <tr>

                <td class="text-center"><?= $row["dating_code"]; ?></td>
                <td class="text-center"><?= $row["nama"]; ?></td>
                <td>
                    <form action="index.php" method="POST">
                        <input type="hidden" value="<?= $row["dating_code"]; ?>" name="playerId">
                        <input type="submit" name="start" value="start">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>

    </tbody>
</table>

<table class="table table-striped table-bordered table-hover">
    <thead class="thead-light">
        <h2 class="text-center">Your wedding partner</h2>
        <tr>
            <th scope="col" class="text-center">Dating Code</th>
            <th scope="col" class="text-center">Nama</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($partners as $row) : ?>
            <tr>
                <td class="text-center"><?= $row["dating_code"]; ?></td>
                <td class="text-center"><?= $row["nama"]; ?></td>
                <td>
                    <form action="../commerce/partner.php" method="POST">
                        <input type="hidden" value="<?= $row["dating_code"]; ?>" name="partnerId">
                        <input type="hidden" value="<?= $_SESSION["dating_code"]; ?>" name="currentId">
                        <input type="submit" name="Date" value="Date">
                    </form>
                </td>
            </tr>
        <?php endforeach ?>

    </tbody>
</table>