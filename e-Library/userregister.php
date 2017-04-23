<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Registration</h2>
						<p>Start using e-Library now.</p>
					</header>
<?php
include "database.php";
session_start();
error_reporting(0);
?>
<form method="post" action="userregister.php">
	<label for="selectreg">Register As :</label>
		<select name="selectreg">
			<option value="student">Student</option>
			<option value="teacher">Teacher</option>
		</select>
	<br/>
	
	<label for="userid">Student ID / Teacher ID :</label>
		<input type="text" name="userid" value="<?php if(isset($_POST['userid'])) echo $_POST['userid'];?>"/>
	<br/>
		
	<label for="icnum">Identification Number :</label>
		<input type="text" name="icnum" value="<?php if(isset($_POST['icnum'])) echo $_POST['icnum'];?>"/>
	<br/>
	
	<label for="password">Password :</label>
		<input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password'];?>"/>
	<br/>
	
	<label for="confirm">Confirm Password :</label>
		<input type="password" name="confirm" value="<?php if(isset($_POST['confirm'])) echo $_POST['confirm'];?>"/>
	<br/>
	
	<input type="submit" name="register" value="Register"/>
</form>
<?php 
if(isset($_POST['register'])){
	if($_POST['password']===$_POST['confirm']){
		if(is_numeric($_POST['icnum'])){
			if(count($_POST['icnum']==12)){
				if($_POST['selectreg']=='student'){
					$retreivelatestid=mysql_query("select * from latestid");
					$idnumrow=mysql_num_rows($retreivelatestid);
					while($lastid=mysql_fetch_assoc($retreivelatestid)){
							$lastsid=$lastid['StudentID'];
					}
					$subid=substr($lastsid,3);
					$newid=$subid+1;
					$curid="SID".$newid;
					
					$encpassword=md5($_POST['password']);
					
					$checkexist=mysql_query("select * from student where StudentID='$_POST[userid]'");
					$checknumrow=mysql_num_rows($checkexist);
					while($checking=mysql_fetch_assoc($checkexist)){
						$checkpassword=$checking['Password'];
						$checktid=$checking['StudentID'];
						$checkic=$checking['IdentificationNumber'];
					}
					if($checkpassword==""){
						if($checktid=="$_POST[userid]" && $checkic=="$_POST[icnum]"){
							$updateaccount=mysql_query("update student set Password='$encpassword',LibraryMember='Yes' where StudentID='$_POST[userid]' and IdentificationNumber='$_POST[icnum]'");
							if($updateaccount>0){
								echo "Register Successfully!";
							}
							else{
								echo "You are not a student of KBU!";
							}
						}
						else{
							echo "Please check your Student ID and Identification Number!";
						}
					}
					else{
						echo "You already register as a member of library";
					}
					
				}
				elseif($_POST['selectreg']=='teacher'){
					$retreivelatestid=mysql_query("select * from latestid");
					$idnumrow=mysql_num_rows($retreivelatestid);
					while($lastid=mysql_fetch_assoc($retreivelatestid)){
							$lasttid=$lastid['TeacherID'];
					}
					$subid=substr($lasttid,3);
					$newid=$subid+1;
					$curid="TID".$newid;
					
					$encpassword=md5($_POST['password']);
					
					$checkexist=mysql_query("select * from teacher where TeacherID='$_POST[userid]'");
					$checknumrow=mysql_num_rows($checkexist);
					while($checking=mysql_fetch_assoc($checkexist)){
						$checkpassword=$checking['Password'];
						$checktid=$checking['TeacherID'];
						$checkic=$checking['IdentificationNumber'];
					}
					if($checkpassword==""){
						if($checktid=="$_POST[userid]" && $checkic=="$_POST[icnum]"){
							$updateaccount=mysql_query("update teacher set Password='$encpassword',LibraryMember='Yes' where TeacherID='$_POST[userid]' and IdentificationNumber='$_POST[icnum]'");
							if($updateaccount>0){
								echo "Register Successfully!";
							}
							else{
								echo "You are not a teacher of KBU!";
							}
						}
						else{
							echo "Please check your Teacher ID and Identification Number!";
						}						
					}
					else{
						echo "You already register as a member of library";
					}
				}
				else{
					echo "";
				}
			}
			else{
				echo "not standard identification number";
			}
		}
		else{
			echo "Identification Number must be numeric only!";
		}
	}
	else{
		echo "Password not match!";
	}
}
?>
				</div>
			</section>
<?php include ('footer.php') ?>