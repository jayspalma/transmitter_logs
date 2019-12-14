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
// $username = "";
// $username = $_POST["username"];

if(isset($_POST["username"]) && isset($_POST["password"])){
	$username = $_POST["username"];
	$postpassword = $_POST["password"];
	$sql = "SELECT * FROM users WHERE username='$username'";



	$result = $db->query($sql);
	$row = $result->fetch_assoc();

	if($row){
		$dbpassword = $row['password'];
		//$id = $row['id'];


		 if(password_verify($postpassword, $dbpassword)){
		 	$_SESSION['admin_id'] =  $row['id'];
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

// $password = password_hash("password", PASSWORD_DEFAULT);
// echo $password;

// if(password_verify("password", $password)){
// 	echo "Password match";
// }




//$db = new Database();

// $sql = "SELECT * FROM users WHERE username='jays'";


// $result = $db->query($sql);
// $row = $result->fetch_assoc();

// if($row){
// 	$dbpassword = $row['password'];
// 	$postpassword = "password";

// 	 if(password_verify($postpassword, $dbpassword)){
// 		echo "Success";
// 	}else{
// 		echo "Username/Password does not exists!!!";
// 	}


// }else{

// 	echo "Username/Password does not exists!!!";
// }



// $result->free();

// $dbpassword = $row['password'];
// $postpassword = "password";

// if(password_verify($postpassword, $dbpassword)){
//  echo "Success";
// }else{
//  echo "Username/Password does not exists!!!";
// }



?>




</body>
</html>


