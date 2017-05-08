<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Book List</h2>
					</header>
<?php 
	session_start();
	include "database.php";
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
	$subuser=substr($userid,0,3);
	$subuserid=substr($userid,3);
?>
		<h1>Book List</h1>
		
		<table>
			<tr><th>Book Name</th> <th>Author Name</th> <th>Publisher Name</th> <th>Type of Book</th> <th><?php echo $subtitle?></th></tr>
			
			<?php
				if(!isset($_SESSION['UserID'])||$subuserid<1000){
					$path="logout.php";
				}else{
					$uid=$userid;
					$path="reservelist.php?uid=$userid";
				}
				
				if($subuser=='SID'){
					$userdata=mysql_query("select * from student where StudentID='$userid'");
					$usernumrow=mysql_num_rows($userdata);
					while($displaydata=mysql_fetch_assoc($userdata)){
						$blacklist=$displaydata['Blacklist'];
					}
				}
				elseif($subuser=='TID'){
					$userdata=mysql_query("select * from teacher where TeacherID='$userid'");
					$usernumrow=mysql_num_rows($userdata);
					while($displaydata=mysql_fetch_assoc($userdata)){
						$blacklist=$displaydata['Blacklist'];
					}
				}
				else{
					$blacklist="No";
				}
				
				$bookdata=mysql_query("select * from book");
				$booknumrows=mysql_num_rows($bookdata);
				while($displaybook=mysql_fetch_assoc($bookdata)){
					$bookid=$displaybook['BookID'];
					$noofavailable=$displaybook['NoAvailable'];
					?>
						<tr>
							<td><?php echo $displaybook['BookName'];?><br/></td>
							<td><?php echo $displaybook['AuthorName'];?><br/></td>
							<td><?php echo $displaybook['PublisherName'];?><br/></td>
							<td><?php echo $displaybook['Type'];?><br/></td>
							<?php
							if($_SESSION['Position']!='Admin' && $blacklist=='No'){
							?>
							<td><form method="post" action="<?php echo $path;?>">
								<input type="hidden" name="bid" id="bid" value="<?php echo $bookid;?>"/>
								<input type="hidden" name="curuid" id="curuid" value="<?php echo $userid;?>"/>
								<input type="hidden" name="noavailable" id="noavailable" value="<?php echo $noofavailable;?>"/>
								<input type="submit" name="reserve" id="<?php $bookid;?>" value="reserve"/>
								<?php
							}
							if($blacklist=='Yes'){
								?>
								<td>Sorry you're under Blacklist</td>
								<?php
							}
								if($_SESSION['Position']=='Admin'){
								?>
								<td>
									<a href="editbook.php?editbid=<?php echo $bookid;?>">Edit</a>
									/
									<a href="deletebook.php?deletebid=<?php echo $bookid;?>">Delete</a>
								</td>
								<?php
								}
								?>
								</form></td>
						</tr>
					<?php	
				}		
			?>
			
		</table>
				</div>
			</section>
<?php include ('footer.php') ?>
