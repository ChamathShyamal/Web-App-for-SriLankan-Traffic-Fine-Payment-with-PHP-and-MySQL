<?php
include_once 'connection.php';
if (isset($_POST['btnupdate']))
	 {
	 	$fineid = $_POST['fid'];
	 	$fineName = $_POST['fname'];
	 	$fineAmount = $_POST['famount'];
		$query = "UPDATE fine SET Fine_Name= '$fineName', Fine_Amount= '$fineAmount' WHERE Fine_Id='$fineid'";
		$result= mysqli_query($connection, $query);
		if($result) 
		{
			echo "Fine Successfully updated";
		}
		else{
			echo "Fine Not updated";
		}



		// code...
	}


?>