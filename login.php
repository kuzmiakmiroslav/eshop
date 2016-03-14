<?php

include_once("includes/session.php");
include_once("includes/databaseConnect.php");

if (isset($_POST['Submit'])) {

    $errors = array();

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "") {
        $errors[] = "Zadajte email";
    }

    if ($password == "") {
        $errors[] = "Zadajte heslo";
    }

    if ($email != "" && $password !="") {

        $sql = "SELECT * FROM users WHERE email='$email'";
        $results = $connection->query($sql);
        if ($obj = $results->fetch_object()) {

            $id = $obj->id;
            $passcode = $obj->passcode;
            $email = $obj->email;

            if ($passcode != $password) {
                $errors[] = "Nesprávne heslo.";
            } else {
                SetSession("UserId", $id);
                header('Location: index.php');
                exit;
            }
        }else{
            //nenasli sme uzivatela s danym heslom
            $errors[] = "Uzivatel neexistuje.";
        }

    }


}
include_once("pageHeader.php");

?>

<div class="container">
    <div class="row">

        <div class="col-md-4">
            <h2>Prihlasenie</h2>
            <?php

            if (!empty($errors)) {
                echo '<div class="alert alert-danger">';
                foreach ($errors as $err) {
                    echo $err . "<br/>";
                }
                echo '</div>';
            }

            ?>

            <form action="login.php" method="post">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email"  class="form-control" id="email" placeholder="Email" <?php echo 'value="' . $email . '"'; ?>'" >
                </div>
                <div class="form-group">
                    <label for="password">Heslo</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Heslo">
                </div>

                <button type="submit" name="Submit" class="btn btn-default">Odoslať</button>
            </form>
        </div>


    </div>
</div>
<?php
include_once("pageFooter.php");
include_once("includes/databaseClose.php");
?>
