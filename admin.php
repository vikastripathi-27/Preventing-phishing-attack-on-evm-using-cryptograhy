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
		<th scope="col" class="row">Voter id</th>
		<th scope="col" class="row">Key 1</th>
		<th scope="col" class="row">Key 2</th>
		<th scope="col" class="row">N</th>
		<th scope="col" class="row">E</th>
		<th scope="col" class="row">D</th>
		<th scope="col" class="row">Cipher val</th>
	</tr>

	<?php
	$no=0;	
	$select=mysqli_query($con,"SELECT * FROM `admin`");
	while($row=mysqli_fetch_array($select))
	{
		$no=$no+1;
	?>
	<tr>
		<td class="row"><?php echo $no; ?></td>
		<td class="row"><?php echo $row['v_id']; ?></td>
		<td class="row"><?php echo $row['key1']; ?></td>
		<td class="row"><?php echo $row['key2']; ?></td>
		<td class="row"><?php echo $row['v_n']; ?></td>
		<td class="row"><?php echo $row['v_e']; ?></td>
		<td class="row"><?php echo $row['v_d']; ?></td>
		<td class="row"><?php echo $row['v_cipher']; ?></td>
	</tr>
	<?php }?>
<table>

</body>
</html>