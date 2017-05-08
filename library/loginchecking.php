		<?php
			session_start();
			include "database.php";
			
			function correction($correct){
				$correct=trim($correct);
				$correct=stripslashes($correct);
				$correct=htmlspecialchars($correct);
				return $correct;
			}
			
			$position=correction($_POST['position']);
			$userid=correction($_POST['loginuserid']);
			$password=correction(md5($_POST['loginpassword']));
					
			if($position=="admin"){
				if($userid&&$password){
					$admindata=mysql_query("select * from admin where AdminID='$userid' and Password='$password'");
					$adminnumrow=mysql_num_rows($admindata);
					while ($retrieveadmin=mysql_fetch_assoc($admindata)){
						$currentuserid=$retrieveadmin['AdminID'];
						$position=$retrieveadmin['Position'];
					}
					if($adminnumrow>0){
						$_SESSION['UserID']=$currentuserid;
						$_SESSION['Position']=$position;
						header("location:adminpendinglist.php");
					}
					else{
						$novalue="Admin account not exist!";
						$_SESSION['NoValue']=$novalue;
						header("location:login.php");
					}
				}
			}
			elseif($position=='student'){
				if($userid&&$password){
					$studentdata=mysql_query("select * from student where StudentID='$userid' and Password='$password'");
					$studentnumrow=mysql_num_rows($studentdata);
					while ($retrievestudent=mysql_fetch_assoc($studentdata)){
						$currentuserid=$retrievestudent['StudentID'];
						$position=$retrievestudent['Position'];
					}
					if($studentnumrow>0){
						$_SESSION['UserID']=$currentuserid;
						$_SESSION['Position']=$position;
						header("location:profile.php?sid=$currentuserid");
					}
					else{
						$novalue="Student account not exist!";
						$_SESSION['NoValue']=$novalue;
						header("location:login.php");
					}
				}
			}
			elseif($position=='teacher'){
					if($userid&&$password){
						$teacherdata=mysql_query("select * from teacher where TeacherID='$userid' and Password='$password'");
						$teachernumrow=mysql_num_rows($teacherdata);
						while ($retrieveteacher=mysql_fetch_assoc($teacherdata)){
							$currentuserid=$retrieveteacher['TeacherID'];
							$position=$retrieveteacher['Position'];
						}
						if($teachernumrow>0){
							$_SESSION['UserID']=$currentuserid;
							$_SESSION['Position']=$position;
							header("location:profile.php?tid=$currentuserid");
							}
						else{
							$novalue="Teacher account not exist!";
							$_SESSION['NoValue']=$novalue;
							header("location:login.php");
							}
					}
			}
			else{
				$noposition="Please make sure you selected the correct position!";
				$_SESSION['NoValue']=$noposition;
				header("location:login.php");
			}			
		?>