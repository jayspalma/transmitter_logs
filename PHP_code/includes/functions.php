<?php

session_start();

function redirect_to($new_location){
	header("Location: " . $new_location);
}




?>