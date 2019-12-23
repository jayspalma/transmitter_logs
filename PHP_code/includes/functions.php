<?php

session_start();

function redirect_to($new_location){
	header("Location: " . $new_location);
}

function sql_buider($post_variable_names,$datepickerstart,$datepickerend){
	$assoc_column = array();
	$sql = "SELECT * FROM txlogs WHERE ";
	$sqldate = "DATE BETWEEN " . "'" . $datepickerstart . "'" . " AND " . "'" . $datepickerend . "'";
	$sqlvalues = "";

	foreach ($post_variable_names as $column_names) {
 	if(isset($_POST[$column_names]) && !empty($_POST[$column_names])){
 		$assoc_column[$column_names] =  $_POST[$column_names];
 			}
 	} 
 	foreach ($assoc_column as $key => $value) {
 		if($value === "All"){
 		}else{
 		$sqlvalues .= " AND " . $key . "=" . "'" .$value ."'";
 		}
 	}

 	if(empty($datepickerstart)){
 		$sqldate = "1=1";
 	}else{
 		$sqldate;
 	}


 	//This build the sql string
 	$sql = $sql . $sqldate . $sqlvalues . " ORDER BY DATE DESC";

 	return $sql;
}


function data_query($sql){
	global $db;

	$query = $db->prepare($sql);
	$query->execute();
	$row = $query->fetchAll();
	return $row;

}


function result_count($sql){

	global $db;

	$sql_count = str_replace('*', 'COUNT(*)', $sql);

	$query_count = $db->prepare($sql_count);
	$query_count->execute();
	$row_count = $query_count->fetch();
	return array_shift($row_count);


}

?>