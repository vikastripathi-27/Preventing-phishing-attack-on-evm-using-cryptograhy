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
		<h4>Personal Details</h4>
		<input type="text" class="form-control" name="fname" placeholder="enter the first name">
		<br><br>
		<input type="text" class="form-control" name="lname" placeholder="enter the last name">
		<br><br>
		<input type="text" class="form-control" name="dob" placeholder="enter the date of birth (dd-mm-yyyy)">
		<br><br>
		<input type="text" class="form-control" name="mobile" placeholder="enter the mobile no">
		<br><br>
		<input type="text" class="form-control" name="email" placeholder="enter the email id">
		<br><br>

		<h4>Address</h4>
		<textarea name="address" class="form-control" placeholder="enter the address" rows="6"></textarea>
		<br><br>
		<input type="text" class="form-control" name="city" placeholder="enter the city">
		<br><br>
		<input type="text" class="form-control" name="district" placeholder="enter the district">
		<br><br>
		<input type="text" class="form-control" name="state" placeholder="enter the state">
		<br><br>
		<input type="text" class="form-control" name="country" placeholder="enter the country">
		<br><br>

		<h4>Documents</h4>
		<input type="text" class="form-control" name="aadhar" placeholder="enter the aadhar no">
		<br><br>
		<input type="text" class="form-control" name="pan" placeholder="enter the pan no">
		<br><br>
		<p>Upload aadhar card</p>
		<input type="file" name="aadhar_up">
		<br><br>
		<p>Upload pan card</p>
		<input type="file" name="pan_up">
		<br><br>
		<p>Upload your photo</p>
		<input type="file" name="photo_up">
		<br><br>		
		<button type="submit" name="submit" class="btn btn-primary cand_reg">Register</button><br><br>
		</div>
	</form>
</body>
</html>

<?php
	if(isset($_POST['submit'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$dob = $_POST['dob'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$district = $_POST['district'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		$aadhar = $_POST['aadhar'];
		$pan = $_POST['pan'];

		$aadhar_up=$_FILES['aadhar_up']['name'];
		$tmp_name=$_FILES['aadhar_up']['tmp_name'];
		move_uploaded_file($tmp_name,"upload/".$aadhar_up);

		$pan_up=$_FILES['pan_up']['name'];
		$tmp_name=$_FILES['pan_up']['tmp_name'];
		move_uploaded_file($tmp_name,"upload/".$pan_up);

		$photo_up=$_FILES['photo_up']['name'];
		$tmp_name=$_FILES['photo_up']['tmp_name'];
		move_uploaded_file($tmp_name,"upload/".$photo_up);

		$insert = mysqli_query($con,"INSERT INTO `voter_personal_details` (`v_fname`,`v_lname`,`v_dob`,`v_mobile`,`v_email`,`v_address`,`v_city`,`v_district`,`v_state`,`v_country`,`v_aadhar`,`v_pan`,`upload_aadhar`,`upload_pan`,`v_photo`) VALUES ('$fname','$lname','$dob','$mobile','$email','$address','$city','$district','$state','$country','$aadhar','$pan','$aadhar_up','$pan_up','$photo_up')");

		if($insert) {
			echo "<h2 class='result'>Registration successful</h2>";

			$sql = mysqli_query($con,"SELECT * FROM `voter_personal_details` WHERE `v_aadhar`='$aadhar'");
			$row = mysqli_fetch_array($sql);
			$id = $row['v_id'];

			$insert2 = mysqli_query($con,"INSERT INTO `admin` (`v_id`,`key1`,`key2`,`v_n`,`v_e`,`v_d`,`v_cipher`) VALUES ('$id',0,0,0,0,0,0)");

		}
		else {
			echo "<script>alert('Registration failed')</script>";
		}

	}
?>