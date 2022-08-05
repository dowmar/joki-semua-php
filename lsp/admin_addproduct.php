<?php
// memulai sesi
session_start();
//definisikan judul dari halaman
define("TITLE", "Add Product | Admin PetsQu Shop");
//inlude dan require file, include header untuk tampilan header
//require conn.php untuk koneksi database
include('includes/header.php');
require "./config/conn.php";

//dikarenakan menggunakan PDO dan konsep OOP, class config() dipanggil dengan cara membuat class baru
$koneksi = new config();


//if condition dimana jika tombol dengan nama "add" di klik pada form dengan method post.
//isi dari if condition dibawah adalah untuk memasukkan produk baru
if (isset($_POST['add'])) {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $harga_produk = $_POST['harga_produk'];
    $gambar_produk = $koneksi->upload();
    $add = $koneksi->addProduct($nama_produk, $deskripsi_produk, $harga_produk, $gambar_produk);
    echo "<script>
    alert('product ditambahkan');
    document.location.href = 'admin_product.php';
    </script>";
}

?>
<!-- container untuk form add produk  -->
<div class="free vh-100">
    <div class="free-main bg-light text-dark rounded-3 my-5">
        <div class="row g-0">
            <div class="col">
                <img src="img/meon2.png" alt="AddProduk image" class="w-100 h-100" style="object-fit: cover; border-top-left-radius:3px; border-bottom-left-radius:3px;">
            </div>
            <div class="col">
                <form method="post" action="admin_addproduct.php" enctype="multipart/form-data">
                    <div class="d-flex
                             justify-content-center
                             align-items-center
                             flex-column">
                        <h3 class="display-4 fs-1 
                            text-center">
                            Add Product</h3>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Deskripsi Produk</label>
                        <input type="text" class="form-control" name="deskripsi_produk" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Harga Produk</label>
                        <input type="number" class="form-control" name="harga_produk" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Gambar Produk</label>
                        <input type="file" class="form-control" name="gambar_produk" required>
                    </div>

                    <button type="submit" name="add" id="addBtn" class="btn btn-primary">
                        Add Product</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- akhir dari container form add produk -->
<?php include('includes/footer.php'); ?>