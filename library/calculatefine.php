<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Fine calculator</h2>
					</header>
<?php
include "database.php";
session_start();

$retrievedata=mysql_query("select * from borrowhistory group by BorrowID");
$retrievenumrow=mysql_num_rows($retrievedata);
while($getdata=mysql_fetch_assoc($retrievedata)){
	$borrowid=$getdata['BorrowID'];
	$expired=$getdata['DateOfExpired'];
	$datereturn=$getdata['DateOfReturn'];
	
	date_default_timezone_set("Singapore");
	$now=date("y-m-d"." "."h:i:sa");

	$createnow=date_create($now);
	$createexpired=date_create($expired);
	$different=date_diff($createnow,$createexpired);
	$diffdate=$different->format("%R%a");
	$between=$different->format("%a");
	
	$totaldiff=$diffdate;
	$betweendate=$between;
	
	if(($expired!="")&&($datereturn=="")){
			if($totaldiff<0 && $between<=3){
				$fineperday=1;
				$totalfine=$fineperday*$betweendate;
				echo $totalfine."<br/>";
				$updatefine=mysql_query("update borrowhistory set Fine='$totalfine' where BorrowID='$borrowid'");
				
				if($_SESSION['Position']=='Admin'){
				header("location:adminreturn.php");
				}
				elseif(($_SESSION['Position']=='Teacher')||($_SESSION['Position']=='Student')){
				header("location:userreservelist.php");	
				}
				else{
				header("location:logout.php");	
				}
			}
			elseif(($totaldiff<0 && $between>3)&&($totaldiff<0 && $between<=7)){
				$fineperday=1.1;
				$newcalculate=$betweendate-3;
				$totalfine=($newcalculate * $fineperday)+3;
				$updatefine=mysql_query("update borrowhistory set Fine='$totalfine' where BorrowID='$borrowid'");
				
				if($_SESSION['Position']=='Admin'){
				header("location:adminreturn.php");
				}
				elseif(($_SESSION['Position']=='Teacher')||($_SESSION['Position']=='Student')){
				header("location:userreservelist.php");	
				}
				else{
				header("location:logout.php");	
				}
			}
			elseif($totaldiff<0 && $between>7){
				$fineperday=1.2;
				$newcalculate=$betweendate-7;
				$totalfine=($newcalculate * $fineperday)+3+4.8;
				$updatefine=mysql_query("update borrowhistory set Fine='$totalfine' where BorrowID='$borrowid'");
				
				if($_SESSION['Position']=='Admin'){
				header("location:adminreturn.php");
				}
				elseif(($_SESSION['Position']=='Teacher')||($_SESSION['Position']=='Student')){
				header("location:userreservelist.php");	
				}
				else{
				header("location:logout.php");	
				}
			
		}
	}
}
?>
				</div>
			</section>
<?php include ('footer.php') ?>