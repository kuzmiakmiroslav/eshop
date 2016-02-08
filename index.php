<?php

include_once("./includes/config.php");
include_once("header.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>uStore | Obchod</title>


    <link href="css/footer.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->


    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<html>
<div class="container">
    <h1>Obchod</h1>
    <div class="container">
        <div class="row">

            <?php


            $results = $mysqli->query("SELECT * FROM products ORDER BY id ASC");
            if ($results) {


                $poradie = 0;
                while ($obj = $results->fetch_object()) {

                    if ($poradie % 3 == 0 && $poradie > 0) {
                        echo '</div><div class="row">';
                    }

                    echo '<div class="col-md-4"><div class="thumbnail">';
                    echo '<img class="img-responsive" src="images/' . $obj->product_img_name . '"/>';
                    echo '<div class="caption">';
                    echo '<h4>' . $obj->product_name . '</h4>';
                    echo '<div class="descr">' . $obj->product_desc . '</div>';
                    echo '<a href="buy.php?code=' . $obj->product_code . '"><div class="btn btn-default btn-kosik pull-right">Do košíka</div></a>';

                    echo '<div class="price">' . $obj->price . '</div>';

                    echo '</div></div></div>';

                    $poradie = $poradie + 1;

                }


            }

            ?>

        </div>
    </div>
    </div>
</html>
</body>

    <?php

    include_once("footer.php");

    ?>

	