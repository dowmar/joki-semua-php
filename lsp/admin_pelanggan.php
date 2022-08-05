<?php
session_start();
define("TITLE", "Pelanggan | Admin PetsQu Shop");
include('includes/header.php');
require "./config/conn.php";
$con = new config();
$results = $con->showPelanggan();
?>
<div class="cart">
    <div class="container">

        <div class="row">
            <div class="list-beli col-12">
                <div class="card my-2 bg-white text-dark">

                    <ul class="list-group list-group-flush">

                        <table class="table table-striped table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="text-center">Nama Pelanggan</th>
                                    <th scope="col" class="text-center">Alamat</th>
                                    <th scope="col" class="text-center">No Hp</th>
                                    <th scope="col" class="text-center">Username</th>
                                    <th scope="col" class="text-center">Password</th>
                                    <th scope="col" class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($results as $row) : ?>
                                    <tr>


                                        <td class="text-center"><?= $row["nama_pelanggan"]; ?></td>
                                        <td class="text-center"><?= $row["alamat_pelanggan"]; ?></td>
                                        <td class="text-center"><?= $row["no_hp"]; ?></td>
                                        <td class="text-center"><?= $row["username"]; ?></td>
                                        <td class="text-center"><?= $row["password"]; ?></td>
                                        <td class="text-center">

                                            <a href="./config/deletePelanggan.php?id=<?= $row["id_pelanggan"]; ?>"> <button class="btn btn-danger" type="submit" name="delete" style="width:100px; height:auto;">Delete</button></a>
                                        </td>
                                    </tr>

                                <?php endforeach ?>
                            </tbody>
                        </table>

                    </ul>


                </div>
            </div>

        </div>
    </div>
</div>