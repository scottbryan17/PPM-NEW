<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Confirm book return.</h2>
						<p>Feel safe with our log in system.</p>
					</header>
<?php
include "database.php";
session_start();

if(isset($_POST['return']) && isset($_POST['hiddenstudentid'])){
	date_default_timezone_set("Singapore");
	$now=date("y-m-d"." "."h:i:sa");
	
	$bookno=mysql_query("select * from book where BookID='$_POST[hiddenbookid]'");
	$booknumrow=mysql_num_rows($bookno);
	while($curbookno=mysql_fetch_assoc($bookno)){
		$curno=$curbookno['NoAvailable'];
		$newcur=$curno+1;
	}
	
	$userdata=mysql_query("select * from student where StudentID='$_POST[hiddenstudentid]'");
	$usernumrow=mysql_num_rows($userdata);
	while($displayuser=mysql_fetch_assoc($userdata)){
		$curborrow=$displayuser['NoOfBorrow'];
	}
				
	$newcurborrow=$curborrow-1;
	
	$reduceborrow=mysql_query("update student set NoOfBorrow='$newcurborrow' where StudentID='$_POST[hiddenstudentid]'");
	$update=mysql_query("update borrowhistory set DateOfReturn='$now',Fine='0.00' where BorrowID='$_POST[hiddenborrowid]'");
	$return=mysql_query("update book set NoAvailable='$newcur' where BookID='$_POST[hiddenbookid]'");
	header("location:calculatefine.php");
}


if(isset($_POST['return']) && isset($_POST['hiddenteacherid'])){
	date_default_timezone_set("Singapore");
	$now=date("y-m-d"." "."h:i:sa");
	
	$bookno=mysql_query("select * from book where BookID='$_POST[hiddenbookid]'");
	$booknumrow=mysql_num_rows($bookno);
	while($curbookno=mysql_fetch_assoc($bookno)){
		$curno=$curbookno['NoAvailable'];
		$newcur=$curno+1;
	}
	
	$userdata=mysql_query("select * from teacher where TeacherID='$_POST[hiddenteacherid]'");
	$usernumrow=mysql_num_rows($userdata);
	while($displayuser=mysql_fetch_assoc($userdata)){
		$curborrow=$displayuser['NoOfBorrow'];
	}
				
	$newcurborrow=$curborrow-1;
	
	$reduceborrow=mysql_query("update teacher set NoOfBorrow='$newcurborrow' where TeacherID='$_POST[hiddenteacherid]'");
	$update=mysql_query("update borrowhistory set DateOfReturn='$now',Fine='0.00' where BorrowID='$_POST[hiddenborrowid]'");
	$return=mysql_query("update book set NoAvailable='$newcur' where BookID='$_POST[hiddenbookid]'");
	header("location:calculatefine.php");
}
?>
				</div>
			</section>
	<?php include ('footer.php') ?>