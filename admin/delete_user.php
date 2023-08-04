<?php 

include ("includes/db.php");

	if (isset($_GET['delete_user'])) {
		$delete_id=$_GET['delete_user'];

		$delete_user="DELETE FROM users WHERE user_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_user);
		if ($run_delete) {
			echo "<script>alert('Deleted Successfully!')</script>";
			echo "<script>window.open('index.php?view_users','_self')</script>";
		}

	}

?>