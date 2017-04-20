<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Admin</h2>
						<p>Borrower manual</p>
					</header>
<?php
include "database.php";
session_start();

if($_SESSION['Position']=='Admin'){
?>
	<form method="post" action="adminborrowmanual.php"/>
		<label for="userid">Borrower ID:</label>
		<input type="text" name="userid" value="<?php if(isset($_POST['userid'])) echo $_POST['userid'];?>"/>
		<br/>
		<label for="bookid">Book ID</label>
		<input type="text" name="bookid" value="<?php if(isset($_POST['bookid'])) echo $_POST['bookid'];?>"/>
		<br/>
		<input type="submit" name="borrow" value="Borrow"/>
	</form>
<?php
	if(isset($_POST['borrow'])){
		$checkbook=mysql_query("select * from book where BookID='$_POST[bookid]'");
		$cbnumrow=mysql_num_rows($checkbook);
		while($checkingbook=mysql_fetch_assoc($checkbook)){
			$bookid=$checkingbook['BookID'];
			$cravailable=$checkingbook['NoAvailable'];
		}
						
		$checkreserve=mysql_query("select book.NoAvailable,reserve.BookID,count(*) as pending from book,reserve where book.BookID=reserve.BookID and reserve.Reserve='No' and reserve.BookID='$_POST[bookid]' group by reserve.BookID");
		$crnumrow=mysql_num_rows($checkreserve);
		while($crresult=mysql_fetch_assoc($checkreserve)){
			$crbook=$crresult['BookID'];
			$crpending=$crresult['pending'];
		}
		
		if($crnumrow==0){
			$crpending=0;
		}
		
		$subuserid=substr($_POST['userid'],0,3);
		date_default_timezone_set("Singapore");
		$now=date("y-m-d"." "."h:i:sa");
		$expiration=strtotime("+1 week");
		$duetime=date("y-m-d"." "."h:i:sa",$expiration);
			
		if(($subuserid=='SID')||($subuserid=='sid')||($subuserid)=='Sid'){
			if($cravailable>$crpending){
				$checkstudentid=mysql_query("select * from student where StudentID='$_POST[userid]'");
				$snumrow=mysql_num_rows($checkstudentid);
				while($checkingsid=mysql_fetch_assoc($checkstudentid)){
					$studentid=$checkingsid['StudentID'];
					$member=$checkingsid['LibraryMember'];
					$blacklist=$checkingsid['Blacklist'];
					$studentcurborrow=$checkingsid['NoOfBorrow'];
					$studentmaxborrow=$checkingsid['MaxOfBorrow'];
					
					if($blacklist=="No"){
						if($studentid==$_POST['userid'] && $member=="Yes"){
							if($studentcurborrow<$studentmaxborrow){
								$newbookavailable=$cravailable-1;
								$newcurborrow=$studentcurborrow+1;
								$insert=mysql_query("insert into borrowhistory(StudentID,BookID,DateOfBorrow,DateOfExpired) values('".$_POST['userid']."','".$_POST['bookid']."','".$now."','".$duetime."')");
								$update=mysql_query("update student set NoOfBorrow='$newcurborrow' where StudentID='$_POST[userid]'");
								$update=mysql_query("update book set NoAvailable='$newbookavailable' where BookID='$_POST[bookid]'");
									if($insert>0){
									echo "Borrow successfully!";
								}
							}else{
								echo "User reached maximum borrow!";
							}
						}else{
							echo "User not a member of library yet";
						}
					}else{
						echo "The user on blacklist";
					}
				}
			}else{
				echo "The book is reserved";
			}
		}
		
		elseif(($subuserid=='TID')||($subuserid=='tid')||($subuserid)=='Tid'){
			if($cravailable>$crpending){
				$checkteacherid=mysql_query("select * from teacher where TeacherID='$_POST[userid]'");
				$tnumrow=mysql_num_rows($checkteacherid);
				while($checkingtid=mysql_fetch_assoc($checkteacherid)){
					$teacherid=$checkingtid['TeacherID'];
					$member=$checkingtid['LibraryMember'];
					$blacklist=$checkingtid['Blacklist'];
					$teachercurborrow=$checkingtid['NoOfBorrow'];
					$teachermaxborrow=$checkingtid['MaxOfBorrow'];
					
					if($blacklist=="No"){
						if($teacherid==$_POST['userid'] && $member=="Yes"){
							if($teachercurborrow<$teachermaxborrow){
								$newbookavailable=$cravailable-1;
								$newcurborrow=$teachercurborrow+1;
								$insert=mysql_query("insert into borrowhistory(TeacherID,BookID,DateOfBorrow,DateOfExpired) values('".$_POST['userid']."','".$_POST['bookid']."','".$now."','".$duetime."')");
								$update=mysql_query("update teacher set NoOfBorrow='$newcurborrow' where TeacherID='$_POST[userid]'");
								$update=mysql_query("update book set NoAvailable='$newbookavailable' where BookID='$_POST[bookid]'");
								if($insert>0){
								echo "Borrow successfully!";
								}
							}else{
								echo "User reached maximum borrow!";
							}
						}else{
							echo "User not a member of library yet";
						}
					}else{
						echo "The user on blacklist";
					}
				}
			}else{
				echo "The book is reserved";
			}
		}
		else{
			echo "User ID not found!";
		}
	}
}
else{
	header("location:logout.php");
}
?>
				</div>
			</section>
<?php include ('footer.php') ?>