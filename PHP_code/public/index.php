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
$username = $_SESSION['username'];
$admin = $_SESSION['admin'];
//echo $admin;
//echo "$id";

if(isset($username) && ($admin)){
	echo $username;
	echo '<a href="admin.php">Admin</a>';
	echo '<h1>This is the index page</h1>';
    echo '<a href="logout.php">Logout</a>';

    echo  '</body>';
    echo  '</html>';

}elseif (isset($username)) {
	echo $username;
	echo '<h1>This is the index page</h1>';
    echo '<a href="logout.php">Logout</a>';

    echo  '</body>';
    echo  '</html>';
}else{
	redirect_to('login.php');
}


// if(!isset($id)){
// 	redirect_to('login.php');

// }

?>
<!-- <h1>This is the index page</h1>
<a href="logout.php">Logout</a>

</body>
</html> -->