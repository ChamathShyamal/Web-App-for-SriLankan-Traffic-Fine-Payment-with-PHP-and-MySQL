<?php
include_once 'connection.php';
$offenderid = $_GET['Offender_ID'];
$query = "SELECT offenders.Offender_ID, offenders.Offender_NIC, offenders.First_Name, offenders.Last_Name, offenders.Vehicle_Number, payments.Payment_ID, payments.Amount, fine.Fine_Name, license.License_No
		FROM offenders
		LEFT JOIN license ON license.Offender_ID=offenders.Offender_ID
        LEFT JOIN fine ON offenders.Fine_Id = fine.Fine_Id
        LEFT JOIN payments ON offenders.Offender_ID = payments.Offender_ID
        WHERE offenders.Offender_ID={$offenderid}";

        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result)>0) { 
	while ($rows=mysqli_fetch_assoc($result)) {
		$paymentId = $rows['Payment_ID'];
		$NIC = $rows['Offender_NIC'];
		$offenderFName = $rows['First_Name'];
		$offenderLName = $rows['Last_Name'];
		$licenseNo = $rows['License_No'];
		$offenceName = $rows['Fine_Name'];
		$vehicleNo = $rows['Vehicle_Number'];
		$paidAmount = $rows['Amount'];
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
$pdf -> Cell(200,20,"CEYLON TRAFFIC PAYMENT SYSTEM 172 PAYMENT RECEIPT","0","1","C");
$pdf->Ln(15);//Line break

// table colomn


//---------------------------------------------------------------------------------------------


$pdf->Cell(40, 5, 'Payment ID', 0, 0);
$pdf->Cell(58, 5, ': '.$paymentId.'', 0, 0);

$pdf->Cell(35, 5, 'Offender NIC', 0, 0);
$pdf->Cell(52, 5, ': '.$NIC.'', 0, 1);

$pdf->Cell(40, 10, 'Offender Name', 0, 0);
$pdf->Cell(55, 10, ': '.$offenderFName.' '.$offenderLName.'', 0, 0);

$pdf->Cell(40, 10, 'Offender license No', 0, 0);
$pdf->Cell(52, 10, ': '.$licenseNo.' ', 0, 1);


$pdf->Cell(40, 10, 'Vehicle Number', 0, 0);
$pdf->Cell(58, 10, ': '.$vehicleNo.'', 0, 0);


$pdf->Cell(40, 10, 'Name of the Offence', 0, 0);
$pdf->Cell(58, 10, ': '.$offenceName.'', 0, 1);
$pdf->Cell(40, 10, 'Amount', 0, 0);
$pdf->Cell(58, 10, ': '.$paidAmount.'', 0, 1);


$pdf->Line(10,30, 200, 30);

$pdf->Ln(10);

$pdf->Ln(20);//Line break

$pdf -> Output();

?>