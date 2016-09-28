<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="Content-Type" content="text/html"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/font-awesome-4.6.3/css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/media_queries.css"/>
		<link rel="stylesheet" href="css/animate.min.css">
		<script src="js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
        <script type="text/javascript" src="js/script.js"></script>
	</head>
	<body>
		<header>
			<div class="container">
				<nav>
					<div class="menu-icon">
						<i class="fa fa-bars" aria-hidden="true"></i><span>Menu</span>
					</div>
					<ul>
						<li><a class="blue" href="index.php?page=home">Home</a></li>
						<li><a href="index.php?page=archive">Blog Archive</a></li>
						<li><a href="index.php?page=about">About me</a></li>
						<li><a href="index.php?page=contact">Contact me</a></li>
					</ul>
				</nav>
				<div class="pull_right">
					<div class="users">
						<a href="index.php?page=register">Register</a>
						<a href="index.php?page=login">Login</a>
					</div>
					
					<div class="social-network">
						<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</div>
				</div>
				<div class="header-content">
					
					<?php
						if(isset($_GET['page'])){
							echo "<h1>" . $_GET['page'] . "</h1>";
							
							if($_GET['page'] == "archive"){
								
								echo "<a href='index.php?page=archive&category=all'>All</a>";
								echo "<a href='index.php?page=archive&category=life'>Life</a>";
								echo "<a href='index.php?page=archive&category=technology'>Technology</a>";
								echo "<a href='index.php?page=archive&category=books'>Books</a>";
								echo "<a href='index.php?page=archive&category=shows'>Shows</a>";
								echo "<a href='index.php?page=archive&category=news'>News</a>";
							}
						}
						else{
							echo " <h1> Home </h1>";
						}
					?>
					
				</div>
				<div class="arrow"><i class="fa fa-caret-up" aria-hidden="true"></i></div>
			</div>
		</header>