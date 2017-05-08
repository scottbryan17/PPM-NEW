<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Profile</h2>
						<p>Welcome <?php isset($_SESSION['UserID'])?></p>
					</header>
<?php
session_start();
include "database.php";

if(isset($_SESSION['Position'])&&$_SESSION['Position']=='Student'){
	$userid=$_SESSION['UserID'];
	$subuserid=substr($userid,3);
	
	if($_SESSION['UserID']>$subuserid){
		$studentdata=mysql_query("select * from student where StudentID='$userid'");
		$studentnumrow=mysql_num_rows($studentdata);
		while ($retrievestudent=mysql_fetch_assoc($studentdata)){
			$studentname=$retrievestudent['StudentName'];
			$course=$retrievestudent['Course'];
			$blacklist=$retrievestudent['Blacklist'];
			$email=$retrievestudent['Email'];
			$noofborrow=$retrievestudent['NoOfBorrow'];
			$maxofborrow=$retrievestudent['MaxOfBorrow'];
		}
		?>
		<table>
			<tr>
				<td>StudentID :</td><td><?php echo $studentname;?></td>
			</tr>
			<tr>
				<td>Course :</td><td><?php echo $course;?></td>
			</tr>
			<tr>
				<td>E-mail :</td><td><?php echo $email;?></td>
			</tr>
			<tr>
				<td>Total of Borrow :</td><td><?php echo $noofborrow."/".$maxofborrow?></td>
			</tr>
			<tr>
				<td>Blacklist :</td><td><?php echo $blacklist;?></td>
			</tr>
		</table>
		<?php
	}
	else{
		header("location:logout.php");
	}	
}
elseif(isset($_SESSION['Position'])&&$_SESSION['Position']=='Teacher'){
	$userid=$_SESSION['UserID'];
	$subuserid=substr($userid,3);
	
	if($_SESSION['UserID']>$subuserid){
		$teacherdata=mysql_query("select * from teacher where TeacherID='$userid'");
		$teachernumrow=mysql_num_rows($teacherdata);
		while ($retrieveteacher=mysql_fetch_assoc($teacherdata)){
			$teachername=$retrieveteacher['TeacherName'];
			$departments=$retrieveteacher['Departments'];
			$email=$retrieveteacher['Email'];
			$blacklist=$retrieveteacher['Blacklist'];
			$noofborrow=$retrieveteacher['NoOfBorrow'];
			$maxofborrow=$retrieveteacher['MaxOfBorrow'];
		}
		?>
		<table>
			<tr>
				<td>Teacher Name :</td><td><?php echo $teachername;?></td>
			</tr>
			<tr>
				<td>Department :</td><td><?php echo $departments;?></td>
			</tr>
			<tr>
				<td>E-mail :</td><td><?php echo $email;?></td>
			</tr>
			<tr>
				<td>Total of Borrow :</td><td><?php echo $noofborrow."/".$maxofborrow?></td>
			</tr>
			<tr>
				<td>Blacklist :</td><td><?php echo $blacklist;?></td>
			</tr>
		</table>
		<?php
	}
	else{
		header("location:logout.php");
	}
}

else{
	header("location:logout.php");
}	
?>
				</div>
			</section>
<?php include ('footer.php') ?>