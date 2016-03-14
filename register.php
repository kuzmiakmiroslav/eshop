<?php

include_once("includes/common.php");
include_once("includes/config.php");

if (isset($_POST['Submit'])) {

	$errors = array();

	$email = $_POST['email'];
	$password = $_POST['password'];
	$name = $_POST['name'];

	$sql = "SELECT count(*) as count FROM users WHERE email='$email'";
	$results = $mysqli->query($sql);

	if ($obj = $results->fetch_object()) {
		$counts = $obj->count;
		if($counts>0){
			$errors[] = "Uzivatel s emailom " . email . " uz existuje";
		}
	}

	if( $email == ""){
		$errors[]="Email musite zadat.";
	}

	if( $password == ""){
		$errors[]="Heslo musite zadat.";
	}

	if( $name == ""){
		$errors[]="Meno musite zadat.";
	}

	if (empty($errors)) {

		$sql = "insert into users (email,passcode,name) values('$email','$password','$name')";
		$result = $mysqli->query($sql);
		if(!$result){
			$errors[]= $mysqli->error;
		}else{
 			$last_id = $mysqli->insert_id;
			SetSession("UserId", $last_id );
			header('Location: registerOK.php');
			exit;

			
		}


	}

}
include_once("header.php");

?>
<div class="container">
    

<div class="row">
   
    <div class="col-md-4">
            <h2>Registracia</h2>
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
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Heslo</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                           placeholder="Heslo"/>
                </div>

                <div class="form-group">
                    <label for="name">Meno a Priezvisko</label>
                    <input name="name" type="text" class="form-control" id="name"
                           placeholder="Meno a priezvisko"/>
                </div>

                
                <button type="submit" name="Submit" class="btn btn-default">Odoslat</button>
            </form>
        </div>

    </div>
</div>
<?php
include_once("footer.php");
?>
