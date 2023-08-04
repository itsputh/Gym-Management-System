<?php 

session_start();

if($_SESSION['user_email']==true){
	}
	else{
		header('location: login.php');
	}

include ("includes/db.php");
include ("functions/functions.php");
?>

<html>
<head>
	<title>MyGym | My Account</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all" />
</head>
<body>
	<!-- Main Container Start -->
	<div class="main_wrapper">
		
		<!-- Header Start -->
		<div class="header_wrapper">
			<a href="index.php"><img src="images/logo.jpg"></a>
			<!-- <img src="images/add2card.jpg" style="float: right"> -->
		</div>
		<!-- Header End -->
		
		<!-- NavBar Start -->
		<div id="navbar">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="my_account.php">My Account</a></li>
				<li><a href="index.php">Contact Us</a></li>
			</ul>

			<div id="login-btn-signup">
					<li><a href="logout.php">Logout</a></li>
			</div>
		</div>
		<!-- NavBar End -->
		
		<!-- Content Start -->
		<div class="content_wrapper">
			<div id="left_sidebar">
				<div id="sidebar_title">Days</div>
				<ul id="days">
					<?php  
						getDays();
					?>
				</ul>

				<div id="sidebar_title">Exercises</div>
				<ul id="days">
					<?php 
						getExercise();
					?>
				</ul>
			</div>
			<div id="right_content">
				<div id="headline">
					<div id="headline_content">
						<h1 style="color: yellow; text-align:center;"><center>No pain no gain</center></h1>
					</div>
				</div>
					<!-- Product Display Box Start -->
					<div id="products_box" style="background-image: url(images/bg3.jpg)">
						<?php 
							$email=$_SESSION['user_email'];
							$sel_user="SELECT * FROM users WHERE user_email='$email'";
							$run_user=mysqli_query($con, $sel_user);
							$count= mysqli_num_rows($run_user);
							while($row_user=mysqli_fetch_array($run_user)){
								$user_id= $row_user['user_id'];
								$user_name= $row_user['user_name'];
								$user_email= $row_user['user_email'];
								$user_weight= $row_user['user_weight'];
								$user_age= $row_user['user_age'];
								$user_contact= $row_user['user_contact'];

								echo "
									<div id='single_product'>
									<table align='center'>
										<tr>
											<th>User Name: </th>
											<td>$user_name</td>
										</tr>
										<tr>
											<th>Email: </th>
											<td>$user_email</td>
										</tr>
										<tr>
											<th>Weight: </th>
											<td>$user_weight KG</td>
										</tr>
										<tr>
											<th>Contact Number: </th>
											<td>$user_contact</td>
										</tr>
									</table>
									</div>
								";
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