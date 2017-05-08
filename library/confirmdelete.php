<?php
include "database.php";
session_start();

if(isset($_GET['bid'])){
	$deletebook=mysql_query("delete from book where BookID='$_GET[bid]'");
	header("location:admindelete.php");
}
if(isset($_GET['sid'])){
	$deletestudent=mysql_query("delete from student where StudentID='$_GET[sid]'");
	header("location:checkingdelete.php");
}
if(isset($_GET['tid'])){
	$deleteteacher=mysql_query("delete from teacher where TeacherID='$_GET[tid]'");
	header("location:checkingdelete.php");
}
?>