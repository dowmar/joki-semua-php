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
        $query = $this->pdo->prepare("SELECT * FROM tb_pelanggan WHERE username='$username' AND password='$password' ");
        $query->execute();
        return $query->fetch();
    }
    public function loginAdmin($username, $password)
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_admin WHERE username='$username' AND password='$password' ");
        $query->execute();
        return $query->fetch();
    }
    public function register($nama, $alamat, $hp, $username, $password)
    {
        $query = $this->pdo->prepare("INSERT INTO tb_pelanggan (nama_pelanggan, alamat_pelanggan,no_hp, username, password) VALUES (?,?,?,?,?)");

        $query->bindParam(1, $nama);
        $query->bindParam(2, $alamat);
        $query->bindParam(3, $hp);
        $query->bindParam(4, $username);
        $query->bindParam(5, $password);

        $query->execute();
        return $query->rowCount();
    }


    public function showItems()
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_produk ORDER BY nama_produk ASC");
        $query->execute();
        return $query->fetchAll();
    }
    public function showPelanggan()
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_pelanggan ORDER BY username ASC");
        $query->execute();
        return $query->fetchAll();
    }

    public function showCart()
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_pembelian ORDER BY id_pembelian ASC");
        $query->execute();
        return $query->fetchAll();
    }

    public function addCart($id_produk, $id_pelanggan, $date, $harga_produk, $quantity, $total)
    {
        $query = $this->pdo->prepare("INSERT INTO tb_pembelian (id_produk, id_pelanggan, tgl_pembelian, jumlah,harga,total) VALUES (?,?,?,?,?,?)");

        $query->bindParam(1, $id_produk);
        $query->bindParam(2, $id_pelanggan);
        $query->bindParam(3, $date);
        $query->bindParam(4, $quantity);
        $query->bindParam(5, $harga_produk);
        $query->bindParam(6, $total);

        $query->execute();
        return $query->rowCount();
    }

    public function showTest($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM `tb_pembelian` c INNER JOIN `tb_produk` p ON c.`id_produk` = p.`id_produk` WHERE id_pelanggan = $id");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function editCart($id, $jumlah, $harga)
    {
        $query = $this->pdo->prepare("UPDATE tb_pembelian SET 
        jumlah='$jumlah',
        total='$harga'
         WHERE id_pembelian = '$id'");
        $query->execute();
        return $query->rowCount();
    }
    public function deleteCart($id)
    {
        $query = $this->pdo->prepare("DELETE FROM tb_pembelian WHERE id_pembelian='$id'");
        $query->execute();
        return $query->fetch();
    }
    public function deleteAllCart($id)
    {
        $query = $this->pdo->prepare("DELETE FROM tb_pembelian WHERE id_pelanggan='$id'");
        $query->execute();
        return $query->fetch();
    }

    public function addHistory($id_pelanggan, $date, $total)
    {
        $query = $this->pdo->prepare("INSERT INTO tb_historypembelian (id_pelanggan, tanggal,total) VALUES (?,?,?)");

        $query->bindParam(1, $id_pelanggan);
        $query->bindParam(2, $date);
        $query->bindParam(3, $total);


        $query->execute();
        return $query->rowCount();
    }

    public function addProduct($nama_produk, $deskripsi_produk, $harga_produk, $gambar_produk)
    {
        $query = $this->pdo->prepare("INSERT INTO tb_produk (nama_produk, deskripsi_produk,harga_produk, gambar_produk) VALUES (?,?,?,?)");

        $query->bindParam(1, $nama_produk);
        $query->bindParam(2, $deskripsi_produk);
        $query->bindParam(3, $harga_produk);
        $query->bindParam(4, $gambar_produk);

        $query->execute();
        return $query->rowCount();
    }
    public function editProduct($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_produk WHERE id_produk='$id'");
        $query->execute();
        return $query->fetch();
    }

    public function updateProduk($id_produk, $nama_produk, $deskripsi_produk, $harga_produk, $gambar_produk)
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

    public function deletePelanggan($id)
    {
        $query = $this->pdo->prepare("DELETE FROM tb_pelanggan WHERE id_pelanggan='$id'");
        $query->execute();
        return $query->fetch();
    }

    public function showSearch($key)
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_produk WHERE nama_produk LIKE :keyword ORDER BY nama_produk ASC");
        $query->bindValue(':keyword', '%' . $key . '%', PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll();
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
