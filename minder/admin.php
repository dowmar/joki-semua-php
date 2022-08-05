<?php

require "function.php";




if (isset($_POST["like"])) {

    $name = $_POST["name"];
    $age = $_POST["age"];
    $status = "like";
    $gambar = $_POST["gambar"];
    $select = mysqli_query($conn, "SELECT * FROM liked WHERE gambar = '" . $gambar . "'");


    $query = "INSERT INTO liked VALUES
                ('', '$name', '$age', '$status','$gambar')";

    mysqli_query($conn, $query);
}

if (isset($_POST["dislike"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $status = "dislike";
    $gambar = $_POST["gambar"];

    $query = "INSERT INTO skipped VALUES
                ('', '$name', '$age', '$status','$gambar')";

    mysqli_query($conn, $query);
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
    <title>Minder</title>
</head>

<body>
    <div class="container-for-main">
        <!-- <form action="" method="post">
            First Name: <input placeholder="First Name" type="text" name="firstname" maxlength="12" size="12" /> <br /><br />
            Gender:<br />
            Male:<input type="radio" name="gender" value="Male" /><br />
            Female:<input type="radio" name="gender" value="Female" /><br /><br />

            Favorite Food:<br />
            Steak:<input type="checkbox" name="food[]" value="Steak" /><br />
            Pizza:<input type="checkbox" name="food[]" value="Pizza" /><br />
            Chicken:<input type="checkbox" name="food[]" value="Chicken" /><br /><br />

            <textarea wrap="physical" cols="20" name="quote" rows="5" placeholder="message"></textarea><br /><br>

            Select a Level of Education:<br />
            <select name="education">
                <option value="Jr.High">Jr.High</option>
                <option value="HighSchool">HighSchool</option>
                <option value="College">College</option>
            </select><br />
            <p><input type="submit" /></p>
        </form>

        <h2>JSON</h2>
        <pre id="result"></pre> -->
        <div class="d-flex justify-content-center my-2">


            <img class="border border-white" src="image/minder.png" alt="">
        </div>
        <div class="cartest border border-white">

            <?php foreach ($data as $row) : ?>
                <div class="child" data-id="<?= $row["id"]; ?>">
                    <img class="<?= $row["name"]; ?>" src=" image/<?= $row["gambar"]; ?>" alt="<?= $row["name"]; ?>" id="<?= $row["id"] ?>" width=" 100%">
                    <form action="" method="post" class="data-insert">
                        <div class="input-group" style=" display: none;">
                            <input type="text" placeholder="name" name="name" value="<?= $row["name"]; ?>">
                        </div>
                        <div class="input-group" style=" display: none;">
                            <input type="text" placeholder="age" name="age" value="<?= $row["age"]; ?>">
                        </div>
                        <div class="input-group" style=" display: none;">
                            <input type="text" placeholder="status" name="status">
                        </div>
                        <div class="input-group" style=" display: none;">
                            <input type="text" placeholder="gambar" name="gambar" value="<?= $row["gambar"]; ?>">
                        </div>

                        <div class="submit-group d-flex justify-content-evenly">
                            <button name="dislike" class="btn btn-secondary my-2 col-5">Dislike</button>
                            <button name="like" class="btn btn-primary my-2 col-5">LIKE</button>
                        </div>

                    </form>

                </div>

            <?php endforeach; ?>
        </div>

        <a href="index.php">
            <button id="next halaman" class="btn btn-light mt-5">Profile</button>
        </a>
        <button id="show" class="btn btn-light mt-5">Next</button>

        <!-- <input id="total" placeholder="0" readonly /> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">

    </script>

    <script>
        // $.fn.serializeObject = function() {
        //     var o = {};
        //     var a = this.serializeArray();
        //     $.each(a, function() {
        //         if (o[this.name] !== undefined) {
        //             if (!o[this.name].push) {
        //                 o[this.name] = [o[this.name]];
        //             }
        //             o[this.name].push(this.value || '');
        //         } else {
        //             o[this.name] = this.value || '';
        //         }
        //     });
        //     console.log(o);
        //     return o;
        // };


        // $(function() {
        //     $('form').submit(function() {
        //         $('#result').text(JSON.stringify($('form').serializeObject()));
        //         return false;
        //     });
        // });
        // jQuery(".child").each(function() {
        //     const $this = jQuery(this);
        //     const id = $this.attr("data-id");
        //     console.log(id);
        //     $("#hide").click(function() {
        //         console.log("test");
        //         jQuery(".child[data-id=" + id + "]").toggle("show");
        //     });
        // });
        // var x = 0;
        // $("#show").click(function() {
        //     x++;

        //     return x;
        // });
        // console.log(x);
        // $(document).ready(function() {

        // function add(number1) {
        //     var num1 = (number1);
        //     var num2 = 1;
        //     var num3 = num1 + num2;
        //     return num3;
        // }
        jQuery(".child").each(function() {
            const $this = jQuery(this);
            var id = $this.attr("data-id");

            $(".hide").click(function() {
                jQuery(".child[data-id=" + id + "]").hide();
            });
            jQuery(".child[data-id=" + 1 + "]").hide();
            jQuery(".child[data-id=" + 2 + "]").hide();
            jQuery(".child[data-id=" + 3 + "]").hide();
            jQuery(".child[data-id=" + 4 + "]").hide();
            let x = 0;
            $("#show").click(function() {
                x++;
                console.log(x);

                if (x == 1) {
                    jQuery(".child[data-id=" + 1 + "]").show();
                    jQuery(".child[data-id=" + 2 + "]").hide();
                    jQuery(".child[data-id=" + 3 + "]").hide();
                    jQuery(".child[data-id=" + 4 + "]").hide();
                    // $('#total').val(i);

                } else if (x == 2) {
                    jQuery(".child[data-id=" + 1 + "]").hide();
                    jQuery(".child[data-id=" + 2 + "]").show();
                    jQuery(".child[data-id=" + 3 + "]").hide();
                    jQuery(".child[data-id=" + 4 + "]").hide();
                } else {
                    jQuery(".child[data-id=" + 1 + "]").hide();
                    jQuery(".child[data-id=" + 2 + "]").hide();
                    jQuery(".child[data-id=" + 3 + "]").show();
                    jQuery(".child[data-id=" + 4 + "]").hide();

                    x = 0;
                }




                // jQuery(".child[data-id=" + 1 + "]").hide();
                // jQuery(".child[data-id=" + 2 + "]").show();
                // jQuery(".child[data-id=" + 3 + "]").hide();
                // jQuery(".child[data-id=" + 4 + "]").hide();


            });


        });
        // });
    </script>
</body>

</html>