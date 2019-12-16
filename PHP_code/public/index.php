<?php  
require_once("../includes/functions.php");          
?>
<!DOCTYPE html>
<html>
<head>
<title>Index</title>
</head>
<body>
<?php

$username = $_SESSION['username'];
$admin = $_SESSION['admin'];
?>

<?php 
if(isset($username) && ($admin)){ 
	echo "Welcome Admin " . $username;
	echo '<br/>';
	echo '<a href="admin.php">Admin</a>';
}elseif (isset($username)) { 
	echo "Welcome " . $username;
}else{
	redirect_to('login.php');
}

?>

	<br/>
	<br/>
	<h1>This is the index page. This is for viewing discrepancies</h1>
    <a href="logout.php">Logout</a>



