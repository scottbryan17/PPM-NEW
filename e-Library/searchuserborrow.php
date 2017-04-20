<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Admin</h2>
						<p>Search user who borrow books.</p>
					</header>
<?php
include "database.php";
session_start();

if($_SESSION['Position']=='Admin'){
	?>
	<form method="post" action="searchuserborrow.php">
	<input type="text" name="searchdata" value="<?php if(isset($_POST['searchdata'])) echo $_POST['searchdata'];?>"/>
	<select name="selectdb">
		<option value="student">Student</option>
		<option value="teacher">Teacher</option>
	<select>
	<input type="submit" name="search" value="Search"/>
	</form>
	<?php
	if(isset($_POST['search'])){		
		if($_POST['selectdb'] && $_POST['selectdb']=='student'){
			?>
			<h3>Student Borrow History</h3>
			<table>
				<tr>
					<th>Reserve ID</th><th>Student Name</th><th>Book Name</th>
				</tr>
			<?php
			$searchresult=mysql_query("select reserve.ReserveID,book.BookName,student.StudentName from student inner join reserve on student.StudentID = reserve.StudentID join book on reserve.BookID = book.BookID Where reserve.Reserve='Yes' group by reserve.ReserveID having book.BookName like '%$_POST[searchdata]%' or student.StudentName like '%$_POST[searchdata]%' or reserve.ReserveID like '%$_POST[searchdata]%'");
			$resultnumrow=mysql_num_rows($searchresult);
			while($resultdata=mysql_fetch_assoc($searchresult)){
		?>	
		<tr>
			<td><?php echo $resultdata['ReserveID'];?><br/></td>
			<td><?php echo $resultdata['StudentName'];?><br/></td>
			<td><?php echo $resultdata['BookName'];?><br/></td>
		</tr>
		<?php
		}
		?>
		</table>
		<br/>
		<?php
		}
		
		elseif($_POST['selectdb'] && $_POST['selectdb']=='teacher'){
			?>
			<h3>Teacher Borrow History</h3>
			<table>
				<tr>
					<th>Reserve ID</th><th>Teacher Name</th><th>Book Name</th>
				</tr>
			<?php
			$searchresult=mysql_query("select reserve.ReserveID,book.BookName,teacher.TeacherName from teacher inner join reserve on teacher.TeacherID = reserve.TeacherID join book on reserve.BookID = book.BookID Where reserve.Reserve='Yes' group by reserve.ReserveID having book.BookName like '%$_POST[searchdata]%' or teacher.TeacherName like '%$_POST[searchdata]%' or reserve.ReserveID like '%$_POST[searchdata]%'");
			$resultnumrow=mysql_num_rows($searchresult);
			while($resultdata=mysql_fetch_assoc($searchresult)){
		?>	
		<tr>
			<td><?php echo $resultdata['ReserveID'];?><br/></td>
			<td><?php echo $resultdata['TeacherName'];?><br/></td>
			<td><?php echo $resultdata['BookName'];?><br/></td>
		</tr>
		<?php
		}
		?>
		</table>
		<br/>
		<?php
		}
		
		else{
			$dbquery="";
		}	
	} 

	if(!isset($_POST['search'])){
	?>
		<h3>Student Borrow History</h3>
		<table>
			<tr>
				<th>Reserve ID</th><th>Student Name</th><th>Book Name</th>
			</tr>
	<?php
	$retrievestudentreserve=mysql_query("select reserve.ReserveID,book.BookName,student.StudentName from student inner join reserve on student.StudentID = reserve.StudentID join book on reserve.BookID = book.BookID Where reserve.Reserve='Yes' group by reserve.ReserveID ");
	$reservestudentnumrow=mysql_num_rows($retrievestudentreserve);
	while($reservestudentdata=mysql_fetch_assoc($retrievestudentreserve)){
	?>	
		<tr>
			<td><?php echo $reservestudentdata['ReserveID'];?><br/></td>
			<td><?php echo $reservestudentdata['StudentName'];?><br/></td>
			<td><?php echo $reservestudentdata['BookName'];?><br/></td>
		</tr>
		<?php
		}
		?>
		</table>
		<br/>
		
			<h3>Teacher Borrow History</h3>
		<table>
			<tr>
				<th>Reserve ID</th><th>Teacher Name</th><th>Book Name</th>
			</tr>
	<?php
	$retrievereserve=mysql_query("select reserve.ReserveID,book.BookName,teacher.TeacherName from teacher inner join reserve on teacher.TeacherID = reserve.TeacherID join book on reserve.BookID = book.BookID Where reserve.Reserve='Yes' group by reserve.ReserveID ");
	$reservenumrow=mysql_num_rows($retrievereserve);
	while($reservedata=mysql_fetch_assoc($retrievereserve)){
	?> 
		<tr>
			<td><?php echo $reservedata['ReserveID'];?><br/></td>
			<td><?php echo $reservedata['TeacherName'];?><br/></td>
			<td><?php echo $reservedata['BookName'];?><br/></td>
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