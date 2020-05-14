<?php

include 'db_connection.php';
session_start();

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
	<?php
		$username = $_SESSION['username'];
		$sql = mysqli_query($con,"SELECT * FROM `voter_personal_details` WHERE `v_email`='$username'");
		$row = mysqli_fetch_array($sql);
	?>
	<h2 class="heading">My Profile</h2>
	<br>
	<img class="img" src="upload/<?php echo $row['v_photo']; ?>" height="170" width="170">
	<br><br>
	<h3 class="det_heading">Personal details</h3>
	<h4 class="details">Voter id : <?php echo $row['v_id'];?></h4>
	<h4 class="details">Name : <?php echo $row['v_fname']." ".$row['v_lname'];?> </h4>
	<h4 class="details">Date of birth : <?php echo $row['v_dob'];?></h4> 
	<h4 class="details">Mobile no : <?php echo $row['v_mobile'];?></h4>
	<h4 class="details">Email id : <?php echo $row['v_email'];?></h4>

	<h3 class="det_heading">Address</h3>
	<h4 class="details">Address : <?php echo $row['v_address'];?></h4>
	<h4 class="details">City : <?php echo $row['v_city'];?></h4>
	<h4 class="details">District : <?php echo $row['v_district'];?></h4>
	<h4 class="details">State : <?php echo $row['v_state'];?></h4>
	<h4 class="details">Country : <?php echo $row['v_country'];?></h4>

	<h3 class="det_heading">Documents</h3>
	<h4 class="details">Aadhar no : <?php echo $row['v_aadhar'];?></h4>
	<img class="img2" src="upload/<?php echo $row['upload_aadhar']; ?>">
	<br><br>
	<h4 class="details">Pan no : <?php echo $row['v_pan'];?></h4>
	<img class="img2" src="upload/<?php echo $row['upload_pan']; ?>">
	<br><br>
</body>
</html>