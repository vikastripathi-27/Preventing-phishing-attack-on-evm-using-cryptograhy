<!-- rsa calculation -->

<?php
include 'db_connection.php';
session_start();

$user_id = $_SESSION['id'];  //voter id
$id = $_GET['id'];  //candidate id for which vote was casted

//for candidate
$sql = mysqli_query($con,"SELECT * FROM `candidate` WHERE `c_id`=$id");
$row = mysqli_fetch_array($sql);

$plain_val = $row['c_plain_value'];

//for voter
$sql2 = mysqli_query($con,"SELECT * FROM `admin` WHERE `v_id`=$user_id");
$row2 = mysqli_fetch_array($sql2);

$key1 = $row2['key1'];
$key2 = $row2['key2'];


//rsa calculation
$a1 = $key1[0];
$a2 = $key1[1];
$a3 = $key1[2];
$a4 = $key1[3];
$a5 = $key1[4];
$a6 = $key1[5];

$a = $a4;  //taking random value as a
if($a%2==0) {
	$a = $a+1;
}

$b1 = $key2[0];
$b2 = $key2[1];
$b3 = $key2[2];
$b4 = $key2[3];
$b5 = $key2[4];
$b6 = $key2[5];

$b = $b2;  //taking random value as b
if($b%2==0) {
	$b=$b+1;
	if($b==$a) {
		$b=$b+2;
	}
}


$n = $a*$b;
$ph_n = ($a-1)*($b-1);

$e =5;
if(($a==6) or ($b==6)) {
	$e = 7;
}

for($i=1;$i<$n;$i++) {
	$temp = ($ph_n*$i+1)/$e;
	$t=containsDecimal($temp);
	if($t==0) {
		$d = $temp;
		break;
	}
}

//cipher text
$temp = pow($plain_val,$e);
$c = $temp%$n;
$_SESSION['cipher'] = $c;

//plain text
$temp2 = $c**$d;
$p = $temp2%$n;

//function for checking whether decimal or not
function containsDecimal( $temp ) {
    if ( strpos( $temp, "." ) !== false ) {
        return 1;  //is decimal
    }
    return 0;
}

$sql3 = mysqli_query($con,"UPDATE `admin` SET `v_n`='$n',`v_e`='$e',`v_d`='$d',`v_cipher`='$c' WHERE `v_id`='$user_id'");

$sql4 = mysqli_query($con,"SELECT * FROM `candidate` WHERE `c_plain_value` = '$p'");
$row = mysqli_fetch_array($sql4);
$total = $row['c_total_votes'];
$total = $total + 1;

$sql5 = mysqli_query($con,"UPDATE `candidate` SET `c_total_votes`='$total' WHERE `c_plain_value`='$p'");

echo "<script>window.location.href='exit.php'</script>";
?>


<!-- There is a bug while calculating the pow value because sometimes it returns a value in exponential form which cannot be calculated further hence then it will not work.
Working on a way to solve this issue -->