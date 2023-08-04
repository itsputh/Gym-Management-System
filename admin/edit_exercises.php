<?php 

include ("includes/db.php");

if (isset($_GET['edit_exercise'])) {
	$edit_exer_id=$_GET['edit_exercise'];

	$sel_exer="SELECT * FROM exercises WHERE exer_id='$edit_exer_id'";
	$run_exer=mysqli_query($con, $sel_exer);
	$row_exer=mysqli_fetch_array($run_exer);
	$exer_up_id=$row_exer['exer_id'];
	$exer_name=$row_exer['exer_name'];
	$sets=$row_exer['sets'];
	$day_id=$row_exer['day_id'];
	$exer_img=$row_exer['exer_img'];
	$user_id=$row_exer['user_id'];
}

$sel_day="SELECT * FROM Days WHERE day_id='$day_id'";
$run_day=mysqli_query($con, $sel_day);
$row_days=mysqli_fetch_array($run_day);

$day_edit_name=$row_days['day_name'];


$sel_user="SELECT * FROM users WHERE user_id='$user_id'";
$run_user=mysqli_query($con, $sel_user);
$row_users=mysqli_fetch_array($run_user);

$user_edit_name=$row_users['user_name'];

?>
<html>
<head>
	<title>MyGym | Edit Exercises</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="" enctype="multipart/form-data">
		<table width="794px" align="center" border="1" bgcolor="#f1533e">
			<tr>
				<td colspan="2" align="center"><h1>Edit or Update Exercises</h1></td>
			</tr>
			<tr>
				<td align="right"><b>User Name</b></td>
				<td>
					<select name="user">
						<option value="<?php echo $user_id; ?>"><?php echo $user_edit_name; ?></option>
						<?php
						$get_user="SELECT * FROM users";
						$run_user=mysqli_query($con, $get_user);
						while($row_days=mysqli_fetch_array($run_user)){
							$user_id=$row_days['user_id'];
							$user_name=$row_days['user_name'];
							echo "<option value='$user_id'>$user_name</option>";
						}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right"><b>Days</b></td>
				<td>
					<select name="day">
						<option value="<?php echo $day_id; ?>"><?php echo $day_edit_name; ?></option>
						<?php
							$get_day="SELECT * FROM days";
							$run_day=mysqli_query($con, $get_day);
							while($row_days=mysqli_fetch_array($run_day)){
								$day_id=$row_days['day_id'];
								$day_name=$row_days['day_name'];
								echo "<option value='$day_id'>$day_name</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right"><b>Name Of Exercise</b></td>
				<td><input type="text" name="exercise" value="<?php echo $exer_name; ?>"></td>
			</tr>
			
			<tr>
				<td align="right"><b>Number of Sets</b></td>
				<td><input type="text" name="sets" value="<?php echo $sets; ?>"></td>
			</tr>
			<tr>
				<td align="right"><b>Exercise Image</b></td>
				<td><input type="file" name="exer_img"><br><img src="exercise_images/<?php echo $exer_img; ?>" width="60" height="44"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="update_workout" value="Update Workout"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php 

	if (isset($_POST['update_workout']))
	{

		//Text Data Variables
		$user_id= $_POST['user'];
		$exer_name= $_POST['exercise'];
		$day_id= $_POST['day'];
		$sets= $_POST['sets'];

		//  Image Name
		$exercise_img= $_FILES['exer_img']['name'];

		//Images Temp Name
		$temp_name= $_FILES['exer_img']['tmp_name'];

		//Validations
		if($user_name==''){
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($exer_name=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($day_name=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($sets=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($exercise_img=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}

		else{

			move_uploaded_file($temp_name, "exercise_images/$exercise_img");

			//Query For Inserting Workout Into Database.....
			$update_exer = "UPDATE exercises SET exer_name='$exer_name', sets='$sets', day_id='$day_id', exer_img='$exercise_img', user_id='$user_id' WHERE exer_id='$exer_up_id'";
			$run_update = mysqli_query($con, $update_exer);
			if ($run_update) {
				echo "<script>alert('Exercise Updated')</script>";
				echo "<script>window.open('index.php?view_exercises','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>