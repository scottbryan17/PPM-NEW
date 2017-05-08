<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Admin</h2>
					</header>
<?php
session_start();
include "database.php";
if($_SESSION['Position']=='Admin'){	
	$reservedata=mysql_query("select * from reserve where Reserve='No'");
	$reservenumrow=mysql_num_rows($reservedata);
	while($retrievereserve=mysql_fetch_assoc($reservedata)){
		$rid=$retrievereserve['ReserveID'];
		$bid=$retrievereserve['BookID'];
		$sid=$retrievereserve['StudentID'];
		$tid=$retrievereserve['TeacherID'];
		$date=$retrievereserve['Date'];
		$reserved=$retrievereserve['Reserve'];
		
		if(strlen($sid)==7){
			$subhidden=substr($sid,0,3);
			$hideuser=$subhidden;
		}
		if(strlen($tid)==7){
			$subhidden=substr($tid,0,3);
			$hideuser=$subhidden;
		}
		?>
		<table border=1>
			<th>Reserve ID</th><th>Book ID</th><th>Student ID</th><th>Teacher ID</th><th>Date of Reserve</th><th>Approve</th><th>Decline</th>
			<tr>
				<td><?php echo $rid ;?><br/></td>
				<td><?php echo $bid ;?><br/></td>
				<td><?php echo $sid ;?><br/></td>
				<td><?php echo $tid ;?></td>
				<td><?php echo $date ;?><br/></td>
				<form method="post" action="adminapproveordecline.php">
				<input type="hidden" value="<?php echo $hideuser;?>" name="hiddenuser"/>
				<input type="hidden" value="<?php echo $sid;?>" name="hiddensid"/>
				<input type="hidden" value="<?php echo $tid;?>" name="hiddentid"/>
				<input type="hidden" value="<?php echo $rid;?>" name="hiddenrid"/>
				<td><input type="submit" value="approve" name="approve[<?php echo $rid;?>]"/><br/></td>
				<td><input type="submit" value="decline" name="decline[<?php echo $rid;?>]"/><br/></td>
				</form>
			</tr>
		</table>
		<?php
	}
	if($reservenumrow<1){
		echo "Currently no reservation from user!";
	}
}else{
	header("location:logout.php");
}
?>
				</div>
			</section>
<?php include ('footer.php') ?>