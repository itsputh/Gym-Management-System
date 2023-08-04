<html>
<head>
	<title>MyGym | View Exercises</title>
<style type="text/css">
	table{
		background-color: darkgrey;
	}
	tr,th{
		border: 2px solid white;
	}
</style>
</head>
<body>
	<?php
		if(isset($_GET['view_exercises'])) { 
	?>
	<table align="center" width="794" style="color:white;">
		<tr align="center">
			<td colspan="6"><h2>View All Exercises</h2><br></td>
		</tr>
		<tr>
			<th>Exercise No</th>
			<th>Exercise Name</th>
			<th>Exercise Image</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php 
		$i=0;
			$sel_exer="SELECT * FROM exercises";
			$run_exer=mysqli_query($con, $sel_exer);
			while ($row_exer=mysqli_fetch_array($run_exer)) {
				$exer_id=$row_exer['exer_id'];
				$exer_name=$row_exer['exer_name'];
				$exer_img=$row_exer['exer_img'];

				$i++;
			
		?>
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $exer_name; ?></td>
			<td><img src="exercise_images/<?php echo $exer_img; ?>" width="60" height="44"></td>
			<td><a href="index.php?edit_exercise=<?php echo $exer_id; ?>">Edit</a></td>
			<td><a href="index.php?delete_exercise=<?php echo $exer_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
	<?php } ?>
</body>
</html>