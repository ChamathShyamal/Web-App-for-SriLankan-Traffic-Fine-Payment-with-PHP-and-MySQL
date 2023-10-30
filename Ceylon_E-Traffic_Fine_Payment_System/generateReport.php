<?php

//error_reporting(0);
include_once 'connection.php';
if (isset($_POST['btnSearchReport'])) {
	$d1 = $_POST['date1'];
	$d2 = $_POST['date2'];
	$array = explode('-', $d1);

	$dates = $array[2];
	$month = $array[1]; 
	$year = $array[0];

	$array2 = explode('-', $d2);
	$dates2 = $array2[2];
	$month2 = $array2[1]; 
	$year2 = $array2[0];
	$date1 = $year.'-'.$month.'-'.$dates;
	$date2 = $year2.'-'.$month2.'-'.$dates2;

	$query = "SELECT * FROM offenders
        WHERE (Date_of_Offense>='$date1' && Date_of_Offense <='$date2')";
	$result = mysqli_query($connection, $query);


	if (mysqli_num_rows($result)>0) {

		//No of Offenders
		$result1 = mysqli_query($connection, "SELECT DISTINCT Offender_NIC FROM offenders  WHERE (Date_of_Offense>='$date1' && Date_of_Offense <='$date2')");
		$NoOfOffenders = mysqli_num_rows($result1);
		// No of Offenses
		$result2 = mysqli_query($connection, "SELECT * FROM offenders  WHERE (Date_of_Offense>='$date1' && Date_of_Offense <='$date2')");
		$NoofOffences = mysqli_num_rows($result2);
	}
}
else{
		echo "Nothing found";
	}


////////////////////////////////////////////////

include_once ('pdf/fpdf.php');
$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> setfont("Arial", "B", "15");
$pdf -> setTextColor(252,3,3);
$pdf -> Cell(200,20,"CEYLON TRAFFIC PAYMENT SYSTEM REPORT GENERATION","0","1","C");
$pdf->Ln(15);//Line break
$pdf->Line(10,30, 200, 30);
$pdf -> setfont("Arial", "B", "11");
//---------------------------------------------------------------------------------------------



$pdf->Cell(40, 5, 'No of Offenders', 0, 0);



$pdf->Cell(58, 5, ': '.$NoOfOffenders.'', 0, 0);

$pdf->Cell(35, 5, 'No of Offences', 0, 0);
$pdf->Cell(52, 5, ': '.$NoofOffences.'', 0, 1);

$pdf -> setTextColor(0,0,0);
	$pdf->Cell(55, 10, '                               ----------------------------------------------------------------------------------------------', 0, 1);	
//--------------------------------------------------------------------------------------------------
			$pdf -> setTextColor(252,3,3);
			// Resullt 3 Start Rules Breached
		$result3 = mysqli_query($connection, "SELECT DISTINCT offenders.Fine_Id, fine.* FROM offenders
        	LEFT JOIN fine ON offenders.Fine_Id = fine.Fine_Id  WHERE (Date_of_Offense>='$date1' && Date_of_Offense <='$date2')");
	
		if (mysqli_num_rows($result3)>0) {
			$pdf->Cell(65, 10, ' ', 0, 0);
			$pdf -> setfont("Arial", "B", "13");
			$pdf->Cell(40, 10, '___Rules Breached___', 0, 1);
			$pdf -> setfont("Arial", "B", "11");
			while ($row3 = mysqli_fetch_assoc($result3)) {
				 //$rulesBreached= $row3['Fine_Name']; 
				$pdf->Cell(70, 10, ' ', 0, 0);
				 $pdf->Cell(35, 10, ''.$row3['Fine_Name'].'', 0, 1);
		}
	}
$pdf -> setTextColor(0,0,0); 
	$pdf->Cell(55, 10, '                               ----------------------------------------------------------------------------------------------', 0, 1);
$pdf -> setTextColor(252,3,3);

			//--------------------------------------------------------------------------------------------------

	// Result 4 Start Locations
		$result4 = mysqli_query($connection, "SELECT DISTINCT Place FROM offenders  WHERE (Date_of_Offense>='$date1' && Date_of_Offense <='$date2')");
			if (mysqli_num_rows($result4)>0) {
				$pdf->Cell(50, 10, ' ', 0, 0);
				$pdf -> setfont("Arial", "B", "13");
				$pdf->Cell(40, 10, '__Locations Where Offences were happened__', 0, 1);
				$pdf -> setfont("Arial", "B", "11");
				while ($row4 = mysqli_fetch_assoc($result4)) {
					 //$locations = $row4['Place']; 
					 $pdf->Cell(73, 10, ' ', 0, 0);
					 $pdf->Cell(42, 10, ''.$row4['Place'].'', 0, 1);
			}
	}


$pdf->Cell(65, 10, ' ', 0, 0);
$pdf->Cell(40, 50, 'Total Cost of Fines', 0, 0);

//--------------------------------------------------------------------------------------------------

	//Result 5 Start Total Fine Amount

		$result5 = mysqli_query($connection, "SELECT offenders.Fine_Id, SUM(fine.Fine_Amount) AS totfineAmount FROM offenders
        			LEFT JOIN fine ON offenders.Fine_Id = fine.Fine_Id  WHERE (Date_of_Offense>='$date1' && Date_of_Offense <='$date2')");

			if (mysqli_num_rows($result5)>0) {
				while ($row5 = mysqli_fetch_assoc($result5)) { 
					 $totfineAmount = $row5['totfineAmount'];
				}
		}

$pdf->Cell(58, 50, ': '.$totfineAmount.'', 0, 0,);


$pdf -> Output();


?>
