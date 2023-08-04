<?php 

include ("includes/db.php");

if (isset($_GET['edit_tran'])) {
	$edit_tran_id=$_GET['edit_tran'];

	$sel_tran="SELECT * FROM trainer WHERE tran_id='$edit_tran_id'";
	$run_tran=mysqli_query($con, $sel_tran);
	$row_tran=mysqli_fetch_array($run_tran);
	$tran_up_id=$row_tran['tran_id'];
	$tran_name=$row_tran['tran_name'];
	$tran_class=$row_tran['tran_class'];
	$tran_contact=$row_tran['tran_contact'];
}

?>
<html>
<head>
	<title>MyGym | Update Trainers</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="" enctype="multipart/form-data">
		<table width="794px" align="center" border="1" bgcolor="#f1533e">
			<tr>
				<td colspan="2" align="center"><h1>Update or Edit Trainers</h1></td>
			</tr>
			<tr>
				<td align="right"><b>Name Of Trainer</b></td>
				<td><input type="text" name="trainer_name" value="<?php echo $tran_name; ?>"></td>
			</tr>
			<tr>
				<td align="right"><b>Class</b></td>
				<td>
					<select name="trainer_class">
						<option><?php echo $tran_class; ?></option>
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
				<td><input type="text" name="trainer_contact" value="<?php echo $tran_contact; ?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="update_trainer" value="Update Trainer"></td>
			</tr>
		</table>
	</form>
</body>
</html>


<?php 

	if (isset($_POST['update_trainer']))
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
			$update_tran = "UPDATE trainer SET tran_name='$tran_name',tran_class='$tran_class',tran_contact='$tran_contact' WHERE tran_id='$tran_up_id'";
			$run_update = mysqli_query($con, $update_tran);
			if ($run_update) {
				echo "<script>alert('Data Updated Successfully')</script>";
				echo "<script>window.open('index.php?view_trainers','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>