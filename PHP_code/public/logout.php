<?php
require_once("../includes/functions.php");

$_SESSION['username'] = null;
$_SESSION['admin'] = null;
redirect_to('login.php');

?>