<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Admin</h2>
						<p>Update user in database.</p>
					</header>
<?php
include "database.php";
session_start();
if($_SESSION['Position']=='Admin'){
?>
	<h3>Update user</h3>
	<form method="post" action="adminupdate.php">
	<label for="userid">User ID :</label>
	<input type="text" name="userid" value="<?php if(isset($_POST['userid'])) echo $_POST['userid']?>"/>
	<br/>

	<label for="position">Position :</label>
	<select name="position">
		<option value="student">Student</option>
		<option value="teacher">Teacher</option>
	</select>
	<br/>
	
	<label for="member">Member :</label>
	<select name="member">
		<option value="No">No</label>
		<option value="Yes">Yes</label>
	</select>
	<br/>
	
	<label for="blacklist">Blacklist</label>
	<select name="blacklist">
		<option value="No">No</label>
		<option value="Yes">Yes</label>
	</select>
	<br/>

	<label for="reason">Reason</label>
	<textarea name="reason" value="<?php if(isset($_POST['reason'])) echo $_POST['reason'];?>"></textarea>
	<br/>
	
	<input type="submit" name="update" value="Update">
	</form>
<?php
	if(isset($_POST['update'])){
		if($_POST['position']=="teacher"){
			$query="update teacher set LibraryMember='$_POST[member]',Blacklist='$_POST[blacklist]',Reason='$_POST[reason]' where TeacherID='$_POST[userid]'";
		}elseif($_POST['position']=="student"){
			$query="update student set LibraryMember='$_POST[member]',Blacklist='$_POST[blacklist]',Reason='$_POST[reason]' where StudentID='$_POST[userid]'";
		}
		
		$updatestatus=mysql_query("$query");
		if($updatestatus>0){
			echo "Updated";
		}else{
			echo "User ID not exist!";
		}
	}
}else{
	header("location:logout.php");
}
?>
				</div>
			</section>
<?php include ('footer.php') ?>