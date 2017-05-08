<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Search</h2>
					</header>
<?php
	include "database.php";
	session_start();
?>
<form method="post" action="searchbook.php">
	<input type="text" name="searchbook" value="<?php if(isset($_POST['searchbook'])) echo $_POST['searchbook'];?>"/>
	<input type="submit" name="searching" value="Search"/>
</form>
<?php
	if(isset($_POST['searchbook'])){
		$searchbook=mysql_query("select * from book where BookName like '%$_POST[searchbook]%' or AuthorName like '%$_POST[searchbook]%' or PublisherName like '%$_POST[searchbook]%' or Type like '%$_POST[searchbook]%'");

		if(!isset($_SESSION['Position'])){
			$_SESSION['Position']='Visitor';
		}
	
				if($_SESSION['Position']=='Admin'){
					$subtitle="Edit/Delete";	
				}
				else{
					$subtitle="Reservation";	
				}
				
		$userid=$_SESSION['UserID'];
		$subuserid=substr($userid,3);
	
				if(!isset($_SESSION['UserID'])||$subuserid<1000){
					$path="logout.php";
				}else{
					$uid=$userid;
					$path="reservelist.php";
				}
				
	if(mysql_num_rows($searchbook)>0){
		echo "Result"."<br/>";
		?>
			<table>
				<tr>
					<th>Book Name</th><th>Author Name</th><th>Publisher Name</th><th>Type</th><th><?php echo $subtitle?></th>
				</tr>
		<?php
		while($displaysearch=mysql_fetch_assoc($searchbook)){
		
		?>
				<tr>
					<td><?php echo $displaysearch['BookName'];?><br/></td>
					<td><?php echo $displaysearch['AuthorName'];?><br/></td>
					<td><?php echo $displaysearch['PublisherName'];?><br/></td>
					<td><?php echo $displaysearch['Type'];?></td>
					<?php
					if($_SESSION['Position']!='Admin'){
							?>
							<td><form method="post" action="<?php echo $path;?>">
								<input type="hidden" name="bid" id="bid" value="<?php echo $displaysearch['BookID'];?>"/>
								<input type="hidden" name="curuid" id="uid" value="<?php echo $uid;?>"/>
								<input type="hidden" name="noavailable" id="noavailable" value="<?php echo $noofavailable;?>"/>
								<input type="submit" name="reserve" id="<?php echo $displaysearch['BookID'];?>" value="reserve"/>
								<?php
							}
								if($_SESSION['Position']=='Admin'){
								?>
								<td>
									<a href="editbook.php?editbid=<?php echo $displaysearch['BookID'];?>">Edit</a>
									/
									<a href="deletebook.php?deletebid=<?php echo $displaysearch['BookID'];?>">Delete</a>
								</td>
								<?php
								}
		}
								?>
								</form></td>
				</tr>
			</table>

	<?php
	}
	else{
		echo"Book Not Found!";
	}
	}
?>
				</div>
			</section>
<?php include ('footer.php') ?>