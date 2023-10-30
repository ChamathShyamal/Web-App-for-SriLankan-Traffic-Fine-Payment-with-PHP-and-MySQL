<?php 
	$to = $_POST['offenderEmail'];
	$subject = "CEYLON E-TRAFFIC FINE PAYMENT SYSTEM";
	$message = 'Hi please be kind to press the link given in order to pay your fine <br><a href="searchOffenders.php">Press this link</a>';
	$headers = "From: rajeewhesoyamuvinduaezakmi@gmail.com\r\n Content-Type: text/html;";
	$mail = mail($to, $subject, $message, $headers);
	if ($mail) {
    echo "Email successfully sent...";
} else {
    echo "Email sending failed...";
}
	// code...
?>

