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
	$query = "SELECT DISTINCT Place FROM offenders WHERE Place LIKE '%".$search."%'";
}
else{
	$query = "SELECT DISTINCT Place FROM offenders";

}
$result = mysqli_query($connection, $query);
if(mysqli_num_rows($result)>0)
{
	while($row = mysqli_fetch_array($result))
	{
		?>
			<center><a style="color: black;" href="searchByLocationsReport.php?Location=<?php echo $row["Place"];?>"> <?php echo $row["Place"] ?><br></a></center>
			<?php
		
	}
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
