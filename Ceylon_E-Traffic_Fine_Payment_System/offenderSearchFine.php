<?php
include_once 'connection.php';
if (isset($_POST['btnsearch']))
 {
 	$input = $_POST['search'];

$q = "SELECT offenders.Offender_ID, offenders.Offender_NIC, offenders.First_Name, offenders.Last_Name, offenders.Street_Number, offenders.Street_Name, offenders.City, offenders.Vehicle_Number, offenders.Date_of_Offense, offenders.Due_Court_Date, offenders.Offender_Time, offenders.Place, license.License_No, license.Competent_to_drive, fine.Fine_Name, fine.Fine_Amount, officers.Officer_First_Name
		FROM offenders
		LEFT JOIN license ON license.Offender_ID=offenders.Offender_ID
        LEFT JOIN fine ON offenders.Fine_Id = fine.Fine_Id
        LEFT JOIN officers ON offenders.Officer_ID = officers.Officer_ID
        WHERE offenders.Offender_NIC='$input'";

$result = mysqli_query($connection, $q);
if(mysqli_num_rows($result)>0)
{

	?>
	<div class="table-responsive">
	 <table class="table table bordered">
		<tr>
			<th>Offender_NIC</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Street Number</th>
			<th>Street Name</th>
			<th>City</th>
			<th>License Number</th>
			<th>Vehicle Number</th>
			<th>Date Of Offense</th>
			<th>Due Court Date</th>
			<th>Time</th>
			<th>Place</th>
			<th>Name of the Offense</th>
			<th>Offence Amount</th>
			<th>Competent to Drive</th>
			<th>Officer Name</th>
			<th>.........</th>
			<th>..........</th>
		</tr>
	<?php 
	while ($row=mysqli_fetch_assoc($result))
	 {	

	?>
	
		<tr>
		<td><?php echo $row['Offender_NIC'] ?></td>
		<td><?php echo $row['First_Name'] ?></td>
		<td><?php echo $row['Last_Name'] ?></td>
		<td><?php echo $row['Street_Number'] ?></td>
		<td><?php echo $row['Street_Name'] ?></td>
		<td><?php echo $row['City'] ?></td>
		<td><?php echo $row['License_No'] ?></td>
		<td><?php echo $row['Vehicle_Number'] ?></td>
		<td><?php echo $row['Date_of_Offense'] ?></td>
		<td><?php echo $row['Due_Court_Date'] ?></td>
		<td><?php echo $row['Offender_Time'] ?></td>
		<td><?php echo $row['Place'] ?></td>
		<td><?php echo $row['Fine_Name'] ?></td>
		<td><?php echo $row['Fine_Amount'] ?></td>
		<td><?php echo $row['Competent_to_drive'] ?></td>
		<td>
		 <?php echo $row['Officer_First_Name'] ?></td>
		<td><a href="downloadFine.php?Offender_ID='<?php echo $row['Offender_ID']; ?>'">Download</a></td>
		<td>
			<?php
			$offenderid = $row['Offender_ID'];
			$q = "SELECT Offender_ID FROM payments WHERE Offender_ID={$offenderid}";
			$result2 = mysqli_query($connection, $q);
			if (mysqli_num_rows($result2)) {
				while ($row2 = mysqli_fetch_assoc($result2)) {
					$paymentOffenderid = $row2['Offender_ID'];

				}
			}
			error_reporting(0);
			if ($paymentOffenderid!=$offenderid) {
				?>
				<a href="paymentMenu.php?Offender_ID=<?php echo $row['Offender_ID']; ?>">Pay</a>
				<?php
			}
			else{
				?>
				<a href="Paymentdownload.php?Offender_ID=<?php echo $row['Offender_ID'];?>">Print</a>
				<?php
			}
			?>
		</td>
	</tr>
	 
	

<?php
}
}
else{
	echo "Data not Found";
}
}

?>
</table>
</div>