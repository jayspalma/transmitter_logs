<?php
require_once("../includes/functions.php");
session_start();
$_SESSION['username'] = null;
$_SESSION['admin'] = null;
redirect_to('login.php');

?>