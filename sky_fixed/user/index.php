<?php
session_start();
define("TITLE", "Home");
include('../includes/header.php');
include('../config/connection.php');
// var_dump($_SESSION['nama_lengkap']);
// var_dump($_SESSION['dating_code']);
$player_id = $_SESSION['dating_code'];
$nama_lengkap = $_SESSION['nama_lengkap'];

$array = str_split($player_id, 3);
// var_dump($array['2']);

if (!isset($_SESSION['dating_code'])) {
    header("location:../form_menu/login.php");
    exit();
}


$koneksi = new Config();

if (isset($_POST['playerId'])) {
    $id = $_POST['playerId'];
    $checkuser = $koneksi->checkuser($id);
    $checkrequest = $koneksi->checkrequest($player_id, $id);
    var_dump($checkrequest);
    $player_id2 = $checkuser['dating_code'];
    $nama_lengkap2 = $checkuser['nama_lengkap'];
    if ($checkrequest == 0) {
        $createrequest = $koneksi->createrequest($player_id, $nama_lengkap, $player_id2, $nama_lengkap2, false);
    }
    $searchRequestId = $koneksi->searchrequestid($player_id, $player_id2);
    $_SESSION['request_id'] = $searchRequestId['request_id'];
    header("Location: challenge.php");
    exit();
}



// var_dump($nama_lengkap2);
// var_dump($id);



?>
<div class="online-container vh-100">
    <div class="onlinepl text-center " style=" margin-left:20%;width:60%; background:white; color:black; ">
        <div id="onlinepl">
        </div>
    </div>

    <div class="request text-center" style=" margin-left:20%;width:60%; background:white; color:black;">
        <h2> Requests </h2>
        <span id="req">

        </span>
    </div>
</div>

<script>
    function loadreq() {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("req").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "request.php?r=1", true);
        xmlhttp.send();

    }

    function loadonlinepl() {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("onlinepl").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "online.php?r=1", true);
        xmlhttp.send();

    }

    loadreq();
    setInterval("loadreq();", 500);
    loadonlinepl();
    setInterval("loadonlinepl();", 500);
</script>

<?php
include('../includes/footer.php');

?>