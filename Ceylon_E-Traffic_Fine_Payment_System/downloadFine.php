<?php 
include_once 'connection.php';
$offenderid = $_GET['Offender_ID'];
$query = "SELECT offenders.Offender_ID, offenders.Offender_NIC, offenders.First_Name, offenders.Last_Name, offenders.Street_Number, offenders.Street_Name, offenders.City, offenders.Vehicle_Number, offenders.Date_of_Offense, offenders.Due_Court_Date, offenders.Offender_Time, offenders.Place, license.License_No, license.Competent_to_drive, fine.Fine_Name, fine.Fine_Amount, officers.Officer_First_Name, officers.Officer_Last_Name
		FROM offenders
		LEFT JOIN license ON license.Offender_ID=offenders.Offender_ID
        LEFT JOIN fine ON offenders.Fine_Id = fine.Fine_Id
        LEFT JOIN officers ON offenders.Officer_ID = officers.Officer_ID
        WHERE offenders.Offender_ID={$offenderid}";

        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result)>0) { 
	while ($rows=mysqli_fetch_assoc($result)) {
		$NIC = $rows['Offender_NIC'];
		$licenseNo = $rows['License_No'];
		$offenceName = $rows['Fine_Name'];
		$fineAmount = $rows['Fine_Amount'];
		$offenderDateOfOffense = $rows['Date_of_Offense'];
		$offenderFName = $rows['First_Name'];
		$offenderLName = $rows['Last_Name'];
		$offenderStnum = $rows['Street_Number'];
		$offenderStName = $rows['Street_Name'];
		$offenderCity = $rows['City'];
		$vehicleNo = $rows['Vehicle_Number'];
		$Time = $rows['Offender_Time'];
		$place = $rows['Place'];
		$courtDate = $rows['Due_Court_Date'];
		$competent = $rows['Competent_to_drive'];
		$officerFName = $rows['Officer_First_Name'];
		$officerLName = $rows['Officer_Last_Name'];
 	}
}
else{
	echo "No records";
}

include_once ('pdf/fpdf.php');
$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> setfont("Arial", "B", "11");
$pdf -> setTextColor(252,3,3);
$pdf -> Cell(200,20,"CEYLON TRAFFIC PAYMENT SYSTEM","0","1","C");
$pdf->Ln(15);//Line break

// table colomn


//---------------------------------------------------------------------------------------------


$pdf->Cell(40, 5, 'License No', 0, 0);
$pdf->Cell(58, 5, ': '.$licenseNo.'', 0, 0);

$pdf->Cell(35, 5, 'Name of Offender', 0, 0);
$pdf->Cell(52, 5, ': '.$offenderFName.' '.$offenderLName.'', 0, 1);

$pdf->Cell(40, 10, 'Offender Address', 0, 0);
$pdf->Cell(52, 10, ': '.$offenderStnum.' '.$offenderStName.' '.$offenderCity.'', 0, 1);

$pdf->Cell(40, 10, 'Offender NIC', 0, 0);
$pdf->Cell(52, 10, ': '.$NIC.' ', 0, 1);


$pdf->Cell(40, 10, 'Vehicle Number', 0, 0);
$pdf->Cell(58, 10, ': '.$vehicleNo.'', 0, 0);

$pdf->Cell(40, 10, 'Place the Offence', 0, 0);
$pdf->Cell(58, 10, ': '.$place.'', 0, 1);


$pdf->Cell(40, 10, 'Name of the Offence', 0, 0);
$pdf->Cell(58, 10, ': '.$offenceName.'', 0, 0);
$pdf->Cell(40, 10, 'Amount', 0, 0);
$pdf->Cell(58, 10, ': '.$fineAmount.'', 0, 1);


$pdf->Cell(40, 10, 'Date of Offense', 0, 0);
$pdf->Cell(58, 10, ': '.$offenderDateOfOffense.'', 0, 0);

$pdf->Cell(40, 10, 'Time of Offense', 0, 0);
$pdf->Cell(58, 10, ': '.$Time.'', 0, 1);

$pdf->Cell(40, 10, 'Court due Date', 0, 0);
$pdf->Cell(58, 10, ': '.$courtDate.'', 0, 0);

$pdf->Cell(40, 10, 'Competent to Drive', 0, 0);
$pdf->Cell(58, 10, ': '.$competent.'', 0, 1);


$pdf->Cell(35, 10, 'Officer Name', 0, 0);
$pdf->Cell(52, 10, ': '.$officerFName.' '.$officerLName.'', 0, 1);


$pdf->Line(10,30, 200, 30);

$pdf->Ln(10);


$pdf->Line(10, 60, 200, 60);

$pdf->Ln(20);//Line break

$pdf -> Output();

?> 
