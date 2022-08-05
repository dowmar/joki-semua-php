<?php
session_start();
include('../config/connection.php');

$koneksi = new Config();


$results = $koneksi->allRequest();

?>

<table class="table table-striped table-bordered table-hover">
    <thead class="thead-light">
        <tr>
            <th scope="col" class="text-center">Dating Code</th>
            <th scope="col" class="text-center">Nama</th>


        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $row) : ?>
            <?php if ($_SESSION['dating_code'] == $row['receiver_id']) { ?>
                <tr>
                    <td class="text-center"><?= $row["sender_id"]; ?></td>
                    <td class="text-center"><?= $row["sender_name"]; ?></td>
                    <td>
                        <form action="./receive.php" method="POST">
                            <input type="submit" value="accept">
                            <input type="hidden" value="<?= $row["request_id"]; ?>" name="requestId">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        <?php endforeach ?>

    </tbody>
</table>