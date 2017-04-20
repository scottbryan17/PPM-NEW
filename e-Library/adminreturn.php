<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Student borrow history</h2>
					</header>
<?php
include "database.php";
session_start();

if($_SESSION['Position']=='Admin'){
?>
		<table>
			<tr>
				<th>Borrow ID</th><th>Student Name</th><th>Book Name</th><th>Date of Borrow</th><th>Date of Expired</th><th>Fine</th><th>Return</th>
			</tr>
		<?php
		$borrowlist=mysql_query("select borrowhistory.*,book.BookName,student.StudentName from student inner join borrowhistory on student.StudentID = borrowhistory.StudentID join book on borrowhistory.BookID = book.BookID group by borrowhistory.BorrowID");
		$borrownumrow=mysql_num_rows($borrowlist);
		while($retrievelist=mysql_fetch_assoc($borrowlist)){
			$borrowid=$retrievelist['BorrowID'];
			$studentid=$retrievelist['StudentID'];
			$studentname=$retrievelist['StudentName'];
			$bookid=$retrievelist['BookID'];
			$bookname=$retrievelist['BookName'];
			$dateborrow=$retrievelist['DateOfBorrow'];
			$datereturn=$retrievelist['DateOfReturn'];
			$dateexpired=$retrievelist['DateOfExpired'];
			$fine=$retrievelist['Fine'];
			
			if(($dateexpired!="")&&($datereturn=="")){
		?>
			<tr>
				<td><?php echo $borrowid;?><br/></td>
				<td><?php echo $studentname;?><br/></td>
				<td><?php echo $bookname;?><br/></td>
				<td><?php echo $dateborrow;?><br/></td>
				<td><?php echo $dateexpired;?><br/></td>
				<td>RM<?php echo $fine;?><br/></td>
				<form method="post" action="confirmreturn.php">
				<input type="hidden" value="<?php echo $studentid?>" name="hiddenstudentid"/>
				<input type="hidden" value="<?php echo $borrowid;?>" name="hiddenborrowid"/>
				<input type="hidden" value="<?php echo $bookid;?>" name="hiddenbookid"/>
				<td><input type="submit" value="return" name="return[<?php echo $borrowid;?>]"/><br/></td>
				</form>
			</tr>
		<?php
			}
		}
		?>
		</table>
		
		
		<h3>Teacher Borrow History</h3>
		<table>
			<tr>
				<th>Borrow ID</th><th>Teacher Name</th><th>Book Name</th><th>Date of Borrow</th><th>Date of Expired</th><th>Fine</th><th>Return</th>
			</tr>
		<?php
		$borrowlist=mysql_query("select borrowhistory.*,book.BookName,teacher.TeacherName from teacher inner join borrowhistory on teacher.TeacherID = borrowhistory.TeacherID join book on borrowhistory.BookID = book.BookID group by borrowhistory.BorrowID");
		$borrownumrow=mysql_num_rows($borrowlist);
		while($retrievelist=mysql_fetch_assoc($borrowlist)){
			$borrowid=$retrievelist['BorrowID'];
			$teacherid=$retrievelist['TeacherID'];
			$teachername=$retrievelist['TeacherName'];
			$bookid=$retrievelist['BookID'];
			$bookname=$retrievelist['BookName'];
			$dateborrow=$retrievelist['DateOfBorrow'];
			$datereturn=$retrievelist['DateOfReturn'];
			$dateexpired=$retrievelist['DateOfExpired'];
			$fine=$retrievelist['Fine'];
			
			if(($dateexpired!="")&&($datereturn=="")){
		?>
			<tr>
				<td><?php echo $borrowid;?><br/></td>
				<td><?php echo $teachername;?><br/></td>
				<td><?php echo $bookname;?><br/></td>
				<td><?php echo $dateborrow;?><br/></td>
				<td><?php echo $dateexpired;?><br/></td>
				<td>RM<?php echo $fine;?><br/></td>
				<form method="post" action="confirmreturn.php">
				<input type="hidden" value="<?php echo $teacherid?>" name="hiddenteacherid"/>
				<input type="hidden" value="<?php echo $borrowid;?>" name="hiddenborrowid"/>
				<input type="hidden" value="<?php echo $bookid;?>" name="hiddenbookid"/>
				<td><input type="submit" value="return" name="return[<?php echo $borrowid;?>]"/><br/></td>
				</form>
			</tr>
		<?php
			}
		}
		?>
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