<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Reserve Books</h2>
						<p>Reserve the book before its gone.</p>
					</header>
<?php
include "database.php";
session_start();

if(isset($_SESSION['Position'])&&$_SESSION['Position']=='Student'||$_SESSION['Position']=='Teacher'){
	$userid=$_SESSION['UserID'];
	$subid=substr($userid,0,3);
	$subuserid=substr($userid,3);
	
	if($subid=='SID'){
		if($subuserid>1000){
?>
		<h3>Reserve List</h3>
		<table>
			<tr>
				<th>ReserveID</th><th>Book ID</th><th>Book Name</th><th>Cancel Reserve</th>
			</tr>
			<?php
				$retrievereserve=mysql_query("select reserve.*,book.* from reserve,book where reserve.BookID=book.BookID and StudentID='$userid' and Reserve='No' group by reserve.ReserveID");
				$reservenumrow=mysql_num_rows($retrievereserve);
				while($getreserve=mysql_fetch_assoc($retrievereserve)){
					$reserveid=$getreserve['ReserveID'];
					$reservebookid=$getreserve['BookID'];
					$reservebookname=$getreserve['BookName'];
			?>
			<tr>
				<td><?php echo $reserveid;?></td>
				<td><?php echo $reservebookid;?></td>
				<td><?php echo $reservebookname;?></td>
				<?php if($reservenumrow>0){?>
				<td><a href="cancelreserve.php?rid=<?php echo $reserveid;?>&bid=<?php echo $reservebookid;?>&sid=<?php echo $userid;?>">Cancel</a></td>
				<?php }?>
			</tr>
			<?php }?>
		</table>

		<h3>Borrowed List</h3>
		<table>
			<tr>
				<th>Book ID</th><th>Book Name</th><th>Date of Expired</th><th>Day left of expired</th><th>Fine</th>
			</tr>
			<?php
				$retrievedata=mysql_query("select reserve.*,book.*,borrowhistory.* from reserve,book,borrowhistory where reserve.ReserveID=borrowhistory.ReserveID and borrowhistory.BookID=book.BookID and borrowhistory.StudentID='$userid' and borrowhistory.DateOfReturn='' group by borrowhistory.BorrowID");
				$datanumrow=mysql_num_rows($retrievedata);
				while($getdata=mysql_fetch_assoc($retrievedata)){
					$bookid=$getdata['BookID'];
					$bookname=$getdata['BookName'];
					$expired=$getdata['DateOfExpired'];
					$fine=$getdata['Fine'];
					
				$now=date("y-m-d"." "."h:i:sa");
				
				$createnow=date_create($now);
				$createexpired=date_create($expired);
				$different=date_diff($createnow,$createexpired);
				$left=$different->format("%R%a");
			
			?>
			<tr>
				<td><?php echo $bookid;?></td>
				<td><?php echo $bookname;?></td>
				<td><?php echo $expired;?></td>
				<td><?php echo $left;?></td>
				<td><?php echo $fine;?></td>
			</tr>
			<?php
				}
			?>
		</table>
<?php
		}
	}
	elseif($subid=='TID'){
		if($subuserid>1000){
?>
		<h3>Reserve List</h3>
		<table>
			<tr>
				<th>Reserve ID</th><th>Book ID</th><th>Book Name</th><th>Cancel Reserve</th>
			</tr>
			<?php
				$retrievereserve=mysql_query("select reserve.*,book.* from reserve,book where reserve.BookID=book.BookID and TeacherID='$userid' and Reserve='No' group by reserve.ReserveID");
				$reservenumrow=mysql_num_rows($retrievereserve);
				while($getreserve=mysql_fetch_assoc($retrievereserve)){
					$reserveid=$getreserve['ReserveID'];
					$reservebookid=$getreserve['BookID'];
					$reservebookname=$getreserve['BookName'];
			?>
			<tr>
				<td><?php echo $reserveid;?></td>
				<td><?php echo $reservebookid;?></td>
				<td><?php echo $reservebookname;?></td>
				<?php if($reservenumrow>0){?>
				<td><a href="cancelreserve.php?rid=<?php echo $reserveid;?>&bid=<?php echo $reservebookid;?>&tid=<?php echo $userid;?>">Cancel</a></td>
				<?php }?>
			</tr>
			<?php }?>
		</table>
		
		<h3>Reserve List</h3>
		<table>
			<tr>
				<th>Book ID</th><th>Book Name</th><th>Date of Expired</th><th>Day left of expired</th><th>Fine</th>
			</tr>
			<?php
				$retrievedata=mysql_query("select reserve.*,book.*,borrowhistory.* from reserve,book,borrowhistory where reserve.ReserveID=borrowhistory.ReserveID and borrowhistory.BookID=book.BookID and borrowhistory.TeacherID='$userid' and borrowhistory.DateOfReturn='' group by borrowhistory.BorrowID");
				$datanumrow=mysql_num_rows($retrievedata);
				while($getdata=mysql_fetch_assoc($retrievedata)){
					$bookid=$getdata['BookID'];
					$bookname=$getdata['BookName'];
					$expired=$getdata['DateOfExpired'];
					$fine=$getdata['Fine'];
					
				$now=date("y-m-d"." "."h:i:sa");
				
				$createnow=date_create($now);
				$createexpired=date_create($expired);
				$different=date_diff($createnow,$createexpired);
				$left=$different->format("%R%a");
			
			?>
			<tr>
				<td><?php echo $bookid;?></td>
				<td><?php echo $bookname;?></td>
				<td><?php echo $expired;?></td>
				<td><?php echo $left;?></td>
				<td><?php echo $fine;?></td>
			</tr>
			<?php
				}
			?>
		</table>
<?php
		}
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