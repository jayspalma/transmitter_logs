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
session_start();
$id = $_SESSION['admin_id'];
//echo "$id";

if(!isset($id)){
	redirect_to('login.php');

}

?>
<h1>This is the index page</h1>
<a href="logout.php">Logout</a>

</body>
</html>