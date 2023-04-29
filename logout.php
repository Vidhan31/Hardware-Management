<?php

session_start();
$_SESSION = array();
if(isset($_SESSION['loggedin']))
{
session_destroy();

header("location: login.php");
}
else{
    header("location: login.php");
}

?>
