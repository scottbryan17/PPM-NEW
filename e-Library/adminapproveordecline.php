<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Admin</h2>
					</header>
<?php
session_start();
include "database.php";
if($_SESSION['Position']=='Admin'){
	$retrievedata=mysql_query("select * from reserve where ReserveID='$_POST[hiddenrid]'");
	$retrievenumrow=mysql_num_rows($retrievedata);
	while($retrievereserve=mysql_fetch_assoc($retrievedata)){
		$bid=$retrievereserve['BookID'];
		$sid=$retrievereserve['StudentID'];
		$tid=$retrievereserve['TeacherID'];
		$rid=$retrievereserve['ReserveID'];
	}

	date_default_timezone_set("Singapore");
	$currenttime=date("y-m-d"." "."h:i:sa");
	$expiration=strtotime("+1 week");
	$duetime=date("y-m-d"." "."h:i:sa",$expiration);

	if(isset($_POST['approve'])){
			if($_POST['hiddenuser']=='SID'){
				$insert=mysql_query("update borrowhistory set BookID='$bid',StudentID='$sid',DateOfBorrow='$currenttime',DateOfExpired='$duetime' where ReserveID='$rid'");
				$update=mysql_query("update reserve set Reserve='Yes' where ReserveID='$rid'");
				header("location:adminpendinglist.php");
			}
			else{
				echo "Student ID not found";
			}
			if($_POST['hiddenuser']=='TID'){
				$insert=mysql_query("update borrowhistory set BookID='$bid',TeacherID='$tid',DateOfBorrow='$currenttime',DateOfExpired='$duetime' where ReserveID='$rid'");
				$update=mysql_query("update reserve set Reserve='Yes' where ReserveID='$rid'");
				header("location:adminpendinglist.php");
			}
			else{
				echo "Teacher ID not found";
			}
	}
	elseif(isset($_POST['decline'])){
		if($_POST['hiddenuser']=='SID'){
			$update=mysql_query("update reserve set Reserve='Reject' where ReserveID='$rid'");
			$bookdata=mysql_query("select * from book where BookID='$bid'");
			$booknumrow=mysql_num_rows($bookdata);
			while($bookid=mysql_fetch_assoc($bookdata)){
				$noofbook=$bookid['NoAvailable'];
			}
			$newnoofbook=$noofbook+1;
			$return=mysql_query("update book set NoAvailable='$newnoofbook' where BookID='$bid'");
		
			$userdata=mysql_query("select * from student where StudentID='$_POST[hiddensid]'");
			$usernumrow=mysql_num_rows($userdata);
			while($displayuser=mysql_fetch_assoc($userdata)){
				$curborrow=$displayuser['NoOfBorrow'];
			}
				
				$newcurborrow=$curborrow-1;
				$reduceborrow=mysql_query("update student set NoOfBorrow='$newcurborrow' where StudentID='$_POST[hiddensid]'");
				
				header("location:adminpendinglist.php");
		}
		if($_POST['hiddenuser']=='TID'){
			$update=mysql_query("update reserve set Reserve='Reject' where ReserveID='$rid'");
			$bookdata=mysql_query("select * from book where BookID='$bid'");
			$booknumrow=mysql_num_rows($bookdata);
			while($bookid=mysql_fetch_assoc($bookdata)){
				$noofbook=$bookid['NoAvailable'];
			}
			$newnoofbook=$noofbook+1;
			$return=mysql_query("update book set NoAvailable='$newnoofbook' where BookID='$bid'");
			
			$userdata=mysql_query("select * from teacher where TeacherID='$_POST[hiddentid]'");
			$usernumrow=mysql_num_rows($userdata);
			while($displayuser=mysql_fetch_assoc($userdata)){
				$curborrow=$displayuser['NoOfBorrow'];
			}
				
				$newcurborrow=$curborrow-1;
				$reduceborrow=mysql_query("update teacher set NoOfBorrow='$newcurborrow' where TeacherID='$_POST[hiddentid]'");
				header("location:adminpendinglist.php");
		}
	}
	else{
		header("location:adminpendinglist.php");
	}
}else{
	header("location:logout.php");
}
?>
<?php include ('footer.php') ?>