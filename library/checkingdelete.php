<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Admin</h2>
						<p>Check delete.</p>
					</header>
<?php
include "database.php";
session_start();

if(!isset($_POST['go'])){
?>
	<form method="post" action="checkingdelete.php">
	<select name="selection">
		<option value="student">Student</option>
		<option value="teacher">Teacher</option>
	</select>
	<br/>
	<input type="submit" name="go" value="Go"/>
	</form>
<?php
}
if(isset($_POST['go'])){
	if($_POST['selection']=="student"){
?>
	<form method="post" action="deletestudent.php">
		<label for="studentid">Student ID:</label>
		<input type="text" name="studentid" value="<?php if(isset($_POST['studentid'])) echo $_POST['studentid'];?>"/>
		<br/>
		<label for="icnumber">Student Identification Number:</label>
		<input type="text" name="icnumber" value="<?php if(isset($_POST['icnumber'])) echo $_POST['icnumber'];?>"/>
		<br/>
		<input type="submit" name="search" value="Search"/>
	</form>
<?php	
	}
	if($_POST['selection']=="teacher"){
?>
	<form method="post" action="deleteteacher.php">
		<label for="studentid">Teacher ID:</label>
		<input type="text" name="teacherid" value="<?php if(isset($_POST['teacherid'])) echo $_POST['teacherid'];?>"/>
		<br/>
		<label for="icnumber">Teacher Identification Number:</label>
		<input type="text" name="icnumber" value="<?php if(isset($_POST['icnumber'])) echo $_POST['icnumber'];?>"/>
		<br/>
		<input type="submit" name="search" value="Search"/>
	</form>
<?php	
	}
}
?>
				</div>
			</section>
<?php include ('footer.php') ?>