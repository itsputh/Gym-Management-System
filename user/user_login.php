<?php 
	@session_start();
	include ("includes/db.php");

?>
<div>
	
	<form action="login.php" method="post"><br>

		<table width="400" bgcolor="#66CCCC" align="center">
			<tr><td colspan="2" align="center"><h2>Login or Register</h2></td></tr>
			<tr></tr>
			<tr>
				<td><b>Email</b></td>
				<td><input type="text" name="user_email" placeholder="Enter Your Email" /></td>
			</tr>
			<tr>
				<td><b>Password</b></td>
				<td><input type="password" name="user_pass" placeholder="*****" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><a href="forgot_pass.php">Forgot Password?</a></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="user_login" value="Login" style="width:7em;  height:2em;"/></td>
			</tr>
		</table>

	</form>

</div>

<?php 
	if (isset($_POST['user_login'])) {
		$user_email=$_POST['user_email'];
		$user_pass=$_POST['user_pass'];
		$sel_user="SELECT * FROM users WHERE user_email='$user_email' AND user_pass='$user_pass'";
		$run_user=mysqli_query($con, $sel_user);
		$check_user=mysqli_num_rows($run_user);
		
		
		
	}
?>
