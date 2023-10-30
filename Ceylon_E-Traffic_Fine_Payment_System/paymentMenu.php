<?php
include_once 'connection.php';
$offenderid = $_GET['Offender_ID'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body style="display: flex; height: 100vh; justify-content: center; align-items: center; background: linear-gradient(135deg, #71b7e6, #9b59b6); padding: 10px;">

<div class="container">
<div class="title">Pay Fines</div>
	<h2> 
	<label for="fname" style="color: #C41316; font-family: 'Poppins',sans-serif;">Accepted Cards</label>
		<div class="icon-container">
		  <i class="fa fa-cc-visa" style="color:navy;"></i>
		  <i class="fa fa-cc-mastercard" style="color:red;"></i>
		</div>
		</h2>
		<br>
	<form action="paymentMenu.php?Offender_ID=<?php echo $offenderid ?>" method="POST">
	<div class="user-details">

		<div class="inputBx">
			<span>Name On Card</span>
			<input type="text" id="fName" name="fName" required>
		</div>
		<div class="inputBx">
			<span>Card Number</span>
			<input type="text" id="cardNum" name="cardNumber" placeholder="1111-2222-3333-4444" maxlength="16" minlength="16" required>
		</div>
		<div class="inputBx">
			<span>Expire Date</span>
			<input type="date" name="expireDate" required>
		</div>
		<div class="inputBx">
			<span>CVV</span>
			<input type="text" name="cvv" placeholder="352" required>
		</div>
		</div>
		<div class="user-details2">
		<div class="checkBx">
			<span>Payment Method</span>
			<select id="paymentMethod" name="paymentMethod">
			<option value="visa">Visa</option>
			<option value="master">Masters</option>
			</select>
		</div>
		</div>
			<br>
			<br>
			<div class="btnBx">
				<input type="submit" name="btnProceed" value="Pay Now">
			</div>

	</form>
	</div>
	</div>
</body>
</html>


<?php 
if (isset($_POST['btnProceed'])) {
	$firstName = $_POST['fName'];
	//$lastName = $_POST['lName'];
	$cardNumber = $_POST['cardNumber'];
	$expireDate = $_POST['expireDate'];
	$paymentMethod = $_POST['paymentMethod'];
	$cvv = $_POST['cvv'];

	$cardNumAssigned = "1234567891011121";
	$expireDateAssigned = date('Y-m-d');
	$cvvAssigned = "123";
	$bankAmount = 60000;

	if ($cardNumber == $cardNumAssigned) {
		if ($expireDateAssigned != $expireDate) {
			if ($cvvAssigned == $cvv) {

				$query = "SELECT offenders.Offender_ID, offenders.Fine_Id, fine.Fine_Amount FROM offenders LEFT JOIN fine ON offenders.Fine_Id = fine.Fine_Id WHERE offenders.Offender_ID={$offenderid}";
				$result= mysqli_query($connection, $query);
				if (mysqli_num_rows($result)>0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$offenderid = $row['Offender_ID'];
						$fineAmount= $row['Fine_Amount'];
				}
			}
			$query2 = "INSERT into payments (Payment_Method, Amount, Offender_ID) VALUES('$paymentMethod','$fineAmount','$offenderid')";
			$result2 = mysqli_query($connection, $query2);
			if ($result2) {
				echo '<script>alert("Payment Done Successfully")</script>';
				$bankAmount = $bankAmount - $fineAmount;
				echo '<script>alert(" Bank Balance = '.$bankAmount.'");
				window.location.href="searchOffenders.php"; </script>';
			}
			else{
				echo '<script>alert("Payment Failed")</script>';
			}
			}
			else{
				echo '<script>alert("Wrong CVV entered")</script>';
			}
		}
		else{
			echo '<script>alert("Card Expired")</script>';
		}

	}
	else{
		echo '<script>alert("Wrong Card number")</script>';
	}

}
?>
