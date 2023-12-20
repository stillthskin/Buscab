<?php 
error_reporting(E_ALL);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Kity Bus_Cab</title>
</head>
<body class="homebody">
<section class="top">
	<div class="navi">
		<ul>
			<li><a href="index.php">Logo</a></li>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="admin.php">@</a></li>
		</ul>
	</div>
<?php 
echo '<b class="success">welcome: </b>'. $_SESSION['login_user'];

?>
</section>
<section class="mid">

	<div class="leftmid">
		
	</div>
	<div class="rightmid">
		<h1>The Kenya Bus Service:</h1>
		<form action="index.php" method="post">
			<h3>Select Site to Check and Book:</h3>
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
			<input type="submit" id="popushow"name="submit" value="Book Bus">
		</form>
			<?php 
$meme = "memer";
if(isset($_POST['submit'])){
	include("mycon.php");
	$theorigin = $_POST['origin'];
	$origin = mysqli_real_escape_string($thecon,$_POST['origin']);
	$destination = mysqli_real_escape_string($thecon,$_POST['destination']);
	$thedate = mysqli_real_escape_string($thecon,$_POST['depaturedate']);
	$query = "SELECT * FROM buses WHERE origin= '$origin' and destination  = '$destination' and thedate = '$thedate'";
	//echo($query);
	$result = mysqli_query($thecon,$query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //$active = $row['active'];

    $count = mysqli_num_rows($result);
    echo "Busses found :".$count;

    if($count >= 1){
    	echo('<p class="success">Bus found: </p> ');
    	$busreg = $row['plate'];
    	echo '<b>Bus Registration: </b> ';
    	echo $busreg;
    	echo "<br>";
        if(isset($_SESSION['login_user'])){
        $username = $_SESSION['login_user'];
    	$account = $_SESSION['login_user'].$busreg;
    	$phone = $_SESSION['phone'];
    	$email = $_SESSION['email'];
    	$confirmed = 0;
    	
        echo "<p> To book use M-pesa Paybill <b>5555555</b> account </p><b>".$_SESSION['login_user'].$busreg;
    	echo "</b>";
    	echo "<br>";
    	$query = "INSERT INTO bookings (username,account, phone, email, confirmed) VALUES('$username', '$account', '$phone', '$email', '$confirmed')";
    	if(mysqli_query($thecon, $query)){
    		echo '<b class="success">User details Save successful please pay for confirmation.</b>';
    	}
    	else{
    		echo "Failed to save Booking Details".mysqli_error($thecon);
    	
        }
    }
        else{
        	echo("Please register or login to get booking Details.");
        }

    }
    else{
    	echo('<p class="error">No bus found with the details found: ');
    }
}
?>
	</div>

<!--
<div id="popupdiv">
 <button class="Closediv">X</button>

</div>
-->
</section>
<section class="bottom"></section>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>