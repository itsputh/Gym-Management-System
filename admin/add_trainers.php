<?php 

include ("includes/db.php");

?>
<html>
<head>
	<title>MyGym | Add Trainers</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="add_trainers.php" enctype="multipart/form-data">
		<table width="794px" align="center" border="1" bgcolor="#f1533e">
			<tr>
				<td colspan="2" align="center"><h1>Add New Trainer</h1></td>
			</tr>
			<tr>
				<td align="right"><b>Name Of Trainer</b></td>
				<td><input type="text" name="trainer_name"></td>
			</tr>
			<tr>
				<td align="right"><b>Class</b></td>
				<td>
					<select name="trainer_class">
						<option>Select a Class</option>
						<?php
							$get_exer="SELECT * FROM exercises";
							$run_exer=mysqli_query($con, $get_exer);
							while($row_exer=mysqli_fetch_array($run_exer)){
								$exer_id=$row_exer['exer_id'];
								$exer_name=$row_exer['exer_name'];
								echo "<option value='$exer_name'>$exer_name</option>";
							}
						?>
					</select>
				</td>
			</tr>
			
			<tr>
				<td align="right"><b>Trainer Contact</b></td>
				<td><input type="text" name="trainer_contact"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="add_trainer" value="Add Trainer"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php 

	if (isset($_POST['add_trainer']))
	{

		//Text Data Variables
		$tran_name= $_POST['trainer_name'];
		$tran_class= $_POST['trainer_class'];
		$tran_contact= $_POST['trainer_contact'];

		//Validations
		if($tran_name==''){
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($tran_class=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($tran_contact=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}

		else{

			//Query For Inserting New Trainer Into Database.....
			$insert_tran = "insert into trainer(tran_name, tran_class,tran_contact) values('$tran_name','$tran_class','$tran_contact')";
			$run_tran = mysqli_query($con, $insert_tran);
			if ($run_tran) {
				echo "<script>alert('1 New Trainer Added Successfully')</script>";
				echo "<script>window.open('index.php?add_trainers','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>