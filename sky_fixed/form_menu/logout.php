<?php
include("../config/connection.php");
session_start();

$koneksi = new Config();
$delete = $koneksi->deleteOnline($_SESSION['dating_code']);
session_destroy();
session_unset();

header("Location: login.php");
