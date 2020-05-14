<?php

include 'db_connection.php';
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Election Commission of India</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
</head>
<body>
	<div class="header">
		<h2>Election Commission of India</h2>
	</div>
	<div class="tab">
	  <button class="tablinks"><a href="index.php">Home</a></button>
	  <button class="tablinks"><a href="candidates.php">Candidates</a></button>
	  <button class="tablinks"><a href="candidates_register.php">Candidates register</a></button>
	  <button class="tablinks"><a href="voters.php">Voters</a></button>
	  <button class="tablinks"><a href="voters_register.php">Voters register</a></button>
	  <button class="tablinks"><a href="voting_screen1.php">Voting section</a></button>
	  <button class="tablinks"><a href="admin.php">Admin section</a></button>
	  <button class="tablinks"><a href="results.php">Results</a></button>
	</div>
	<h2 class="heading">Login/Signup</h2>
	<form method="POST">
		<div class="form-group form">
			<h4>Username</h4>
			<input type="text" class="form-control" name="username" placeholder="Enter your username">
			<br><br>
			<h4>Password</h4>
			<input type="text" class="form-control" name="password" placeholder="Enter your password">
			<br><br>		
			<button type="submit" class="btn btn-primary login" name="submit">Login</button><br><br>
			<button class="btn btn-primary register"><a href="voters_register.php" class="btn btn-primary">New user? Register...</a></button>
		</div>
	</form>

	<?php
		if(isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$sql = mysqli_query($con,"SELECT * FROM `voter_personal_details` WHERE `v_email`='$username'");
			$row=mysqli_fetch_array($sql);
			$user = $row['v_email'];
			$pass = $row['v_mobile'];
			$_SESSION['username'] = $user;
			if(($username==$user)&&($password==$pass)) {
				echo "<script>window.location.href='profile.php'</script>";
			}
			else {
				echo "<script>alert('Invalid credentials')</script>";
			}
		}
	?>

</body>
</html>