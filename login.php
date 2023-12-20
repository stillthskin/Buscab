<?php 
error_reporting(0);
session_start();
?>
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
<h2>Login: </h2>
<form action="login.php" method="post"> 
	<input type="text" name="username" placeholder="username...">
	<input type="password" name="password" placeholder="Password...">
	<input type="submit" name="submit" value="Login">
	<br>
	<p>Not our customer? <a href="register.php">Register</a></p>
</form>
</div>
<?php 
include("mycon.php");
if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($thecon,$_POST["username"]);
	$password = mysqli_real_escape_string($thecon,$_POST["password"]);
	$password = md5($password);
	//echo $password;
	  $query = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
	  $result = mysqli_query($thecon,$query);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
       echo($count);
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
      	echo '<p class="success">Login succesful</p>';
         //session_register("username");
         $_SESSION['login_user'] = $username;
         $_SESSION['email'] = $row['email'];
         $_SESSION['phone'] = $row['phone'];

         if(isset($_SESSION['login_user'])){
         if (headers_sent()) {
    die('Redirect failed. Please click on this link: <a href="index.php">Home</a');
}
else{
    exit(header("Location: index.php"));
}
          }
          else{
          	echo "error seting session";
          }
      }else {
         $error = "Your Login Name or Password is invalid";
      }
}
?>
</body>
</html>