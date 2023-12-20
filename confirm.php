
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Confirm</title>
</head>
<body>
<?php 
include('mycon.php');
if (isset($_POST['submit'])) {
	echo('success');
	$account = mysqli_real_escape_string($thecon, $_POST['ticket']);
	$query = "UPDATE bookings SET confirmed = 1 WHERE account = '$account'";
	if(mysqli_query($thecon,$query)){
		echo ' <b class="success"> Updated successfull</b>';
	}
	else{
		echo 'failed to update user not found'. mysqli_error($thecon);
	}
}

?>
</body>
</html>