<!DOCTYPE html>
<!--
	Interphase by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>e-Library</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><a href="index.php">e-Library</a></h1>
				<nav id="nav">
					<ul>
					
					<?php					
					error_reporting(0);
					session_start();
					
					if(($_SESSION['Position']=='Admin')&&($_SESSION['Position']!="")){ ?>
						<li><a href="booklist.php">Book</a></li>
						<li><a href="adminborrowmanual.php">Borrow</a></li>
						<li><a href="adminpendinglist.php">Pending</a></li>
						<li><a href="calculatefine.php">Return</a></li>
						<li><a href="admindelete.php">Delete Book</li>
						<li><a href="checkingdelete.php">Delete User</a></li>
						<li><a href="adminupdate.php">Update Status</a></li>
						<li><a href="searchbook.php">Search</a></li>
						<li><a href="searchuserborrow.php">History</a></li>
						<li><a href="adminrejectlist.php">Reject</a></li>
						<li><a href="registration.php">Register</a></li>
						<li><a href="insertbook.php">Insert</a></li>
						<li><a href="logout.php">Log out</a></li>
						
					<?php 
					}
					
					elseif(($_SESSION['Position']=='Student')||($_SESSION['Position']=='Teacher')&&($_SESSION['Position']!="")){ ?>
					    <li><a href="index.php">Home</a></li>
						<li><a href="booklist.php">Book List</a></li>
						<li><a href="searchbook.php">Search</a></li>
						<li><a href="profile.php">Profile</a></li>
						<li><a href="calculatefine.php">Reserve List</a></li>
						<li><a href="faq.php">FAQ</a></li>
						<li><a href="logout.php">Log Out</a></li>
					<?php 
					}
					
					else{ ?>
						<li><a href="index.php">Home</a></li>
						<li><a href="booklist.php">Book List</a></li>
						<li><a href="searchbook.php">Search</a></li>
						<li><a href="userregister.php">Register</a></li>
						<li><a href="faq.php">FAQ</a></li>
						<li><a href="login.php">Log In</a></li>
					<?php 
					} ?>
					
					</ul>
				</nav>
			</header>