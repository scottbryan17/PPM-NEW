<?php
$hostname = "localhost";
$database = "books";
$username = "root";
$password = "";
$conndb = mysql_connect($hostname, $username, $password) or trigger_error(mysql_error());
?>