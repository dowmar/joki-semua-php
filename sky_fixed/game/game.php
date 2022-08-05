<?php
session_start();
define("TITLE", "Game");
include('../includes/header.php');
include('../config/connection.php');


$koneksi = new Config();

if (!isset($_SESSION['nama_lengkap'])) {
    echo "<script>
    alert('no session nama lengkap');
    </script>";
}
if (!isset($_SESSION['pid'])) {
    echo "<script>
    alert('no session pid');
    </script>";
}




$getId = $koneksi->searchSessionId($_SESSION['game_session']);
$ply1id = $getId['ply1'];
$ply2id = $getId['ply2'];

$ply1getname = $koneksi->checkuser($ply1id);
$ply1name = $ply1getname['nama_lengkap'];

$ply2getname = $koneksi->checkuser($ply2id);
$ply2name = $ply2getname['nama_lengkap'];

$pltype = $_SESSION['plytype'];

// var_dump($pltype);
// var_dump($_SESSION['dating_code']);
if ($pltype == 'rec') {
    $pname = $ply1name;
    $oppname = $ply2name;
} else if ($pltype == 'sender') {
    $pname = $ply2name;
    $oppname = $ply1name;
}



?>
<script>

</script>

<body style="background:#8DC9F4;">
    <div class="container">
        <center>
            <h1 id="txt"></h1>
            <form action="#" method="post">

                <div id="divback" style="background:url(../images/bisaat.png); background-repeat:no-repeat; background-size:auto; background-position:center; height:400px; width:360px;">
                    <div id="tictac-div" class="div1" style="margin-left:0; background:url(); background-repeat:no-repeat; background-size:contain; background-position:center;"> </div>
                    <div id="tictac-div" class="div2" style=" background:url(); background-repeat:no-repeat; background-size:contain; background-position:center;"> </div>
                    <div id="tictac-div" class="div3" style=" background:url(); background-repeat:no-repeat; background-size:contain; background-position:center;"> </div>
                    <div id="tictac-div" class="div4" style="margin-top:10px; margin-left:0; background:url(); background-repeat:no-repeat; background-size:contain; background-position:center;"> </div>
                    <div id="tictac-div" class="div5" style=" margin-top:10px; background:url(); background-repeat:no-repeat; background-size:contain; background-position:center;"> </div>
                    <div id="tictac-div" class="div6" style=" margin-top:10px; background:url(); background-repeat:no-repeat; background-size:contain; background-position:center;"> </div>
                    <div id="tictac-div" class="div7" style=" margin-top:10px;margin-left:0; background:url(); background-repeat:no-repeat; background-size:contain; background-position:center;"> </div>
                    <div id="tictac-div" class="div8" style=" margin-top:10px; background:url(); background-repeat:no-repeat; background-size:contain; background-position:center;"> </div>
                    <div id="tictac-div" class="div9" style=" margin-top:10px; background:url(); background-repeat:no-repeat; background-size:contain; background-position:center;"> </div>

                </div>
                <br>
                <span style="font-size:20px;">
                    <p id="turntxt" style="color:white;"></p>
                    <input type="radio" id="pl1" name="player" value="1" disabled /> <?php echo $pname; ?>&nbsp;
                    <input type="radio" id="pl2" name="player" value="2" disabled /> <?php echo $oppname; ?><br>
                </span>
            </form>
    </div>
    </center>
    <!-- The Modal -->
    <div id="myModal" style="background:rgba(255,255,255,1); border:2px solid black; padding:20px; color:black; width:30%; height:30%; margin-left:35%; margin-top:10%;" class="modal">

        <!-- Modal content -->
        <h1 id="plwin"> </h1><br>
        <form action="../user/online.php"> 
            <button type="submit" style="border:1px solid black;" autofocus> Done!</button>
        </form>
    </div>
