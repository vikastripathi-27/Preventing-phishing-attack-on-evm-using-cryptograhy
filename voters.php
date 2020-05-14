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
	<br><br><br>
	<table class="table table-dark" border="3">
		<tr>
			<th scope="col" class="row">Sr no</th>
			<th scope="col" class="row">First Name</th>
			<th scope="col" class="row">Last Name</th>
			<th scope="col" class="row">Date of birth</th>
			<th scope="col" class="row">Mobile no</th>
			<th scope="col" class="row">Email id</th>
			<th scope="col" class="row">Address</th>
			<th scope="col" class="row">City</th>
			<th scope="col" class="row">District</th>
			<th scope="col" class="row">State</th>
			<th scope="col" class="row">Country</th>
			<th scope="col" class="row">Aadhar no</th>
			<th scope="col" class="row">Pan no</th>
			<!-- <th scope="col" class="row">Aadhar card</th>
			<th scope="col" class="row">Pan card</th> -->
			<th scope="col" class="row">Photo</th>
		</tr>
		<?php
		$no=0;	
		$select=mysqli_query($con,"SELECT * FROM `voter_personal_details`");
		while($row=mysqli_fetch_array($select))
		{
			$no=$no+1;
		?>
		<tr>
			<td scope="col" class="row"><?php echo $no; ?></td>
			<td scope="col" class="row"><?php echo $row['v_fname']; ?></td>
			<td scope="col" class="row"><?php echo $row['v_lname']; ?></td>
			<td scope="col" class="row"><?php echo $row['v_dob']; ?></td>
			<td scope="col" class="row"><?php echo $row['v_mobile']; ?></td>
			<td scope="col" class="row"><?php echo $row['v_email']; ?></td>
			<td scope="col" class="row"><?php echo $row['v_address']; ?></td>
			<td scope="col" class="row"><?php echo $row['v_city']; ?></td>
			<td scope="col" class="row"><?php echo $row['v_district']; ?></td>
			<td scope="col" class="row"><?php echo $row['v_state']; ?></td>
			<td scope="col" class="row"><?php echo $row['v_country']; ?></td>
			<td scope="col" class="row"><?php echo $row['v_aadhar']; ?></td>
			<td scope="col" class="row"><?php echo $row['v_pan']; ?></td>
			<!-- <td scope="col" class="row"><img src="upload/<?php echo $row['upload_aadhar']; ?>" height="80" width="80"></td>
			<td scope="col" class="row"><img src="upload/<?php echo $row['upload_pan']; ?>" height="80" width="80"></td> -->
			<td scope="col" class="row"><img src="upload/<?php echo $row['v_photo']; ?>" height="80" width="80"></td>
		</tr>
		<?php }?>
	<table>

</body>
</html>