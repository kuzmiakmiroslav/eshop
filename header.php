<?php
/**
 * Created by PhpStorm.
 * User: kuzmik
 * Date: 03.01.16
 * Time: 20:34
 */





?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="./css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/html5shiv.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<nav class="navbar navbar-inverse " role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">uStore</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="index.php">Úvod</a>
                </li>
                <li>
                    <a href="about.php">O nás</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Obchod</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="men.php">Muži</a>
                        </li>
                        <li>
                            <a href="woman.php">Ženy</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="contact.php">Kontakt</a>
                </li>

<?php

if (GetSession("UserId")!="") {
	echo '<li><a href="logout.php">Odhlasiť</a></li>';
}else{
	echo '<li><a href="login.php">Prihlasiť</a></li>';
	echo '<li><a href="register.php">Registrovať</a></li>';

}
?>
                

                <li>
                    <a href="basket.php"><i class="fa fa-shopping-basket"></i>
                    </a>
                </li>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