</body>
<script>
    $(document).ready(function() {
        var i = 0;
        $(".div1").click(function() {
            onbuttonclick(1);
        });
        $(".div2").click(function() {
            onbuttonclick(2);
        });
        $(".div3").click(function() {
            onbuttonclick(3);
        });
        $(".div4").click(function() {
            onbuttonclick(4);
        });
        $(".div5").click(function() {
            onbuttonclick(5);
        });
        $(".div6").click(function() {
            onbuttonclick(6);
        });
        $(".div7").click(function() {
            onbuttonclick(7);
        });
        $(".div8").click(function() {
            onbuttonclick(8);
        });
        $(".div9").click(function() {
            onbuttonclick(9);
        });

        function onbuttonclick(box) {
            if (turn == <?php if ($_SESSION['plytype'] == 'rec') {
                            echo 0;
                        } else if ($_SESSION['plytype'] == 'sender') {
                            echo 1;
                        } ?>) {

                if (checkedboxes[box - 1] == 0) {
                    if (i == 0) {
                        <?php echo  "var plrtype = '" . $_SESSION['plytype'] . "';"; ?>
                        if (plrtype == 'rec') {


                            $(".div" + box).css("background-image", "url(../images/circle1.png)");
                            turn = 1;
                        } else {
                            $(".div" + box).css("background-image", "url(../images/cross1.png)");
                            turn = 0;
                        }
                        radbtn();
                        sendmove(box);
                    }
                    checkedboxes[box - 1] = 1;
                }

            }
        }

        function radbtn() {

            if (turn == <?php if ($_SESSION['plytype'] == 'rec') {
                            echo 0;
                        } else if ($_SESSION['plytype'] == 'sender') {
                            echo 1;
                        } ?>) {
                document.getElementById("turntxt").innerHTML = "Your Turn!";
                document.getElementById("pl1").checked = true;
            } else {
                document.getElementById("turntxt").innerHTML = "Opponent Turn!";
                document.getElementById("pl2").checked = true;
            }
        }
        radbtn();

    });
    var checkedboxes = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
    var z = 0;
    var turn = 0;

    function sendmove(box) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {


            }
        };
        xmlhttp.open("GET", "../user/sendmove.php?b=" + box, true);
        xmlhttp.send();
    }

    function recievemove() {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                <?php echo  "var plrtype = '" . $_SESSION['plytype'] . "';"; ?>
                z = this.responseText;
                if (z == "pl1") {
                    document.getElementById("plwin").innerHTML = "<?php if ($pltype == 'rec') {
                                                                        echo 'You ';
                                                                    } else {
                                                                        echo $ply2name;
                                                                    } ?> Won!";
                    $("#myModal").css("display", "block");
                } else if (z == "pl2") {
                    document.getElementById("plwin").innerHTML = "<?php if ($pltype == 'rec') {
                                                                        echo $ply2name;
                                                                    } else {
                                                                        echo 'You ';
                                                                    } ?> Won!";
                    $("#myModal").css("display", "block");
                } else if (z == "draw") {
                    document.getElementById("plwin").innerHTML = "Draw !";
                    $("#myModal").css("display", "block");
                } else {
                    if (checkedboxes[z - 1] == 0) {
                        if (plrtype == 'rec') {
                            $(".div" + z).css("background-image", "url(../images/cross1.png)");
                            turn = 0;
                        } else if (plrtype == 'sender') {
                            $(".div" + z).css("background-image", "url(../images/circle1.png)");
                            turn = 1;

                        }
                        if (turn == <?php if ($_SESSION['plytype'] == 'rec') {
                                        echo 0;
                                    } else if ($_SESSION['plytype'] == 'sender') {
                                        echo 1;
                                    } ?>) {
                            document.getElementById("turntxt").innerHTML = "Your Turn!";
                            document.getElementById("pl1").checked = true;
                        } else {
                            document.getElementById("turntxt").innerHTML = "Opponent Turn!";
                            document.getElementById("pl2").checked = true;
                        }
                        checkedboxes[z - 1] = 1;
                    }
                    console.log(plrtype);

                }
            }
        };
        xmlhttp.open("GET", "../recievedata.php?r=1", true);
        xmlhttp.send();

    }


    recievemove();
    setInterval("recievemove();", 500);
</script>