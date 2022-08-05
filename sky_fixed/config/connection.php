<?php
class config
{
    public function __construct()
    {

        $host = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "skywedding";

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

    public function login($codeOrEmail, $password)
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_user WHERE dating_code='$codeOrEmail' OR email='$codeOrEmail' AND password='$password'");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function checkuser($codeOrEmail)
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_user WHERE dating_code='$codeOrEmail' OR email='$codeOrEmail'");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function alluser()
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_user");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function register($dating_code, $nama, $date, $gender, $email, $phone, $datePhoto, $password, $status)
    {
        $query = $this->pdo->prepare("INSERT INTO tb_user 
        (dating_code, 
        nama_lengkap,
        tanggal_lahir, 
        gender, 
        email,
        phone,
        photo,
        password,
        status) VALUES (?,?,?,?,?,?,?,?,?)");

        $query->bindParam(1, $dating_code);
        $query->bindParam(2, $nama);
        $query->bindParam(3, $date);
        $query->bindParam(4, $gender);
        $query->bindParam(5, $email);
        $query->bindParam(6, $phone);
        $query->bindParam(7, $datePhoto);
        $query->bindParam(8, $password);
        $query->bindParam(9, $status);

        $query->execute();
        return $query->rowCount();
    }

    public function addPlace($id_kota, $alamat, $harga, $gambar)
    {
        $query = $this->pdo->prepare("INSERT INTO tb_place 
        (id_kota, 
        alamat,
        harga, 
        gambar) VALUES (?,?,?,?)");

        $query->bindParam(1, $id_kota);
        $query->bindParam(2, $alamat);
        $query->bindParam(3, $harga);
        $query->bindParam(4, $gambar);


        $query->execute();
        return $query->rowCount();
    }

    public function online($dating_code, $nama)
    {
        $query = $this->pdo->prepare("INSERT INTO tb_online (dating_code, nama) VALUES (?,?)");
        $query->bindParam(1, $dating_code);
        $query->bindParam(2, $nama);
        $query->execute();
        return $query->rowCount();
    }


    public function lookOnline($dating_code, $oppgender)
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_online WHERE dating_code LIKE '%$oppgender' EXCEPT SELECT * FROM tb_online WHERE dating_code='$dating_code'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function partnerOnline($currid, $oppgender)
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_online WHERE dating_code LIKE '%$currid%$oppgender' ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteOnline($dating_code)
    {
        $query = $this->pdo->prepare("DELETE FROM tb_online WHERE dating_code='$dating_code'");
        $query->execute();
        return $query->fetch();
    }

    public function checkrequest($id1, $id2)
    {
        $query = $this->pdo->prepare("SELECT * from tb_request WHERE sender_id='$id1' AND receiver_id='$id2'");
        $query->execute();
        return $query->rowCount();
    }

    public function createrequest($player_id, $nama_lengkap, $player_id2, $nama_lengkap2, $status)
    {
        $query = $this->pdo->prepare("INSERT INTO tb_request (sender_id, sender_name, receiver_id, receiver_name, status ) VALUES (?,?,?,?,?)");
        $query->bindParam(1, $player_id);
        $query->bindParam(2, $nama_lengkap);
        $query->bindParam(3, $player_id2);
        $query->bindParam(4, $nama_lengkap2);
        $query->bindParam(5, $status);
        $query->execute();
        return $query->rowCount();
    }

    public function searchrequestid($player_id, $player_id2)
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_request WHERE sender_id='$player_id' AND receiver_id='$player_id2'");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function allRequest()
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_request");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function oneRequest($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_request WHERE request_id='$id'");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function updateRequest($reqId)
    {
        $query = $this->pdo->prepare("UPDATE tb_request SET
        status = 'true'
        WHERE request_id = '$reqId'
        ");
        $query->execute();
        return $query->rowCount();
    }
    public function updateStatus($currStatus, $currid)
    {
        $query = $this->pdo->prepare("UPDATE tb_user SET
        status = '$currStatus'
        WHERE dating_code = '$currid'
        ");
        $query->execute();
        return $query->rowCount();
    }
    public function deleteExist($ply1, $senderId)
    {
        $query = $this->pdo->prepare("DELETE FROM tb_session WHERE ply1='$ply1' AND ply2='$senderId'");
        $query->execute();
        return $query->rowCount();
    }
    public function insertSession($ply1, $ply2, $box1, $box2, $box3, $box4, $box5, $box6, $box7, $box8, $box9, $ply1scr, $ply2scr, $turn, $count)
    {
        $query = $this->pdo->prepare("INSERT INTO tb_session
        (ply1,ply2,box1,box2,box3,box4,box5,box6,box7,box8,box9,
        ply1scr,ply2scr,turn,count) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $query->bindParam(1, $ply1);
        $query->bindParam(2, $ply2);
        $query->bindParam(3, $box1);
        $query->bindParam(4, $box2);
        $query->bindParam(5, $box3);
        $query->bindParam(6, $box4);
        $query->bindParam(7, $box5);
        $query->bindParam(8, $box6);
        $query->bindParam(9, $box7);
        $query->bindParam(10, $box8);
        $query->bindParam(11, $box9);
        $query->bindParam(12, $ply1scr);
        $query->bindParam(13, $ply2scr);
        $query->bindParam(14, $turn);
        $query->bindParam(15, $count);
        $query->execute();
        return $query->rowCount();
    }
    public function searchSession($ply1, $ply2)
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_session WHERE ply1='$ply1' AND ply2='$ply2'");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteRequest($request_id)
    {
        $query = $this->pdo->prepare("DELETE FROM tb_request WHERE request_id='$request_id'");
        $query->execute();
        return $query->rowCount();
    }

    public function searchSessionId($session_id)
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_session WHERE session_id='$session_id'");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function setScoreBox($box, $val, $game_session)
    {
        $query = $this->pdo->prepare("UPDATE tb_session SET
        `box$box`='$val',
        count = count+1
        WHERE session_id='$game_session'");
        $query->execute();
        return $query->rowCount();
    }

    public function showAllPlace()
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_place ORDER BY id_lokasi ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showSpecificPlace($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM tb_place WHERE id_lokasi='$id' ORDER BY id_lokasi ASC");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function checkout($currId, $partnerId, $locationId)
    {
        $query = $this->pdo->prepare("INSERT INTO tb_history 
        (pemesan, 
        pasangan,
        id_lokasi) VALUES (?,?,?)");

        $query->bindParam(1, $currId);
        $query->bindParam(2, $partnerId);
        $query->bindParam(3, $locationId);

        $query->execute();
        return $query->rowCount();
    }


    function upload()
    {
        $namaGambar = $_FILES['regPhoto']['name'];
        $ukuranGambar = $_FILES['regPhoto']['size'];
        $error = $_FILES['regPhoto']['error'];
        $tmpName = $_FILES['regPhoto']['tmp_name'];

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

        if ($ukuranGambar > 5000000) {
            echo "<script>
        alert('Ukuran gambar terlalu besar');
        </script>";
            return false;
        }


        move_uploaded_file($tmpName, '../imgProfile/' . $namaGambar);

        return $namaGambar;
    }

    function upload2()
    {
        $namaGambar = $_FILES['gambar']['name'];
        $ukuranGambar = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

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

        if ($ukuranGambar > 5000000) {
            echo "<script>
        alert('Ukuran gambar terlalu besar');
        </script>";
            return false;
        }


        move_uploaded_file($tmpName, '../imgLocation/' . $namaGambar);

        return $namaGambar;
    }
}
