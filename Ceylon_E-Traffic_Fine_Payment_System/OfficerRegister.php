<?php 
include 'connection.php';

function input_data($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    	$officerPoliceId = input_data($_POST['officerPoliceId']);
		$officerPoliceStation= input_data($_POST['officerPoliceStation']);	
		$officerFirstName= input_data($_POST['officerFirstName']);
		$officerLastName= input_data($_POST['officerLastName']);
		$officerUsername= input_data($_POST['officerUsername']);
		$officerPassword = input_data($_POST['officerPassword']);
		$officerTimeOfWork = input_data($_POST['officerTimeOfWork']);
		$officerTelephone = input_data($_POST['officerTelephone']);
		$officerEmail = input_data($_POST['officerEmail']);
		$officerGender = input_data($_POST['officerGender']);
		$officerPost = input_data($_POST['officerPost']);

		$query = "INSERT INTO officers VALUES ('$officerPoliceId','$officerPoliceStation','$officerFirstName','$officerLastName','$officerUsername','$officerPassword','$officerTimeOfWork','$officerTelephone','$officerEmail','$officerGender','$officerPost')";

		$result = mysqli_query($connection, $query);
		if ($result)
		 {
		 	echo "Officer Added Successfully";
			// code...
		}
		else{
			echo "Failed to add officer";
		}
    

?>