<?php
require_once("../includes/functions.php");
  

$username = $_SESSION['username'];
$admin = $_SESSION['admin'];


if(!($admin)){
	redirect_to('login.php');
}

?>

<!DOCTYPE html>
<html>
<body>

<h1>This is the Admin Page</h1>
<p>For Editing and Deleting Files.</p>

<a href="logout.php">Logout</a>

</body>
</html>





