<?php

session_start();
define("TITLE", "Home");
include('../includes/header.php');
if (!isset($_SESSION['request_id'])) {
    echo "<script>
    alert('request_id unset');
    </script>";
    header("location:index.php");
    exit();
}



?>
<div class="online-container vh-100">
    <div class="text-center " style=" margin-left:20%;width:60%; color:white;">
        <h2> Waiting for him to accept </h2>
        <span id="req"> </span>
        <?php
        ?>
    </div>
</div>

<script>
    var id = <?= $_SESSION['request_id']; ?>;

    function check() {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "true") {
                    document.getElementById("txt").innerHTML = "<center><h2> Accepted!</h2></center>";
                    deleterequest();
                    window.location = "../game/game.php";
                }
            }
        };
        xmlhttp.open("GET", "checkrequest.php?requestid=" + id, true);
        xmlhttp.send();
    }

    function deleterequest() { // this function send requestid to checkrequest.php page to check if the request is accepted or not
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txt").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "requestacc.php?requestid=" + id, true);
        xmlhttp.send();
    }

    check();
    setInterval("check();", 600);
</script>
<span id="txt">

</span>
<span id="txt1"> </span>
</div>
</div>
</div>

</script>
<?php
include('../includes/footer.php');

?>