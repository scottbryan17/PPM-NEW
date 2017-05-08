<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Admin</h2>
						<p>Delete book.</p>
					</header>
<?php
include "database.php";
session_start();
if($_SESSION['Position']=='Admin'){	
$retrievedata=mysql_query("select * from book");
$retrievenumrow=mysql_num_rows($retrievedata);
while($getdata=mysql_fetch_assoc($retrievedata)){
	$getdata['BookID'];
	$getdata['BookName'];
	$getdata['AuthorName'];
	$getdata['PublisherName'];
	$getdata['Cost'];
	$getdata['NoAvailable'];
	$getdata['Type'];
?>
<table>
	<tr>
		<th>Book ID</th><th>Book Name</th><th>Author Name</th><th>Publisher</th><th>Cost</th><th>No. of Book</th><th>Type</th><th>Delete</th>
	</tr>
	<tr>
		<td><?php echo $getdata['BookID'];?></td>
		<td><?php echo $getdata['BookName'];?></td>
		<td><?php echo $getdata['AuthorName']?></td>
		<td><?php echo $getdata['PublisherName'];?></td>
		<td><?php echo $getdata['Cost'];?></td>
		<td><?php echo $getdata['NoAvailable'];?></td>
		<td><?php echo $getdata['Type'];?></td>
		<td><a href="confirmdelete.php?bid=<?php echo $getdata['BookID']?>" onclick="return confirm('Confrim delete?')">Delete</a></td>
	</tr>
<?php
}
?>
</table>
<?php
}else{
	header("location:logout.php");
}
?>
				</div>
			</section>
<?php include ('footer.php') ?>