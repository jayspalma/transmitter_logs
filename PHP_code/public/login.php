<?php
require_once("../includes/functions.php");
require_once("../includes/config.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>

<form action="login.php" method="post">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<input type="submit" value="Login">
</form>

<?php

if(isset($_POST["username"]) && isset($_POST["password"])){
	$username = $_POST["username"];
	$postpassword = $_POST["password"];
	$sql = "SELECT * FROM users WHERE username='$username'";

	#$db is instantiated on config.php file#
	#Instantiate one row using fetch()
	$query = $db->prepare($sql);
	$query->execute();
	$row = $query->fetch();

	if($row){
		$dbpassword = $row['password'];
		 if(password_verify($postpassword, $dbpassword)){
		 	$_SESSION['username'] =  $username;
		 	$_SESSION['admin'] = $row['admin'];
			redirect_to('index.php');
		}else{
			echo "Username/Password does not exists!!!";
		}
	}else{

		echo "Username/Password does not exists!!!";
	}

	$row = null;
}else{
	$username = "";
	$postpassword = "";
}
?>




<?php 

#This is used to make hashed and salted password. Add this to the sign-up page.

//$password = password_hash("password", PASSWORD_DEFAULT);
//echo $password;

?>

</html>


