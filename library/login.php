<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Log In</h2>
						<p>Feel safe with our log in system.</p>
					</header>
<?php
	session_start();
	include "database.php";
	
if(!isset($_SESSION['UserID'])||$_SESSION['UserID']<1){
?>	
		<form action="loginchecking.php" method="post">
			<select name="position">
			<option value="admin">Admin</option>
			<option value="student">Student</option>
			<option value="teacher">Teacher</option>
			</select>
			<br/>
			
			<label for="loginuserid">User ID :</label>
			<input type="text" name="loginuserid" placeholder="Please enter your user ID" required="required" value="<?php if (isset($_POST['loginuserid'])) echo $_POST['loginuserid'];?>"/>
			<br/>
			
			<label for="loginpassword">Password :</label>
			<input type="password" name="loginpassword" placeholder="Please enter your password" required="required"/>
			<br/>
			
			<input type="submit" value="Login"/>
		</form>
<?php
	if(isset($_SESSION['NoValue'])){
		echo $_SESSION['NoValue'];
	}
	else{
		echo " ";
	}
}else{
	header("location:profile.php");
}
?>		
				</div>
			</section>
	<?php include ('footer.php') ?>