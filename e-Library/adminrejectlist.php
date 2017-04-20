<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Admin</h2>
						<p>Reject user book request.</p>
					</header>
					
<table  border="1">
	<th>Book ID</th><th>Student ID</th><th>Teacher ID</th>					
<?php
include "database.php";
session_start();

if($_SESSION['Position']=='Admin'){
$retrievereject=mysql_query("select * from reserve where Reserve='Reject' group by ReserveID");
$rejectnumrow=mysql_num_rows($retrievereject);
while($rejectdata=mysql_fetch_assoc($retrievereject)){
?>
	<tr>
		<td><?php echo $rejectdata['BookID'];?></td>
		<td><?php echo $rejectdata['StudentID'];?></td>
		<td><?php echo $rejectdata['TeacherID'];?></td>
	</tr>
<?php }?>
</table>
<?php
}
else{
	header("location:logout.php");
}
?>
				</div>
			</section>
<?php include ('footer.php') ?>