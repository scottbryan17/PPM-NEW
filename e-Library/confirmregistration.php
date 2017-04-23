<?php
include "database.php";

if(isset($_POST['student'])){
	if(is_numeric($_POST['phone'])){
		$phonestandard="";
		$phonelength=strlen($_POST['phone']);
			if($phonelength>=10||$phonelength>=11){
				$phonestandard="";
				$subphone=substr($_POST['phone'],0,2);
					if($subphone=01){
						$phonestandard="";
						$iclength=strlen($_POST['idennum']);
							if($iclength==12 && is_numeric($_POST['idennum'])){
									$icstandard="";
									$studentname=$_POST['studentname'];
									$course=$_POST['course'];
									$year=$_POST['year'];
									$icnum=$_POST['idennum'];
									$gender=$_POST['gender'];
									$email=$_POST['email'];
									$phone=$_POST['phone'];
									$address=$_POST['address'];
						
									$displaydata=mysql_query("select * from latestid");
									$displaynumrow=mysql_num_rows($displaydata);
									while($getdata=mysql_fetch_assoc($displaydata)){
									$latestid=$getdata['StudentID'];
									}
						
									$sublatestid=substr($latestid,3);
									$newlatestid=$sublatestid+1;
									$newstudentid="SID".$newlatestid;
						
									$insert=mysql_query("insert into student(StudentID,StudentName,YearOfCourse,Course,Gender,Email,PhoneNo,Address,IdentificationNumber) values('".$newstudentid."','".$studentname."','".$year."','".$course."','".$gender."','".$email."','".$phone."','".$address."','".$icnum."')");
									$update=mysql_query("update latestid set StudentID='$newstudentid'");
									$_SESSION['successreg']="Register Successfully!";
									header("location:registration.php");
								}
								else{
								echo $icstandard="Not standard Identification Number";
								}
							}
					else{
					echo $phonestandard="Your input not standard hand phone number";
					}
			}
			else{
				echo $phonestandard="Your hand phone number either too long or too short";
			}
	}
	else {
		echo $phonestandard="Your input must be number only";
	}
}

if(isset($_POST['teacher'])){
	if(is_numeric($_POST['phone'])){
		$phonestandard="";
		$phonelength=strlen($_POST['phone']);
			if($phonelength>=10||$phonelength>=11){
				$phonestandard="";
				$subphone=substr($_POST['phone'],0,2);
					if($subphone=01){
						$phonestandard="";
						$iclength=strlen($_POST['idennum']);
						if($iclength==12 && is_numeric($_POST['idennum'])){
							$icstandard="";
							$teachername=$_POST['teachername'];
							$department=$_POST['department'];
							$icnum=$_POST['idennum'];
							$gender=$_POST['gender'];
							$email=$_POST['email'];
							$phone=$_POST['phone'];
							$address=$_POST['address'];
						
							$displaydata=mysql_query("select * from latestid");
							$displaynumrow=mysql_num_rows($displaydata);
							while($getdata=mysql_fetch_assoc($displaydata)){
								$latestid=$getdata['TeacherID'];
							}
						
							$sublatestid=substr($latestid,3);
							$newlatestid=$sublatestid+1;
							$newteacherid="TID".$newlatestid;
						
							$insert=mysql_query("insert into teacher(TeacherID,TeacherName,Departments,Gender,Email,PhoneNo,Address,IdentificationNumber) values('".$newteacherid."','".$teachername."','".$department."','".$gender."','".$email."','".$phone."','".$address."','".$icnum."')");
							$update=mysql_query("update latestid set TeacherID='$newteacherid'");
							
							$_SESSION['successreg']="Register Successfully!";
							header("location:registration.php");
						}
						else{
							echo $icstandard="Not standard Identification Number";
						}
					}
					else{
						echo $phonestandard="Your input not standard hand phone number";
					}
			}
			else{
				echo $phonestandard="Your hand phone number either too long or too short";
			}
	}
	else {
		echo $phonestandard="Your input must be number only";
	}
}
?>