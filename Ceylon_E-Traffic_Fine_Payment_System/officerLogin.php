<?php
session_start();
include_once 'connection.php';


if (isset($_POST['btnLogin'])) {
	$userName = $_POST['logUsername'];
	$password= $_POST['logPassword'];
	$userType = $_POST['userType'];

	$query = "SELECT * FROM officers WHERE Username='$userName' and Password = '$password' and Post='$userType'";
	$result = mysqli_query($connection, $query);
	if (mysqli_num_rows($result)>0)
	 {
	 	while ($row = mysqli_fetch_assoc($result)) {
	 		if ($row['Post'] == "Traffic OIC") {
	 			$_SESSION['loginOIC'] = $row['Username'];
	 			header('Location: OIC menu.php');
	 		}
	 		else{
	 			$_SESSION['loginOfficer'] = $row['Username'];
	 			header("Location: offenderRegistration.php");
	 		}
	 	}
	}
	else{
		echo '<script>alert("Username or Password is incorrect")</script>';
		
	}
}
?>
