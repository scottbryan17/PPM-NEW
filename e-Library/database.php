<?php
	$mysql=mysql_connect("localhost","root","")or die(mysql_error());
	$select=mysql_select_db("ppm",$mysql)or die(mysql_error());
?>