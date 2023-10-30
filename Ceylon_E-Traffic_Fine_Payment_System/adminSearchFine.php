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
	$query = "
	SELECT * FROM fine	 
	WHERE Fine_Id LIKE '%".$search."%'
	OR Fine_Name LIKE '%".$search."%' 
	OR Fine_Amount LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM fine ORDER BY Fine_Id";
}
$result = mysqli_query($connection, $query);
if(mysqli_num_rows($result) > 0)
{
	
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Fine ID</th>
							<th>Fine Name</th>
							<th>Amount</th>
							<th>Update</th>
						</tr>';
						
	while($row = mysqli_fetch_array($result))
	{
		
		$output .= '
			<tr>
				<td>'.$row['Fine_Id'].'</td>
				<td>'.$row['Fine_Name'].'</td>
				<td>'.$row['Fine_Amount'].'</td>
				<td><a href="updateFine.php?Fine_Id='.$row['Fine_Id'].'">Update</a></td>
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
