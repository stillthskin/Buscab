<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
<a href="index.php">~~ Home</a>
<div class="userform">
<form action="admin.php" method="post">
			<h3>Select Site to check availability:</h3>
			<label>Origin: </label><br>
			<select name="origin">
				<option>Mombasa</option>
				<option>Nairobi</option>
				<option>Nakuru</option>
				<option>Kitale</option>
			</select>
			<label>Destination: </label><br>
			<select name="destination">
				<option>Kitale</option>
				<option>Nakuru</option>
				<option>Nairobi</option>
				<option>Mombasa</option>
			</select>
			<input type="date" name="depaturedate"><br>
			<input type="text" name="lplate" placeholder="Registation Number...">
			<input type="submit" name="submit" value="Add Bus">
		</form>
		<form action="confirm.php" method="post">
			<input type="text" name="ticket" placeholder="Ticket Nunumber...">
			<input type="submit" name="submit" value="Confirm">
		</form>
	</div>
</section>
<section class="bottom"></section>
<?php 
$meme = "memer";
include("mycon.php");
if(isset($_POST['submit'])){
	$origin = mysqli_real_escape_string($thecon,$_POST['origin']);
	$destination = mysqli_real_escape_string($thecon,$_POST['destination']);
	$thedate = mysqli_real_escape_string($thecon,$_POST['depaturedate']);
	$lplate = mysqli_real_escape_string($thecon,$_POST['lplate']);
	$seats = 60;
  	$query = "INSERT INTO buses (origin, destination, thedate, plate, seats) VALUES('$origin', '$destination', '$thedate','$lplate', '$seats')";
  	if(mysqli_query($thecon, $query)){
  		echo("success");
  	}
  	else{
  		 echo("********SEE**********");
  		 echo "Error: " . $query . "<br>" . mysqli_error($thecon);
  	}
  	echo "HERE";
	}
?>

</body>
</html>