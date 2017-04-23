<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Delete user.</h2>
						<p>Student section.</p>
					</header>
<?php
include "database.php";
session_start();

if($_SESSION['Position']=='Admin'){
	if(isset($_POST['search'])){
	?>
		<table>
			<tr>
				<th>Student ID</th><th>Student Name</th><th>Year of Intake</th><th>Course</th><th>Gender</th><th>Address</th><th>E-Mail</th><th>Phone</th><th>Identification Number</th><th>Delete</th>
			</tr>
	<?php
		$studentdata=mysql_query("select * from student where StudentID='$_POST[studentid]' and IdentificationNumber='$_POST[icnumber]'");
		$studentnumrow=mysql_num_rows($studentdata);
		while ($displaystudent=mysql_fetch_assoc($studentdata)){
	?>
			<tr>
				<td><?php echo $displaystudent['StudentID'];?></td>
				<td><?php echo $displaystudent['StudentName'];?></td>
				<td><?php echo $displaystudent['YearOfCourse'];?></td>
				<td><?php echo $displaystudent['Course'];?></td>
				<td><?php echo $displaystudent['Gender'];?></td>
				<td><?php echo $displaystudent['Address'];?></td>
				<td><?php echo $displaystudent['Email'];?></td>
				<td><?php echo $displaystudent['PhoneNo'];?></td>
				<td><?php echo $displaystudent['IdentificationNumber'];?></td>
				<td><a href="confirmdelete.php?sid=<?php echo $displaystudent['StudentID'];?>" onclick="return confirm('Confirm delete?')">Delete</td>
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