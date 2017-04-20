<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Admin</h2>
						<p>Insert book</p>
					</header>
<?php
include "database.php";
session_start();

if($_SESSION['Position']=='Admin'){
?>
	<form method="post" action="insertbook.php">
	<label for="bookname">Book Name :</label>
	<input type="text" name="bookname" value="<?php if(isset($_POST['bookname'])) echo $_POST['bookname']?>"/>
	<br/>
	<label for="booktype">Book Type :</label>
	<select name="booktype">
		<option value="art">Art</option>
		<option value="building">Building</option>
		<option value="finance">Finance</option>
		<option value="language">Language</option>
		<option value="math">Mathematics</option>
		<option value="programming">Programming</option>
		<option value="religion">Religion</option>
		<option value="other">Other</option>
	</select>
	<br/>
	<label for="authorname">Author Name :</label>
	<input type="text" name="authorname" value="<?php if(isset($_POST['authorname'])) echo $_POST['authorname']?>"/>
	<br/>
	<label for="publisher">Publisher :</label>
	<input type="text" name="publisher" value="<?php if(isset($_POST['publisher'])) echo $_POST['publisher']?>"/>
	<br/>
	<label for="cost">Cost :</label>
	<input type="text" name="cost" value="<?php if(isset($_POST['cost'])) echo $_POST['cost']?>"/>
	<br/>
	<label for="noavailable">Number of Book :</label>
	<input type="text" name="noavailable" value="<?php if(isset($_POST['noavailable'])) echo $_POST['noavailable']?>"/>
	<br/>
	<input type="submit" name="add" value="Add"/>
	</form>
<?php
	
	if(isset($_POST['add'])){
		$bookname=$_POST['bookname'];
		$booktype=$_POST['booktype'];
		$authorname=$_POST['authorname'];
		$publisher=$_POST['publisher'];
		$cost=$_POST['cost'];
		$noavailable=$_POST['noavailable'];
		
		if(number_format($cost,2)){
			if(is_numeric($noavailable)){
				$formatcost=number_format($cost,2);
				
				$displaydata=mysql_query("select * from latestid");
				$displaynumrow=mysql_num_rows($displaydata);
				while($getdata=mysql_fetch_assoc($displaydata)){
				$latestbid=$getdata['BookID'];
				}
						
				$sublatestbid=substr($latestbid,3);
				$newlatestbid=$sublatestbid+1;
				$newbookid="BID".$newlatestbid;
				
				$insertbook=mysql_query("insert into book values('".$newbookid."','".$bookname."','".$authorname."','".$publisher."','".$cost."','".$noavailable."','".$booktype."')");
				$update=mysql_query("update latestid set BookID='$newbookid'");
				echo "Insert successfully!";
			}
			else{
				echo "Number of book must be number only";
			}
		}
		else{
			echo "Cost must be number only";
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