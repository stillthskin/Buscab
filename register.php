<!DOCTYPE html>
<?php 
error_reporting(0);
session_start();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
</head>
<body>
<a href="index.php">~~ Home</a>
<div class="userform">
<h2>Register: </h2>
<form action="register.php" method="post">
	<input type="text" name="username" placeholder="username...">
	<input type="email" name="email" placeholder="Email...">
	<input type="text" name="phone" placeholder="Phone...">
	<input type="password" name="password" placeholder="Password...">
	<input type="password" name="password2" placeholder="Confirm Password...">
	<input type="submit" name="submit" value="Register">
	<br>
	<p>Already a customer? <a href="login.php">Login</a></p>
</form>
</div>

<?php 

if(isset($_POST['submit'])){
	include("mycon.php");
	$username = mysqli_real_escape_string($thecon,$_POST["username"]);
	$email = mysqli_real_escape_string($thecon,$_POST["email"]);
	$thephone = mysqli_real_escape_string($thecon,$_POST["phone"]);
	$phone = "+254".$phone;  
	$password1 = mysqli_real_escape_string($thecon,$_POST["password1"]);
	$password2 = mysqli_real_escape_string($thecon,$_POST["password2"]);
	
	if($password1 = $password2){
		
	echo("match");
	$password = md5($password1);//encrypt the password before saving in the database
 	$query = "INSERT INTO users(username, email,phone, password) VALUES('$username', '$email','$phone', '$password')";
 	//$query = "INSERT INTO users (username, email,phone, password) VALUES('still', 'kenda.dennis@yahoo.com', 'md5')";
  	if(mysqli_query($thecon, $query)){
  		echo("success");
  	}
  	else{
  		 echo "Error: " . $query . "<br>" . mysqli_error($thecon);
  	}

	}

	else {
		echo("Password Mismatch");
		
	}


}
?>
<?php 
echo("success");
?>
</body>
</html>
