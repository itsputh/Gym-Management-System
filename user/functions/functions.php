<?php 
	$db=mysqli_connect("localhost","root","","mygym");

	//getdays function start
	function getDays(){
		global $db;
		$get_days="SELECT * FROM days";
		$run_days=mysqli_query($db, $get_days);
		while($row_days=mysqli_fetch_array($run_days)){
			$day_id=$row_days['day_id'];
			$day_name=$row_days['day_name'];
			echo "<li><a href='index.php?day=$day_id'>$day_name</a></li>";
		}
	}  //getdays function end


	//getExercises function start
	function getExercise(){
		global $db;
		$get_exer="SELECT * FROM exercises";
		$run_exer=mysqli_query($db, $get_exer);
		while($row_exer=mysqli_fetch_array($run_exer)){
			$exer_id=$row_exer['exer_id'];
			$exer_name=$row_exer['exer_name'];
			echo "<li><a href='index.php?exer=$exer_id'>$exer_name</a></li>";
		}
	}  //getExercises function end


	// get_Day_Exercises function start (Pick Workout according to specific Day)
	function get_Day_Exercises(){
		global $db;
		if(isset($_GET['day'])){

				$day_id=$_GET['day'];

				$get_exer="SELECT * FROM exercises WHERE day_id='$day_id'";
				$run_exer=mysqli_query($db, $get_exer);
				$count= mysqli_num_rows($run_exer);
				if($count==0){
					echo "<h3>No Workout Available or This Day</h3>";
				}
				while($row_exer=mysqli_fetch_array($run_exer)){
					$exer_id= $row_exer['exer_id'];
					$exer_name= $row_exer['exer_name'];
					$sets= $row_exer['sets'];
					$exer_img= $row_exer['exer_img'];

					echo "
						<div id='single_product'>
						<h2>$exer_name</h2>
						<img src='admin/exercise_images/$exer_img' width='300' height='221' /><br>
						<p><h3>$sets Sets</h3></p>
						</div>
					";
				}
		}	
	}  // get_Exer_day function end.....



	// get_Day_Exercises function start (Pick Workout according to specific Day)
	function get_Exer_Exercises(){
		global $db;
		if(isset($_GET['exer'])){

				$exer_id=$_GET['exer'];

				$get_exer_exer="SELECT * FROM exercises WHERE exer_id='$exer_id'";
				$run_exer_exer=mysqli_query($db, $get_exer_exer);
				$count= mysqli_num_rows($run_exer_exer);
				while($row_exer_exer=mysqli_fetch_array($run_exer_exer)){
					$exer_id= $row_exer_exer['exer_id'];
					$exer_name= $row_exer_exer['exer_name'];
					$exer_img= $row_exer_exer['exer_img'];

					echo "
						<div id='single_product'>
						<h2>$exer_name</h2>
						<img src='admin/exercise_images/$exer_img' width='300' height='221' /><br>
						</div>
					";
				}
		}	
	}  // get_Exer_Exercises function end.....


	// getPro function start
	function get_All_Exercises(){
		global $db;
		if(!isset($_GET['day'])){
			if(!isset($_GET['exer'])){

				$get_all_exer="SELECT * FROM exercises ORDER By rand() LIMIT 0,5";
				$run_all_exer=mysqli_query($db, $get_all_exer);
				while($row_all_exer=mysqli_fetch_array($run_all_exer)){
					$exer_id= $row_all_exer['exer_id'];
					$exer_name= $row_all_exer['exer_name'];
					$sets= $row_all_exer['sets'];
					$exer_img= $row_all_exer['exer_img'];
					
					echo "
						<div id='single_product'>
						<h2>$exer_name</h2>
						<img src='admin/exercise_images/$exer_img' width='200' height='147' /><br>
						<p><h3>$sets Sets</h3></p>
						</div>
					";
				}
			}
		}	
	}
	// getPro function end.....





 ?>