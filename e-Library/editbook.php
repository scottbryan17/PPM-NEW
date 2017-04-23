<?php include ('header.php') ?>
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Edit book.</h2>
					</header>
<?php
include "database.php";
session_start();

if(!isset($_POST['update'])){
	$bookdata=mysql_query("select * from book where BookID='$_GET[editbid]'");
	$booknumrow=mysql_num_rows($bookdata);
	while($retrievedata=mysql_fetch_assoc($bookdata)){
		$bookname=$retrievedata['BookName'];
		$authorname=$retrievedata['AuthorName'];
	}
}
if(isset($_POST['update'])){
	$newbookname=$_POST['bookname'];
	$newauthorname=$_POST['authorname'];
	$updatebook=mysql_query("update book set BookName='$newbookname',AuthorName='$newauthorname' where BookID='$_POST[hiddenid]'");
	header("location:booklist.php");
}
?>
<form method="post" action="editbook.php">
<label for="bookname">Book Name:</label>
<input type="text" name="bookname" value="<?php echo $bookname;?>" required="required"/>
<br/>
<label for="authorname">Author Name:</label>
<input type="text" name="authorname" value="<?php echo $authorname;?>" required="required"/>
<br/>
<input type="hidden" name="hiddenid" value="<?php echo $_GET['editbid'];?>"/>
<input type="submit" name="update" value="Update"/>
</form>
				</div>
			</section>
<?php include ('footer.php') ?>