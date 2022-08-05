<?php
// memulai sesi
session_start();
//definisikan judul dari halaman
define("TITLE", "Edit Product | Admin PetsQu Shop");
//inlude dan require file, include header untuk tampilan header
//require conn.php untuk koneksi database
include('includes/header.php');
require "./config/conn.php";
//dikarenakan menggunakan PDO dan konsep OOP, class config() dipanggil dengan cara membuat class baru
$koneksi = new config();
//mengambil parameter id dengan menggunakan method get
$id = $_GET["id"];
//memanggil function editProduct dengan parameter $id
$results = $koneksi->editProduct($id);

//if condition dimana jika tombol dengan nama "edit" di klik pada form dengan method post.
//isi dari if condition dibawah adalah untuk update produk 
if (isset($_POST['edit'])) {
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $harga_produk = $_POST['harga_produk'];
    $gambar_produk = $koneksi->upload();
    $update = $koneksi->updateProduk($id_produk, $nama_produk, $deskripsi_produk, $harga_produk, $gambar_produk);
    if ($update) {
        echo "<script>
        alert('product diupdate');
        </script>";
    } else {
        echo "<script>
        alert('product gagal diupdate');
        </script>";
    }
}

?>
<!-- container untuk form edit produk  -->
<div class="free vh-100">
    <div class="free-main bg-light text-dark rounded-3 my-5">
        <div class="row g-0">
            <div class="col">
                <img src="img/meon2.png" alt="edit image" class="w-100 h-100" style="object-fit: cover; border-top-left-radius:3px; border-bottom-left-radius:3px;">
            </div>
            <div class="col">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="d-flex
                             justify-content-center
                             align-items-center
                             flex-column">
                        <h3 class="display-4 fs-1 
                            text-center">
                            Update Product</h3>
                    </div>
                    <div class="mb-3">
                        <input type="hidden" name="id_produk" value="<?= $results["id_produk"]; ?>">
                        <label class="form-label">
                            Nama Produk</label>

                        <input type="text" class="form-control" name="nama_produk" value="<?= $results["nama_produk"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Deskripsi Produk</label>
                        <input type="text" class="form-control" name="deskripsi_produk" value="<?= $results["deskripsi_produk"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Harga Produk</label>
                        <input type="number" class="form-control" name="harga_produk" value="<?= $results["harga_produk"]; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Gambar Produk</label>
                        <input type="file" class="form-control" name="gambar_produk" value="<?= $results["gambar_produk"]; ?>">
                    </div>

                    <button type="submit" name="edit" id="addBtn" class="btn btn-primary">
                        Update</button>
                    <a href="admin_product.php"><button type="button" class="btn btn-secondary">Kembali</button></a>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- akhir dari container form add produk -->
<?php include('includes/footer.php'); ?>