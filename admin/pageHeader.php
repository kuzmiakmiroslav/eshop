<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eshop-Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/html5shiv.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Eshop Admin</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="productList.php">Produkty</a></li>
                <li><a href="orders.php">Objednavky</a></li>

                <?php

                if (GetSession("AdminId")!="") {
                    echo '<li><a href="logout.php">Odhlásiť</a></li>';
                }else{
                    echo '<li><a href="login.php">Prihlásiť</a></li>';

                }
                ?>

                <li><a href="../index.php">Preview</a></li>

            </ul>
        </div>

    </div>
</div>

