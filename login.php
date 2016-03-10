<?php

include_once("../config.php");
include_once("header.php");
session_start();

if (isset($_POST['Submit'])) {

    $errors = array();
    $userName = mysqli_real_escape_string($db, $_POST['username']);
    $userPassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT id FROM users WHERE email='$userName' and passcode='$userPassword'";
    $results = $mysqli->query($sql);
    if ($results) {
        $obj = $results->fetch_object();
        $obj->passcode;
    } else {

    }

}

?>
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <h2>Login</h2>

            <form action="" method="post">

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                           placeholder="Password">
                </div>

                <p class="help-block"><a href="register.php">Registrovat</p>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>


    </div>
</div>
<?php
include_once("footer.php");
?>
