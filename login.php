<?php

include_once("includes/common.php");
include_once("includes/config.php");

if (isset($_POST['Submit'])) {

	$errors = array();

	$email = $_POST['email'];
	$password = $_POST['password'];

	if( $email == ""){
		$errors[]="Email musite zadat.";
	}

	if( $password == ""){
		$errors[]="Heslo musite zadat.";
	}

	if($email!=""){

		$sql = "SELECT * FROM users WHERE email='$email'";
		$results = $mysqli->query($sql);

		if ($obj = $results->fetch_object()) {

			$id = $obj->id;
			$passcode = $obj->passcode;
			$email = $obj->email;

			if($email == "" || $passcode!=$password ){
				$errors[] = "Nespravne prihlasovacie udaje.";
			}else{
				SetSession("UserId", $id);
				header('Location: index.php');
				exit;
			}
		}

	}




}
include_once("header.php");

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
                    <input name="email" type="email" <?php echo 'value="'.$email.'"'; ?>'" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Heslo</label>
                    <input name="password" type="password" class="form-control" id="password"
                           placeholder="Heslo">
                </div>

                <button type="submit" name="Submit" class="btn btn-default">Odoslat</button>
            </form>
        </div>


    </div>
</div>
<?php
include_once("footer.php");
?>
