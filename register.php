<?php

include_once("includes/session.php");
include_once("includes/databaseConnect.php");

if (isset($_POST['Submit'])) {

    //pole chyb
    $errors = array();

    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $address = $_POST['address'];

    if ($email == "") {
        $errors[] = "Musíte zadať email.";
    }

    if ($password1 == "") {
        $errors[] = "Musíte zadať heslo.";
    }

    if ($password2 == "") {
        $errors[] = "Musíte zadať heslo.";
    }

    if ($password2 != $password1) {
        $errors[] = "Hesla sa nezhodujú.";
    }

    if ($name == "") {
        $errors[] = "Musíte zadať meno.";
    }

    $sql = "SELECT count(*) as count FROM users WHERE email='$email'";
    $results = $connection->query($sql);

    //test na existenciu užívateľa
    if (empty($errors) && $obj = $results->fetch_object()) {
        $counts = $obj->count;
        if ($counts > 0) {
            $errors[] = "Užívateľ s emailom " . $email . " už existuje.";
        }
    }

    if (empty($errors)) {

        $sql = "insert into users (email,passcode,name,address) values('$email','$password1','$name','$address')";
        $result = $connection->query($sql);
        if (!$result) {
            $errors[] = $connection->error;
        } else {
            $last_id = $connection->insert_id;
            SetSession("UserId", $last_id);
            header('Location: registerOK.php');
            exit;


        }


    }

}

include_once("pageHeader.php");
?>
<div class="container">

    <div class="row">

        <div class="col-md-4">
            <h2>Registrácia</h2>
            <?php

            if (!empty($errors)) {
                echo '<div class="alert alert-danger">';
                foreach ($errors as $err) {
                    echo $err . "<br/>";
                }
                echo '</div>';
            }

            ?>

            <form action="register.php" method="post">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="password1">Heslo</label>
                    <input name="password1" type="password" class="form-control" id="password1"
                           placeholder="Heslo"/>
                </div>

                <div class="form-group">
                    <label for="password2">Zopakujte heslo</label>
                    <input name="password2" type="password" class="form-control" id="password2"
                           placeholder="Heslo"/>
                </div>

                <div class="form-group">
                    <label for="name">Meno a Priezvisko</label>
                    <input name="name" type="text" class="form-control" id="name"
                           placeholder="Meno a priezvisko"/>
                </div>


                <div class="form-group">
                    <label for="address">Adresa</label>
                    <input name="address" type="text" class="form-control" id="address"
                           placeholder="Adresa"/>
                </div>



                <button type="submit" name="Submit" class="btn btn-primary">Registrovať</button>
            </form>
        </div>

    </div>
</div>
<?php
include_once("pageFooter.php");
include_once("databaseClose.php");
?>
