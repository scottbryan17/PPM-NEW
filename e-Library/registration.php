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

if($_SESSION['Successreg']){
	echo $_SESSION['Successreg'];
	$_SESSION['Successreg']="";
}

if($_SESSION['Position']=='Admin'){
	if(!isset($_POST['go'])){
	?>
	<form method="post" action="registration.php">
	<select name="selection">
	<option value="student">Student</option>
	<option value="teacher">Teacher</option>
	</select>
	<input type="submit" name="go" value="Go"/>
	</form>
	<?php
	}

	if(isset($_POST['go'])){	
		if($_POST['selection']=='student'){
	?>
	<form method="post" action="confirmregistration.php"/> 
	<label for="studentname">Student Name :</label>
	<input type="text" name="studentname" value="<?php if(isset($_POST['studentname'])) echo $_POST['studentname'];?>" required="required" placeholder="Name"/>*
	<br/>
	<label for="course">Course :</label>
	<input type="text" name="course" value="<?php if(isset($_POST['course'])) echo $_POST['course'];?>" required="required" placeholder="Diploma in Information Technology"/>*
	<br/>
	<label for="year">Year of Intake :</label>
	<input type="text" name="year" value="<?php if(isset($_POST['year'])) echo $_POST['year'];?>" required="required" placeholder="April 2015"/>*
	<br/>
	<label for="idennum">Identification Number :</label>
	<input type="text" name="idennum" value="<?php if(isset($_POST['idennum'])) echo $_POST['idennum'];?>" required="required" placeholder="E.g. 570831001234"/>*
	<?php if(isset($icstandard))echo $icstandard;?>
	<br/>
	<label for="gender">Gender :</label>
	<select name="gender" required="required">
		<option value="male">Male</option>
		<option value="female">Female</option>
	</select>*
	<br/>
	<label for="email">E-Mail Address :</label>
	<input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" placeholder="E-Mail"/>
	<br/>
	<label for="phone">Hand Phone No. :</label>
	<input type="text" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>" placeholder="E.g. 0123339999"/>
	<?php if(isset($phonestandard))echo $phonestandard;?>
	<br/>
	<label for="address">Address :</label>
	<input type="text" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address'];?>" placeholder="Address"/>
	<br/>
	<input type="hidden" name="student" value="student"/>
	<input type="submit" name="register" value="Register"/>  
	<?php
		}
		
		if($_POST['selection']=='teacher'){
	?>
	<form method="post" action="confirmregistration.php"/>
	<label for="teachername">Teacher Name :</label>
	<input type="text" name="teachername" value="<?php if(isset($_POST['teachername'])) echo $_POST['teachername'];?>" required="required" placeholder="Name"/>*
	<br/>
	<label for="department">Department :</label>
	<input type="text" name="department" value="<?php if(isset($_POST['department'])) echo $_POST['department'];?>" required="required" placeholder="E.g. School of Computing and Engineering"/>*
	<br/>
	<label for="idennum">Identification Number :</label>
	<input type="text" name="idennum" value="<?php if(isset($_POST['idennum'])) echo $_POST['idennum'];?>" required="required" placeholder="E.g. 570831001234"/>*
	<?php if(isset($icstandard))echo $icstandard;?>
	<br/>
	<label for="gender">Gender :</label>
	<select name="gender" required="required">
		<option value="male">Male</option>
		<option value="female">Female</option>
	</select>*
	<br/>
	<label for="email">E-Mail Address :</label>
	<input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" placeholder="E-mail"/>
	<br/>
	<label for="phone">Hand Phone No. :</label>
	<input type="text" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>" placeholder="E.g. 0123339999"/>
	<?php if(isset($phonestandard))echo $phonestandard;?>
	<br/>
	<label for="address">Address :</label>
	<input type="text" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address'];?>" placeholder="Address"/>
	<br/>
	<input type="hidden" name="teacher" value="teacher"/>
	<input type="submit" name="register" value="Register"/>  
	<?php
		}
	}
}else{
	header("logout.php");
}?>
				</div>
			</section>
<?php include ('footer.php') ?>