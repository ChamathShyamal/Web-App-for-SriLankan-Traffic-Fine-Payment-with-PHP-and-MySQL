<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ceylon E-Traffic Fine Payment System</title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
	<section>
	<div class="imgBx">
		<img src="home.jpg">
	</div>
	<div class="contentBx">
		<div class="formBx">
		<h2>Welcome To Login</h2>
			<form action="login.php" method="POST">
			<div class="inputBx">
				<span>Username</span>
				<input type="text" name="logUsername" required>
			</div>
			<div class="inputBx">
				<span>Password</span>
				<input type="password" name="logPassword" required>
			</div>
			<div class="checkBx">
				<span>Post</span>
					<select name="userType">
					  <option value="Admin">Admin</option>
					  <option value="Traffic OIC">Traffic OIC</option>
					  <option value="Traffic Police Officer">Traffic Police Officer</option>
					</select>
			</div>
			<br> 
			<div class="remember">
				<lable><input type="checkbox" name="">Remember Me</lable>
			</div>
			<div class="inputBx">
				<input type="submit" value="Login" name="btnLogin" >
			</div>
			</form>
		</div>
		</div>
	</section>
</body>
</html>
<?php
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 365);
ini_set('session.gc-maxlifetime', 60 * 60 * 24 * 365);
session_start();
include_once 'connection.php';


if (isset($_POST['btnLogin'])) {
	$userName = $_POST['logUsername'];
	$password= $_POST['logPassword'];
	$userType = $_POST['userType'];

	if ($userType=="Admin") {
		if ($userName=="Admin" && $password=="admin") {
			header('Location: addFine.php');
		}
		else{
			echo '<script>alert("Admin Username or Password is incorrect")</script>';
		}
		
	}
	else{

	$query = "SELECT * FROM officers WHERE Username='$userName' and Password = '$password' and Post='$userType'";
	$result = mysqli_query($connection, $query);
	if (mysqli_num_rows($result)>0)
	 {
	 	while ($row = mysqli_fetch_assoc($result)) {
	 		if ($row['Post'] == "Traffic OIC") {
	 			$_SESSION['loginOIC'] = $row['Username'];
	 			header('Location:  aboutUsOIC.php');
	 		}

	 		if ($row['Post'] == "Traffic Police Officer") {
	 			$_SESSION['loginOfficer'] = $row['Username'];
	 			header("Location: offenderRegistration.php");
	 		}
	 	}
	}
	else{
		echo '<script>alert("Username or Password or User Type is incorrect")</script>';
	}
}
}
?>
