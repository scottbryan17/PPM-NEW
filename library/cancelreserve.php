<?php
include "database.php";

if($_GET['rid']&&($_GET['bid'])&&($_GET['sid'])){
			$update=mysql_query("update reserve set Reserve='Cancel' where ReserveID=$_GET[rid] and BookID='$_GET[bid]' and StudentID='$_GET[sid]'");
			$bookdata=mysql_query("select * from book where BookID='$_GET[bid]'");
			$booknumrow=mysql_num_rows($bookdata);
			while($bookid=mysql_fetch_assoc($bookdata)){
				$noofbook=$bookid['NoAvailable'];
			}
			$newnoofbook=$noofbook+1;
			$return=mysql_query("update book set NoAvailable='$newnoofbook' where BookID='$_GET[bid]'");
		
			$userdata=mysql_query("select * from student where StudentID='$_GET[sid]'");
			$usernumrow=mysql_num_rows($userdata);
			while($displayuser=mysql_fetch_assoc($userdata)){
				$curborrow=$displayuser['NoOfBorrow'];
			}
				
				$newcurborrow=$curborrow-1;
				$reduceborrow=mysql_query("update student set NoOfBorrow='$newcurborrow' where StudentID='$_GET[sid]'");
				
				header("location:userreservelist.php");
}
elseif(($_GET['rid'])&&($_GET['bid'])&&($_GET['tid'])){
			$update=mysql_query("update reserve set Reserve='Cancel' where ReserveID=$_GET[rid] and BookID='$_GET[bid]' and TeacherID='$_GET[tid]'");
			$bookdata=mysql_query("select * from book where BookID='$_GET[bid]'");
			$booknumrow=mysql_num_rows($bookdata);
			while($bookid=mysql_fetch_assoc($bookdata)){
				$noofbook=$bookid['NoAvailable'];
			}
			$newnoofbook=$noofbook+1;
			$return=mysql_query("update book set NoAvailable='$newnoofbook' where BookID='$_GET[bid]'");
			
			$userdata=mysql_query("select * from teacher where TeacherID='$_GET[tid]'");
			$usernumrow=mysql_num_rows($userdata);
			while($displayuser=mysql_fetch_assoc($userdata)){
				$curborrow=$displayuser['NoOfBorrow'];
			}
				
				$newcurborrow=$curborrow-1;
				$reduceborrow=mysql_query("update teacher set NoOfBorrow='$newcurborrow' where TeacherID='$_GET[tid]'");
				header("location:userreservelist.php");
}
else{
	header("location:userreservelist.php");
}
?>