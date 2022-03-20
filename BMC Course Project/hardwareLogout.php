<?php
session_start();
if(isset($_SESSION['loggedinc']))
{
session_destroy();

header("location: hardwarelogin.php");
}
?>