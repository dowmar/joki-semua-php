<?php
class config
{
    public function __construct()
    {

        $host = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "ikan";

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

    public function register($nama, $email, $password)
    {
        $query = $this->pdo->prepare("INSERT INTO ik_user (nama, email,password) VALUES (?,?,?)");

        $query->bindParam(1, $nama);
        $query->bindParam(2, $email);
        $query->bindParam(3, $password);

        $query->execute();
        return $query->rowCount();
    }

    public function login($email)
    {
        $query = $this->pdo->prepare("SELECT * FROM ik_user WHERE email='$email'");
        $query->execute();
        return $query->fetch();
    }


    public function showItems()
    {
        $query = $this->pdo->prepare("SELECT * FROM ik_item ORDER BY nama_item ASC");
        $query->execute();
        return $query->fetchAll();
    }


    public function addCart($email, $item_name, $item_price,  $price_total)
    {
        $query = $this->pdo->prepare("INSERT INTO ik_cart (email, nbarang_cart, hbarang_cart, hbarang_total) VALUES (?,?,?,?)");
        $query->bindParam(1, $email);
        $query->bindParam(2, $item_name);
        $query->bindParam(3, $item_price);
        $query->bindParam(4, $price_total);
        $query->execute();
        return $query->rowCount();
    }

    public function addItem($nama_item, $img_item, $harga_item)
    {
        $query = $this->pdo->prepare("INSERT INTO ik_item (nama_item, img_item, harga_item) VALUES (?,?,?)");
        $query->bindParam(1, $nama_item);
        $query->bindParam(2, $img_item);
        $query->bindParam(3, $harga_item);
        $query->execute();
        return $query->rowCount();
    }

    public function showCart($email)
    {
        $query = $this->pdo->prepare("SELECT * FROM ik_cart WHERE email = '$email'");
        $query->execute();
        return $query->fetchAll();
    }

    public function payment($email, $total_pembelian, $jml_bayar, $metode_bayar)
    {
        $query = $this->pdo->prepare("INSERT INTO ik_payment_history (email, total_pembelian, jml_bayar,metode_bayar) VALUES (?,?,?,?)");
        $query->bindParam(1, $email);
        $query->bindParam(2, $total_pembelian);
        $query->bindParam(3, $jml_bayar);
        $query->bindParam(4, $metode_bayar);
        $query->execute();
        return $query->rowCount();
    }

    public function mycourse($email, $nama_course)
    {
        $query = $this->pdo->prepare("INSERT INTO ik_user_course (email_user, course) VALUES (?,?)");
        $query->bindParam(1, $email);
        $query->bindParam(2, $nama_course);
        $query->execute();
        return $query->rowCount();
    }

    public function remove($email)
    {
        $query = $this->pdo->prepare("DELETE FROM ik_cart WHERE email='$email'");
        $query->execute();
        return $query->fetch();
    }
    public function showHistory()
    {
        $query = $this->pdo->prepare("SELECT * FROM ik_payment_history ORDER BY id ASC");
        $query->execute();
        return $query->fetchAll();
    }
}
