<?php 

session_start();

if($_SESSION['admin_email']==true){
	}
	else{
		header('location: login.php');
	}

include ("includes/db.php");
?>
<html>
<head>
	<title>MyGym | Index</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all" />
</head>
<body>
	<!-- Main Container Start -->
	<div class="wrapper">
		
		<!-- Header Start -->
		<div class="header">
			<a href="index.php"><img src="images/header.jpg"></a>
			<!-- <img src="images/add2card.jpg" style="float: right"> -->
		</div>
		<!-- Header End -->
		
		<!-- Content Start -->
		<div class="content_wrapper">
			<div class="right" style="background-image: url(images/right.jpg)">
					<a href="index.php?view_users">View Users</a>
					<a href="index.php?view_trainers">View Trainers</a>
					<a href="index.php?add_trainers">Add Trainers</a>
					<a href="index.php?view_exercises">View Exercises</a>
					<a href="index.php?add_exercises">Add Exercises</a>
					<a href="logout.php">Admin Logout</a>
			</div>
			<div class="left" style="background-image: url(images/bg1.jpg)">
				<!-- Product Display Box Start -->
					<div id="products_box">
						<?php
							if (isset($_GET['view_users'])) {
								include("view_users.php");
							}
							if (isset($_GET['view_trainers'])) {
								include("view_trainers.php");
							} 
							if (isset($_GET['add_trainers'])) {
								include("add_trainers.php");
							}
							if (isset($_GET['view_exercises'])) {
								include("view_exercises.php");
							}
							if (isset($_GET['add_exercises'])) {
								include("add_exercises.php");
							}
							if (isset($_GET['edit_tran'])) {
								include("edit_tran.php");
							}
							if (isset($_GET['edit_exercise'])) {
								include("edit_exercises.php");
							}
							if (isset($_GET['delete_exercise'])) {
								include("delete_exercise.php");
							}
							if (isset($_GET['delete_tran'])) {
								include("delete_trainer.php");
							}
							if (isset($_GET['delete_user'])) {
								include("delete_user.php");
							}

						?>
					</div>
					<!-- Product Display Box End -->
			</div>
		</div>
		<!-- Content End -->

		<!-- footer Start -->
		<div class="footer">
			<h5 style="color:#000; padding-top:30px; text-align:center; font-family: Verdana, Geneva, sans-serif">&copy; 2018 all rights reserved</a></h5>
		</div>
		<!-- Footer End -->

	</div>
	<!-- Main Container End -->
</body>
</html>