<?php
include_once 'connection.php';
$output = '';
function input_data($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
if(isset($_POST["query"]))
{
	
	$search = input_data($_POST["query"]);
	$q = " 
	SELECT offenders.Offender_ID, offenders.Offender_NIC, offenders.First_Name, offenders.Last_Name, offenders.Street_Number, offenders.Street_Name, offenders.City, offenders.Email, offenders.Vehicle_Number, offenders.Date_of_Offense, offenders.Due_Court_Date, offenders.Offender_Time, offenders.Place, license.License_No, license.Competent_to_drive, fine.Fine_Name, officers.Officer_First_Name
		FROM offenders
		LEFT JOIN license ON license.Offender_ID=offenders.Offender_ID
        LEFT JOIN fine ON offenders.Fine_Id = fine.Fine_Id
        LEFT JOIN officers ON offenders.Officer_ID = officers.Officer_ID
        WHERE offenders.Offender_ID LIKE '%".$search."%'
	OR offenders.Offender_NIC LIKE '%".$search."%'
	OR offenders.First_Name LIKE '%".$search."%' 
	OR offenders.Last_Name LIKE '%".$search."%' 
	OR offenders.Street_Number LIKE '%".$search."%' 
	OR offenders.Street_Name LIKE '%".$search."%'
	OR offenders.City LIKE '%".$search."%'
	OR offenders.Email LIKE '%".$search."%'
	OR offenders.Vehicle_Number LIKE '%".$search."%'
	OR offenders.Date_of_Offense LIKE '%".$search."%'
	OR offenders.Due_Court_Date LIKE '%".$search."%'
	OR offenders.Offender_Time LIKE '%".$search."%'
	OR offenders.Place LIKE '%".$search."%'
	OR license.License_No LIKE '%".$search."%'
	OR license.Competent_to_drive LIKE '%".$search."%'
	OR fine.Fine_Name LIKE '%".$search."%'
	OR officers.Officer_First_Name LIKE '%".$search."%'
	";
}
else
{
	$q = "
	SELECT offenders.Offender_ID, offenders.Offender_NIC, offenders.First_Name, offenders.Last_Name, offenders.Street_Number, offenders.Street_Name, offenders.City, offenders.Email, offenders.Vehicle_Number, offenders.Date_of_Offense, offenders.Due_Court_Date, offenders.Offender_Time, offenders.Place, license.License_No, license.Competent_to_drive, fine.Fine_Name, officers.Officer_First_Name, officers.Officer_Last_Name
		FROM offenders
		LEFT JOIN license ON license.Offender_ID=offenders.Offender_ID
        LEFT JOIN fine ON offenders.Fine_Id = fine.Fine_Id
        LEFT JOIN officers ON offenders.Officer_ID = officers.Officer_ID
        ORDER BY offenders.Offender_ID 
        ";
}
$result = mysqli_query($connection, $q);
if(mysqli_num_rows($result)>0)
{
	
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Offender ID</th>
							<th>Offender NIC</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Street Number</th>
							<th>Street Name</th>
							<th>City</th>
							<th>Email</th>
							<th>License Number</th>
							<th>Vehicle Number</th>
							<th>Date of Offense</th>
							<th>Due Court Date</th>
							<th>Offense Time</th>
							<th>Place</th>
							<th>Fine Name</th>
							<th>Competent to Drive</th>
							<th>Officer Name</th>
						</tr>';
						
	while($row = mysqli_fetch_array($result))
	{
		
		$output .= '
			<tr>
				<td>'.$row["Offender_ID"].'</td>
				<td>'.$row["Offender_NIC"].'</td>
				<td>'.$row["First_Name"].'</td>
				<td>'.$row["Last_Name"].'</td>
				<td>'.$row["Street_Number"].'</td>
				<td>'.$row["Street_Name"].'</td>
				<td>'.$row["City"].'</td>
				<td>'.$row["Email"].'</td>
				<td>'.$row["License_No"].'</td>
				<td>'.$row["Vehicle_Number"].'</td>
				<td>'.$row["Date_of_Offense"].'</td>
				<td>'.$row["Due_Court_Date"].'</td>
				<td>'.$row["Offender_Time"].'</td>
				<td>'.$row["Place"].'</td>
				<td>'.$row["Fine_Name"].'</td>
				<td>'.$row["Competent_to_drive"].'</td>
				<td>'.$row["Officer_First_Name"].'</td>
				
				
			</tr>
		';
		
	}
	 echo $output;
}
else
{
	echo 'Data Not Found';
}
?> 
</table>