<?php
require_once("../includes/functions.php");
session_start();
$_SESSION['admin_id'] = null;
redirect_to('login.php');

?>