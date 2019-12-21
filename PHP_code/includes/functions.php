<?php

session_start();

function redirect_to($new_location){
	header("Location: " . $new_location);
}

function sql_buider($column_name){
	$assoc_column = array();
	$sql = "SELECT * FROM txlogs WHERE 1=1";

	foreach ($column_name as $column_names) {
 	if(isset($_POST[$column_names]) && !empty($_POST[$column_names])){
 		$assoc_column[$column_names] =  $_POST[$column_names];
 			}
 	} 
 	foreach ($assoc_column as $key => $value) {
 		if($value === "All"){
 		}else{
 		$sql .= " AND " . $key . "=" . "'" .$value ."'";
 		}
 	}
 	return $sql;
}



?>