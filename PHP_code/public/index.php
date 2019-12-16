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
?>

<?php if(isset($username) && ($admin)){ ?>
	Welcome Admin <?php echo " $username";?>
	<br/>
	<br/>
	<a href="admin.php">Admin</a>
	<h1>This is the index page. This is for viewing discrepancies</h1>
    <a href="logout.php">Logout</a>

<?php }elseif (isset($username)) { ?>
	Welcome  <?php echo " $username";?>
	<br/>
	<br/>
	<h1>This is the index page. This is for viewing discrepancies</h1>
    <a href="logout.php">Logout</a>

<?php }else{
	redirect_to('login.php');
}

?>



