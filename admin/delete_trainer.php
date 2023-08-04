<?php 

include ("includes/db.php");

	if (isset($_GET['delete_tran'])) {
		$delete_id=$_GET['delete_tran'];

		$delete_tran="DELETE FROM trainer WHERE tran_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_tran);
		if ($run_delete) {
			echo "<script>alert('Deleted Successfully!')</script>";
			echo "<script>window.open('index.php?view_trainers','_self')</script>";
		}

	}

?>