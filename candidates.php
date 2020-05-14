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
			<th scope="col" class="row">Photo</th>
			<th scope="col" class="row">Party name</th>
			<th scope="col" class="row">Party symbol</th>
		</tr>
		<?php
		$no=0;	
		$select=mysqli_query($con,"SELECT * FROM `candidate`");
		while($row=mysqli_fetch_array($select))
		{
			$no=$no+1;
		?>
		<tr>
			<td scope="col" class="row"><?php echo $no; ?></td>
			<td scope="col" class="row"><?php echo $row['c_fname']; ?></td>
			<td scope="col" class="row"><?php echo $row['c_lname']; ?></td>
			<td scope="col" class="row"><img src="upload/<?php echo $row['c_photo']; ?>" height="80" width="80"></td>
			<td scope="col" class="row"><?php echo $row['c_party_name']; ?></td>
			<td scope="col" class="row"><img src="upload/<?php echo $row['c_party_symbol']; ?>" height="80" width="80"></td>
		</tr>
		<?php }?>
	<table>

</body>
</html>