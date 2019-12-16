<?php
require_once("../includes/functions.php");
session_start();
$db = new mysqli("localhost","txloguser","tvtx223","transmitter");
?>



<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>



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



	$result = $db->query($sql);
	$row = $result->fetch_assoc();

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



	$result->free();
}else{
	$username = "";
	$postpassword = "";
}



?>

<br />

<?php 

#This is used to make hashed and salted password. Add this to the sign-up page.

//$password = password_hash("password", PASSWORD_DEFAULT);
//echo $password;





?>




</body>
</html>


