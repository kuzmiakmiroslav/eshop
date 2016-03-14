<?php

include_once("../includes/session.php");

$errors = array();

if (isset($_POST['Submit'])) {

    $password = $_POST['password'];

    if ($password == "root") {
        SetSession("AdminId", "1");
        header("location: index.php");

    } else {
        $errors[] = "Nesprávne heslo.";

    }
}
include_once("pageHeader.php");

?>
<div class="container">
    <h2>Prihlasenie</h2>

    <div class="row">
        <div class="col-md-4">
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
?>
