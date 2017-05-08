<?php
session_start();
include "database.php";

$userid=$_SESSION['UserID'];
$subuserid=substr($userid,3);
$subposition=substr($userid,0,3);
	
if(isset($_POST['bid'])&&isset($_POST['curuid'])){
	$bid=$_POST['bid'];
	$uid=$_POST['curuid'];
	
		if($subuserid>1000){
			if($subposition=='SID'){
				$userdata=mysql_query("select * from student where StudentID='$uid'");
				$usernumrow=mysql_num_rows($userdata);
				while($retrievedata=mysql_fetch_array($userdata)){
					$noofborrow=$retrievedata['NoOfBorrow'];
					$maxofborrow=$retrievedata['MaxOfBorrow'];
					if($maxofborrow>=$noofborrow){
						$remaining=$maxofborrow-$noofborrow;
												 }
					else{
						$remaining=0;
						}
																 }
				}
			elseif($subposition=='TID'){
				$userdata=mysql_query("select * from teacher where TeacherID='$uid'");
				$usernumrow=mysql_num_rows($userdata);
				while($retrievedata=mysql_fetch_array($userdata)){
					$noofborrow=$retrievedata['NoOfBorrow'];
					$maxofborrow=$retrievedata['MaxOfBorrow'];
					if($maxofborrow>=$noofborrow){
						$remaining=$maxofborrow-$noofborrow;
												 }
					else{
						$remaining=0;
						}
																 }
					}
			else{
				header("location:logout.php");
				}
			$bookdata=mysql_query("select * from book where BookID='$bid'");
			$booknumrow=mysql_num_rows($bookdata);
			while($retrievebook=mysql_fetch_assoc($bookdata)){
				$availablebook=$retrievebook['NoAvailable'];	
			}
			if($availablebook>0){
				if($remaining>0){
					date_default_timezone_set("Singapore");
					$currenttime=date("y-m-d"." "."h:i:sa");
					
						if($bid&&$uid){
								if($subposition=='SID'){
									if(!isset($_SESSION['Reserve'])||$_SESSION['Reserve']<=3){
										$_SESSION['Reserve']=array(0=>array("Book ID"=>$bid,"User ID"=>$uid));
										$availablebook=$availablebook-1;
										$newremaining=$noofborrow+1;
										$updateremain=mysql_query("update student set NoOfBorrow='$newremaining' where StudentID='$uid'");
										$updateavailable=mysql_query("update book set NoAvailable='$availablebook' where BookID='$bid'");
										$insert=mysql_query("insert into reserve (BookID,StudentID,Date) values('".$bid."','".$uid."','".$currenttime."')");
										$reserveid=mysql_query("select * from reserve");
										$reservenumrow=mysql_num_rows($reserveid);
										while($currentid=mysql_fetch_assoc($reserveid)){
										$currentrid=$currentid['ReserveID'];
																   }
										$insertreserve=mysql_query("insert into borrowhistory (ReserveID) values('".$currentrid."')");
										header("location: userreservelist.php?uid=$_SESSION[UserID]");
																						}
									else{ 
										array_push($_SESSION['Reserve'],array("Book ID"=>$bid,"User ID"=>$uid));
										$remaining=$remaining-1;
										$availablebook=$availablebook-1;
										$newremaining=$noofborrow+1;
										$updateremain=mysql_query("update student set NoOfBorrow='$newremaining' where StudentID='$uid'");
										$updateavailable=mysql_query("update book set NoAvailable='$availablebook' where BookID='$bid'");
										$insert=mysql_query("insert into reserve (BookID,StudentID,Date) values('".$bid."','".$uid."','".$currenttime."')");
										$reserveid=mysql_query("select * from reserve");
										$reservenumrow=mysql_num_rows($reserveid);
										while($currentid=mysql_fetch_assoc($reserveid)){
										$currentrid=$currentid['ReserveID'];
																					   }
										$insertreserve=mysql_query("insert into borrowhistory (ReserveID) values('".$currentrid."')");
										header("location: userreservelist.php?uid=$_SESSION[UserID]");
										}
									}
								elseif($subposition=='TID'){
									if(!isset($_SESSION['Reserve'])||$_SESSION['Reserve']<=3){
										$_SESSION['Reserve']=array(0=>array("Book ID"=>$bid,"User ID"=>$uid));
										$availablebook=$availablebook-1;
										$newremaining=$noofborrow+1;
										$updateremain=mysql_query("update teacher set NoOfBorrow='$newremaining' where TeacherID='$uid'");
										$updateavailable=mysql_query("update book set NoAvailable='$availablebook' where BookID='$bid'");
										$insert=mysql_query("insert into reserve (BookID,TeacherID,Date) values('".$bid."','".$uid."','".$currenttime."')");
										$reserveid=mysql_query("select * from reserve");
										$reservenumrow=mysql_num_rows($reserveid);
										while($currentid=mysql_fetch_assoc($reserveid)){
										$currentrid=$currentid['ReserveID'];
																   }
										$insertreserve=mysql_query("insert into borrowhistory (ReserveID) values('".$currentrid."')");
										header("location: userreservelist.php?uid=$_SESSION[UserID]");
																						}
									else{ 
										array_push($_SESSION['Reserve'],array("Book ID"=>$bid,"User ID"=>$uid));
										$remaining=$remaining-1;
										$availablebook=$availablebook-1;
										$newremaining=$noofborrow+1;
										$updateremain=mysql_query("update teacher set NoOfBorrow='$newremaining' where TeacherID='$uid'");
										$updateavailable=mysql_query("update book set NoAvailable='$availablebook' where BookID='$bid'");
										$insert=mysql_query("insert into reserve (BookID,TeacherID,Date) values('".$bid."','".$uid."','".$currenttime."')");
										$reserveid=mysql_query("select * from reserve");
										$reservenumrow=mysql_num_rows($reserveid);
										while($currentid=mysql_fetch_assoc($reserveid)){
										$currentrid=$currentid['ReserveID'];
																					   }
										$insertreserve=mysql_query("insert into borrowhistory (ReserveID) values('".$currentrid."')");
										header("location: userreservelist.php?uid=$_SESSION[UserID]");
										}
														}
								else{
									header("logout.php");
									}
								}
						else{
							echo "book id or user id not found!"."<br/>";
							}
								}	
				else{
					echo "Reached reserve limit!"."<br/>";
				    }
			                    }
			else{
				echo "Sorry! No more book for reservation!"."<br/>";					
				}
									}
		else{
			echo "You must login to reserve!"."<br/>";
			}
}
?>