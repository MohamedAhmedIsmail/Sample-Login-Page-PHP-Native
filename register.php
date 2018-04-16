<?php
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
		<center>
		<h2>Registration Form</h2>
		<img src="imgs/Avatar.png" class="avatar">
		</center>
	
	<form class="myform" action="register.php" method="post">
		<label><b>Fullname:</b></label><br>
		<input name="fullname" type="text" class="inputvalues" placeholder="Type your Fullname" required><br>
		<label><b>Gender:</b></label>
		<input type="radio" class="radiobtns" name="gender" value="male" checked required>Male
		<input type="radio" class="radiobtns" name="gender" value="female" required>Female<br>
		<label><b>Qualification:</b></label>
		<select class="qualification" name="qualification">
			<option value="BScit">BScit</option>
			<option value="BMS">BMS</option>
			<option value="BE.IT">BE.IT</option>
			<option value="MCA">MCA</option>
		</select><br>
		<label><b>Username:</b></label><br>
		<input name="username" type="text" class="inputvalues" placeholder="Type your username" required><br>
		<label><b>Password:</b></label><br>
		<input name="password" type="password" class="inputvalues" placeholder="Type your password" required><br>
		<label><b>Confirm Password:</b></label><br>
		<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm your password" required><br>
		<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"><br>
		<a href="index.php"><input type="button" id="back_btn" value="Back"></a>
	</form>
	<?php 
		if(isset($_POST['submit_btn']))
		{
			//echo '<script type="text/javascript"> alert("Sign Up Submit button clicked")</script>';
			$fullname=$_POST['fullname'];
			$gender=$_POST['gender'];
			$qualification=$_POST['qualification'];

			$username=$_POST['username'];
			$password=$_POST['password'];
			$cpassword=$_POST['cpassword'];
			if($password==$cpassword)
			{
				$query="select * from userinfotable WHERE username='$username'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					//There is a user with the same user name
					echo '<script type="text/javascript"> alert("Username Exist Try another Username")</script>';
				}
				else
				{
					$query="insert into userinfotable values('','$username','$fullname','$gender','$qualification','$password')";
					$query_run=mysqli_query($con,$query);
					if($query_run)
					{
						echo '<script type="text/javascript"> alert("User Registered Successfully... Go To Login Page")</script>';
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error!!")</script>';
					}
				}
			}
			else
			{
				echo '<script type="text/javascript"> alert("Password and confirm passowrd mismatch")</script>';
			}
		}
	?>

	</div>
</body>

</html>