<?php  
require_once("../includes/functions.php");  
require_once("../includes/config.php");        
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

    <br/>
	<br/>


<p>
Select Site
<form action="index.php" method="post">
<select name="SITE_CODE" >
  <option value="">Select...</option>
  <option value="All">All Sites</option>
  <option value="MLA_2">Manila 2</option>
  <option value="MLA_23">Manila 23</option>
</select>

<select name="CLASS" >
  <option value="">Select...</option>
  <option value="All">All </option>
  <option value="FYI">FYI</option>
  <option value="NPO">NPO</option>
</select>
<input type="submit" value="Submit">
</form>
</p>

<?php 


$column_name = array('DATE','SITE_CODE','CLASS');
$sql = sql_buider($column_name);
$query = $db->prepare($sql);
$query->execute();
$row = $query->fetchAll();


?>

<style>
table, th, td {
  border: 1px solid black;
}
</style>

<table>
<tr>
<th>Date</th>
<th>Site Code</th>
<th>Class</th>
</tr>
<?php foreach($row as $rows){
	echo "<tr>";
	echo "<td>".$rows['DATE'];
	echo "<td>".$rows['SITE_CODE'];
	echo "<td>".$rows['CLASS'];
	echo "</tr>";
}
echo "</table>
</html>";

$row = null;
?>


<!-- TO DO TASK -->
<!-- DATEPICKER -->
<!-- No Results Found still not working if no values are resturned from query -->
<!-- Table formatting -->



<!-- //#Working datepicker
// --> <!--  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
//   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
//   <script>
//   $( function() {
//     $( "#datepicker" ).datepicker();
//   } );
//   </script>

//   <p>Date: <input type="text" id="datepicker"></p>
//  -->
