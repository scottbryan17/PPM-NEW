<?php
session_start();
$_SESSION['NoValue']="";
$_SESSION['UserID']="";
$_SESSION['Position']="Visitor";
header("Location:login.php");
?>