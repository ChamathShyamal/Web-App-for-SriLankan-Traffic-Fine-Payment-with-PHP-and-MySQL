<?php
include_once 'connection.php';
$output = '';
function input_data($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
if(isset($_POST["query1"]))
{
	$search = input_data($_POST["query1"]);
	$query = "
	SELECT * FROM fine	 
	WHERE Fine_Name LIKE '%".$search."%'";
}
else
{
	$query = "
	SELECT * FROM fine ORDER BY Fine_Id";
}
$result = mysqli_query($connection, $query);
if(mysqli_num_rows($result) > 0)
{
	
	$output .= '<div class="container-fluid">
			<div class="table-responsive">
					<center><table>
						<tr>
						<th>
						</th>
							
						</tr>';
						
	while($row = mysqli_fetch_array($result))
	{
		
		$output .= '
			<tr>
				<td style="border-collapse: collapse;"><a  style="color: black;" href="searchByFinesReport.php?Fine_Id='.$row['Fine_Id'].'">'.$row['Fine_Name'].'</a></td>
			</tr>
			
		';
		
	}
	 echo $output;
}
else
{
	?>
	<center>
	<?php
	echo 'Data Not Found';
}
?>
</center> 
</table>
</center>
</div>
</div
