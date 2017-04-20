<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Delete user.</h2>
						<p>Teacher section.</p>
					</header>
<?php
include "database.php";
session_start();
if($_SESSION['Position']=='Admin'){
	if(isset($_POST['search'])){
	?>
		<table>
			<tr>
				<th>Teacher ID</th><th>Teacher Name</th><th>Department</th><th>Gender</th><th>Address</th><th>E-Mail</th><th>Phone</th><th>Identification Number</th><th>Delete</th>
			</tr>
	<?php
		$teacherdata=mysql_query("select * from teacher where TeacherID='$_POST[teacherid]' and IdentificationNumber=$_POST[icnumber]");
		$teachernumrow=mysql_num_rows($teacherdata);
		while ($displayteacher=mysql_fetch_assoc($teacherdata)){
	?>
			<tr>
				<td><?php echo $displayteacher['TeacherID'];?></td>
				<td><?php echo $displayteacher['TeacherName'];?></td>
				<td><?php echo $displayteacher['Departments'];?></td>
				<td><?php echo $displayteacher['Gender'];?></td>
				<td><?php echo $displayteacher['Address'];?></td>
				<td><?php echo $displayteacher['Email'];?></td>
				<td><?php echo $displayteacher['PhoneNo'];?></td>
				<td><?php echo $displayteacher['IdentificationNumber'];?></td>
				<td><a href="confirmdelete.php?tid=<?php echo $displayteacher['TeacherID'];?>" onclick="return confirm('Confirm delete?')">Delete</td>
			</tr>
	<?php	
		}
	?>	
		</table>
	<?php	
	}
}else{
	header("location:logout.php");
}
?>
				</div>
			</section>
<?php include ('footer.php') ?>