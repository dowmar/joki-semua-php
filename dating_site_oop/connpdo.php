<?php
class config
{

    public function __construct()
    {

        $host = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "webased";

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

    public function register($nama, $avatar, $username, $gender, $phone_number, $password, $interest, $reg, $paid, $visibility)
    {
        $query = $this->pdo->prepare("INSERT INTO ms_user (nama, avatar,username, gender, phone_number,password, interest,registration,paid, set_visible) VALUES (?,?,?,?,?,?,?,?,?,?)");

        $query->bindParam(1, $nama);
        $query->bindParam(2, $avatar);
        $query->bindParam(3, $username);
        $query->bindParam(4, $gender);
        $query->bindParam(5, $phone_number);
        $query->bindParam(6, $password);
        $query->bindParam(7, $interest);
        $query->bindParam(8, $reg);
        $query->bindParam(9, $paid);
        $query->bindParam(10, $visibility);

        $query->execute();
        return $query->rowCount();
    }

    public function payment_get_phone($phone)
    {
        $query = $this->pdo->prepare("SELECT * FROM ms_user where phone_number=?");
        $query->bindParam(1, $phone);
        $query->execute();
        return $query->fetch();
    }

    public function convert_token($total, $phone)
    {
        $query = $this->pdo->prepare("UPDATE ms_user SET token ='$total' WHERE phone_number = '$phone'");
        $query->execute();
        return $query->rowCount();
    }

    public function payment_reg($paid, $phone)
    {
        $query = $this->pdo->prepare("UPDATE ms_user SET paid ='$paid' WHERE phone_number = '$phone'");
        $query->execute();
        return $query->rowCount();
    }

    public function login($phone)
    {
        $query = $this->pdo->prepare("SELECT * FROM ms_user WHERE phone_number='$phone'");
        $query->execute();
        return $query->fetch();
    }

    public function showAll($visibility)
    {
        $query = $this->pdo->prepare("SELECT * FROM ms_user WHERE set_visible =? ORDER BY nama ASC");
        $query->bindParam(1, $visibility);
        $query->execute();
        return $query->fetchAll();
    }

    public function wishAuth($username)
    {
        $query = $this->pdo->prepare("SELECT username FROM ms_wishlish WHERE username='$username'");
        $query->execute();
        return $query->rowCount();
    }

    public function wishInsert($username)
    {
        $query = $this->pdo->prepare("INSERT INTO ms_wishlish (nama, avatar, gender, username, phone_number, interest)
        SELECT nama,avatar, gender, username, phone_number, interest
        FROM ms_user
        WHERE username = ?");
        $query->bindParam(1, $username);
        $query->execute();
        return $query->rowCount();
    }

    public function showGender($gender)
    {
        $query = $this->pdo->prepare("SELECT * FROM ms_user WHERE gender = '$gender'");
        $query->execute();
        return $query->fetchAll();
    }

    public function showPhone($key)
    {
        $query = $this->pdo->prepare("SELECT * FROM ms_user WHERE phone_number LIKE :keyword ORDER BY phone_number ASC");
        $query->bindValue(':keyword', '%' . $key . '%', PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll();
    }

    public function showAllWishlish()
    {
        $query = $this->pdo->prepare("SELECT * FROM ms_wishlish ORDER BY nama ASC");
        $query->execute();
        return $query->fetchAll();
    }

    public function showAvatar()
    {
        $query = $this->pdo->prepare("SELECT * FROM ms_avatar ORDER BY avatar_price ASC");
        $query->execute();
        return $query->fetchAll();
    }

    public function selectToken($phone)
    {
        $query = $this->pdo->prepare("SELECT token FROM ms_user WHERE phone_number='$phone'");
        $query->execute();
        return $query->fetch();
    }

    public function updateToken($hasil, $phone)
    {
        $query = $this->pdo->prepare("UPDATE ms_user SET token ='$hasil' WHERE phone_number = '$phone' ");
        $query->execute();
        return $query->rowCount();
    }

    public function showCollection($phone)
    {
        $query = $this->pdo->prepare("SELECT * FROM ms_collector WHERE phone_number='$phone'");
        $query->execute();
        return $query->fetchAll();
    }


    public function insertAvatar($phone, $ava_img)
    {
        $query = $this->pdo->prepare("INSERT INTO ms_collector (phone_number, avatar_bought) VALUES (?,?)");
        $query->bindParam(1, $phone);
        $query->bindParam(2, $ava_img);
        $query->execute();
        return $query->rowCount();
    }

    public function wishgift($phone, $avatar_img)
    {
        $query = $this->pdo->prepare("INSERT INTO ms_collector (phone_number, avatar_gifted) VALUES (?,?)");
        $query->bindParam(1, $phone);
        $query->bindParam(2, $avatar_img);
        $query->execute();
        return $query->rowCount();
    }

    public function wishDelete($phone)
    {
        $query = $this->pdo->prepare("DELETE FROM ms_wishlish WHERE phone_number='$phone'");
        $query->execute();
        return $query->fetch();
    }

    public function updateAvatar($avatar_img, $phone)
    {
        $query = $this->pdo->prepare("UPDATE ms_user SET avatar ='$avatar_img' WHERE phone_number = '$phone' ");
        $query->execute();
        return $query->rowCount();
    }

    public function profile($nama)
    {
        $query = $this->pdo->prepare("SELECT * FROM ms_user WHERE nama='$nama'");
        $query->execute();
        return $query->fetch();
    }

    public function tambahToken($hasil, $phone)
    {
        $query = $this->pdo->prepare("UPDATE ms_user SET token ='$hasil' WHERE phone_number = '$phone' ");
        $query->execute();
        return $query->rowCount();
    }

    public function all_from_phone($phone)
    {
        $query = $this->pdo->prepare("SELECT * FROM ms_user WHERE phone_number='$phone'");
        $query->execute();
        return $query->fetch();
    }

    public function visible($hasil, $visibility, $phone)
    {
        $query = $this->pdo->prepare("UPDATE ms_user SET token ='$hasil', set_visible = '$visibility' WHERE phone_number = '$phone' ");
        $query->execute();
        return $query->rowCount();
    }
}
