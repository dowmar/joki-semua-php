<?php

require "function.php";


$data = query("SELECT * FROM people");



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
    
    <title>Admin Panel</title>
</head>

<body>
    <div class="container-for-main d-flex justify-content-evenly">

        <div class="cartest border border-white">
            
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="child" data-id="<?= $row["id"]; ?>">
                    <img class="<?= $row["name"]; ?>" src=" image/<?= $row["gambar"]; ?>" alt="<?= $row["name"]; ?>" id="<?= $row["id"] ?>" width=" 100%">
                    <form action="" method="POST" class="data-insert">
                        <div class="input-group">
                            <input type="text" placeholder="name" name="name" value="<?= $row["name"]; ?>">
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="age" name="age" value="<?= $row["age"]; ?>">
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="status" name="status" value="<?= $row["status"]; ?>">
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="gambar" name="gambar" value="<?= $row["gambar"]; ?>">
                        </div>
                        <div class="input-group">
                            <button name="submit" class="btn">LIKEY</button>
                        </div>
                    </form>
                </div>

            <?php endwhile; ?>
        </div>

        <button id="show">Skip</button>
        <input id="total" placeholder="0" readonly />
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">

    </script>

    <script>
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