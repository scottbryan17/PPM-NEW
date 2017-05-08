<?php
include "database.php";
session_start();

	$deletebook=mysql_query("delete from book where BookID='$_GET[deletebid]'");
	header("location:booklist.php");

?>