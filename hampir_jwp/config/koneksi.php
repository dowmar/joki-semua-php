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
        $query = $this->pdo->Kursus("DELETE FROM tb_produk WHERE id_produk='$id'");
        $query->execute();
        return $query->fetch();
    }
    public function addKursus($nama_produk, $deskripsi_produk, $harga_produk, $gambar_produk)
    {
        $query = $this->pdo->prepare("INSERT INTO tb_produk (nama_produk, deskripsi_produk,harga_produk, gambar_produk) VALUES (?,?,?,?)");

        $query->bindParam(1, $nama_produk);
        $query->bindParam(2, $deskripsi_produk);
        $query->bindParam(3, $harga_produk);
        $query->bindParam(4, $gambar_produk);

        $query->execute();
        return $query->rowCount();
    }
    function upload()
    {
        $namaGambar = $_FILES['gambar_produk']['name'];
        $ukuranGambar = $_FILES['gambar_produk']['size'];
        $error = $_FILES['gambar_produk']['error'];
        $tmpName = $_FILES['gambar_produk']['tmp_name'];

        if ($error === 4) {
            echo "<script>
        alert('Gambar belum dipilih');
        </script>";
            return false;
        }

        $ekstensiGambarType = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaGambar);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarType)) {
            echo "<script>
        alert('Yang di Upload Bukan Gambar');
        </script>";
            return false;
        }

        if ($ukuranGambar > 1000000) {
            echo "<script>
        alert('Ukuran gambar terlalu besar');
        </script>";
            return false;
        }


        move_uploaded_file($tmpName, 'list-produk/' . $namaGambar);

        return $namaGambar;
    }
}
