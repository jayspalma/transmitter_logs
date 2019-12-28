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

//These are $_POST variables
$post_names = array('DATE','SITE_CODE','CLASS');

//Get values of date range
if(!isset($_POST['datepickerstart']) && !isset($_POST['datepickerend'])){
	$datepickerstart = "";
	$datepickerend = "";
}else{
$datepickerstart = $_POST['datepickerstart'];
$datepickerend = $_POST['datepickerend'];
}

//Build the sqk string to be used by data_query and result_count functions
$sql = sql_buider($post_names,$datepickerstart,$datepickerend);


//Query the database for data by using the sql string from sql_builder function.
$row = data_query($sql);

if(empty($row)){
	echo "No Record Found";
}else{

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

$result_count = result_count($sql);
echo $result_count . " record/s found." ;

//free database results
$result_count = null;
$row = null;


}
?>