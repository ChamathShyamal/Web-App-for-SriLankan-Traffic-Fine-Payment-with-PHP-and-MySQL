<?php
include_once ('pdf/fpdf.php');
include_once 'connection.php';
$fineid = $_GET['Fine_Id'];

$query = "SELECT DISTINCT offenders.Offender_NIC, offenders.Fine_Id, fine.Fine_Name FROM offenders LEFT JOIN fine ON offenders.Fine_Id = fine.Fine_Id WHERE fine.Fine_Id='$fineid'";
$result = mysqli_query($connection, $query);
$NoOfOffenders =mysqli_num_rows($result);
if (mysqli_num_rows($result)>0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$fineName = $row['Fine_Name'];
	}
	
$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> setfont("Arial", "B", "13");
$pdf -> setTextColor(252,3,3);
$pdf -> Cell(200,20,"CEYLON TRAFFIC PAYMENT SYSTEM REPORT GENERATION FOR : ".$fineName." ","0","1","C");
$pdf->Ln(15);//Line break
$pdf->Line(10,30, 200, 30);
$pdf -> setfont("Arial", "B", "11");
//---------------------------------------------------------------------------------------------


$pdf->Cell(35, 5, 'Offence Name', 0, 0);
$pdf->Cell(85, 5, ': '.$fineName.'', 0, 0);


$pdf->Cell(40, 5, 'No of Offenders', 0, 0);
$pdf->Cell(58, 5, ': '.$NoOfOffenders.'', 0, 1);
$pdf -> setTextColor(0,0,0);
	$pdf->Cell(55, 10, '                               ----------------------------------------------------------------------------------------------', 0, 1);	
//--------------------------------------------------------------------------------------------------
		
$pdf -> Output();

}
else{
	
$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> setfont("Arial", "B", "13");
$pdf -> setTextColor(252,3,3);
$pdf -> Cell(200,20,"CEYLON TRAFFIC PAYMENT SYSTEM REPORT GENERATION","0","1","C");
$pdf->Ln(15);//Line break
$pdf->Line(10,30, 200, 30);
$pdf -> setfont("Arial", "B", "11");
//---------------------------------------------------------------------------------------------

$pdf->Cell(40, 5, 'No of Offenders', 0, 0);
$pdf->Cell(58, 5, ': '.$NoOfOffenders.'', 0, 1);
$pdf -> setTextColor(0,0,0);
	$pdf->Cell(55, 10, '                               ----------------------------------------------------------------------------------------------', 0, 1);	
//--------------------------------------------------------------------------------------------------
		
$pdf -> Output();
	
}

?>