<?php

include_once 'connection.php';
$location = $_GET['Location'];

$query = "SELECT * FROM offenders WHERE Place='$location'";
$result = mysqli_query($connection, $query);
$NoofOffences =mysqli_num_rows($result);
if (mysqli_num_rows($result)>0) {

	$result1 = mysqli_query($connection, "SELECT DISTINCT Offender_NIC FROM offenders WHERE Place='$location'");
	$NoOfOffenders = mysqli_num_rows($result1);

}




include_once ('pdf/fpdf.php');
$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> setfont("Arial", "B", "13");
$pdf -> setTextColor(252,3,3);
$pdf -> Cell(200,20,"CEYLON TRAFFIC PAYMENT SYSTEM REPORT GENERATION FOR : ".$location." ","0","1","C");
$pdf->Ln(15);//Line break
$pdf->Line(10,30, 200, 30);
$pdf -> setfont("Arial", "B", "11");
//---------------------------------------------------------------------------------------------


$pdf->Cell(35, 5, 'Location', 0, 0);
$pdf->Cell(85, 5, ': '.$location.'', 0, 0);


$pdf->Cell(40, 5, 'No of Offenders', 0, 0);
$pdf->Cell(58, 5, ': '.$NoOfOffenders.'', 0, 1);

$pdf->Cell(35, 5, 'No of Offences', 0, 0);
$pdf->Cell(52, 5, ': '.$NoofOffences.'', 0, 1);

$pdf -> setTextColor(0,0,0);
	$pdf->Cell(55, 10, '                               ----------------------------------------------------------------------------------------------', 0, 1);	
//--------------------------------------------------------------------------------------------------
			$pdf -> setTextColor(252,3,3);
			// Result 2 Rules Breached
		$result2 = mysqli_query($connection, "SELECT DISTINCT offenders.Place, offenders.Fine_Id, fine.Fine_Name FROM offenders
        	LEFT JOIN fine ON offenders.Fine_Id = fine.Fine_Id WHERE offenders.Place='$location'");
	
		if (mysqli_num_rows($result2)>0) {
			$pdf->Cell(65, 10, ' ', 0, 0);
			$pdf -> setfont("Arial", "B", "13");
			$pdf->Cell(40, 10, '___Rules(Offences) Breached___', 0, 1);
			$pdf -> setfont("Arial", "B", "11");
			while ($row2 = mysqli_fetch_assoc($result2)) {
				 //$rulesBreached= $row3['Fine_Name']; 
				$pdf->Cell(70, 10, ' ', 0, 0);
				 $pdf->Cell(35, 10, ''.$row2['Fine_Name'].'', 0, 1);
		}
	}
$pdf -> Output();

?>