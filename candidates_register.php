<?php

include 'db_connection.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<h2 class="heading">Register</h2>
	<br>
	<form method="POST" enctype="multipart/form-data">
		<div class="form-group form">
			<input type="text" class="form-control" name="fname" placeholder="enter the first name">
			<br><br>
			<input type="text" class="form-control" name="lname" placeholder="enter the last name">
			<br><br>
			<p>Upload your photo</p>
			<input type="file" name="photo_up">
			<br><br>
			<input type="text" class="form-control" name="party_name" placeholder="enter the party name">
			<br><br>
			<p>Upload your party symbol</p>
			<input type="file" name="symbol_up">
			<br><br>	
			<button type="submit" name="submit" class="cand_reg btn btn-primary">Register</button><br><br>
		</div>
	</form>

</body>
</html>


<?php
	if(isset($_POST['submit'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$party_name = $_POST['party_name'];

		$photo_up=$_FILES['photo_up']['name'];
		$tmp_name=$_FILES['photo_up']['tmp_name'];
		move_uploaded_file($tmp_name,"upload/".$photo_up);

		$symbol_up=$_FILES['symbol_up']['name'];
		$tmp_name=$_FILES['symbol_up']['tmp_name'];
		move_uploaded_file($tmp_name,"upload/".$symbol_up);

		$insert = mysqli_query($con,"INSERT INTO `candidate` (`c_fname`,`c_lname`,`c_photo`,`c_party_name`,`c_party_symbol`,`c_plain_value`,`c_total_votes`) VALUES ('$fname','$lname','$photo_up','$party_name','$symbol_up',45,0)");

		if($insert) {
			echo "<h2 class='result'>Registration successful</h2>";
		}
		else {
			echo "<script>alert('Registration failed')</script>";
		}

	}
?>