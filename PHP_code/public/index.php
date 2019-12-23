<?php  
require_once("../includes/functions.php");  
require_once("../includes/config.php");
include("javascripts/scripts.php");         
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

<form action="index.php" method="post" id="searchform">
Select Site
<select name="SITE_CODE" >
  <option value="">Select...</option>
  <option value="All">All Sites</option>
  <option value="MLA_2">Manila 2</option>
  <option value="MLA_23">Manila 23</option>
</select>
Select Class
<select name="CLASS" >
  <option value="">Select...</option>
  <option value="All">All </option>
  <option value="FYI">FYI</option>
  <option value="NPO">NPO</option>
</select>

 Start Date: <input id="datepickerstart" readonly="readonly" name="datepickerstart">

 End Date: <input id="datepickerend" readonly="readonly" name="datepickerend">


<input type="submit" value="Submit">

</form>
<div class="error-messages" style="display:none;"></div>
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
c
