<?php 
class config
{
    public function __construct()
    {

        $host = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "petsqushop";

        try {
            $this->pdo = new PDO(
                "mysql:host=$host;dbname=$dbname",
                $username,
                $pass,
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed :" . $e->getMessage();
        }
    }
    public function login($username, $password)
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_usser WHERE user_npm='$username' AND user_password='$password' ");
        $query->execute();
        return $query->fetch();
    }
    public function updateKursus($id_produk, $nama_produk, $deskripsi_produk, $harga_produk, $gambar_produk)
    {
        $query = $this->pdo->prepare("UPDATE tb_produk SET 
        nama_produk ='$nama_produk',
        deskripsi_produk='$deskripsi_produk',
        harga_produk='$harga_produk',
        gambar_produk='$gambar_produk'
        
         WHERE id_produk = '$id_produk'");
        $query->execute();
        return $query->rowCount();
    }
    public function deleteProduct($id)
    {
        $query = $this->pdo->prepare("DELETE FROM tb_produk WHERE id_produk='$id'");
        $query->execute();
        return $query->fetch();
    }



    
}
