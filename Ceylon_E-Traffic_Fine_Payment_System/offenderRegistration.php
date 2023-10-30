<?php
session_start();

include_once 'connection.php';
$query = "SELECT * FROM fine";
$query1 = "SELECT Officer_ID FROM officers WHERE Username='".$_SESSION['loginOfficer']."'";
$result = mysqli_query($connection, $query);
$result1 = mysqli_query($connection, $query1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ceylon E-Traffic Fine Payment System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PV1GOfQNHSoD2xbE+QkPxCAF1NEevoEH3S10sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="Style.css">
<style>
		@media screen and (max-width:1024px){
			.nav-links{
				width: 60%;
			}
		}
		@media screen and (max-width:768px){
			body{ 
				overflow-x: hidden;
			}
			.nav-links{
				position: absolute;
				right: 0px;
				height: 92vh;
				top: 8vh;
				background-color: #0017BF;
				display: flex;
				flex-direction: column;
				align-items: center;
				width: 50%;
				transform: translateX(100%);
				transition: transform 0.5s ease-in; 
			}
			.nav-links li{
				opacity: 0;
			}
			.lines{
				display: block;
			}
		}
		.nav-active{
			transform: translateX(0%);
		}
		@keyframes navLinkFade{
			from{
				opacity: 0;
				transform: translateX(50px);
			}
			to{
				opacity: 1;
				transform: translateX(0px);
			}
		}
		.toggle .line1{
			transform: rotate(-45deg) translate(-5px,6px);
		}
		.toggle .line2{
			opacity: 0;
		}
		.toggle .line3{
			transform: rotate(45deg) translate(-5px,-6px);
		}
		/* The footer is fixed to the bottom of the page */



footer {
position: fixed;
bottom: 0;
}



@media (max-height:800px) {
footer {
position: static;
}
}



.footer-distributed {
background-color: #060D9F;
box-sizing: border-box;
width: 100%;
text-align: left;
font: bold 16px sans-serif;
padding: 50px 50px 60px 50px;
margin-top: 0px;
}



.footer-distributed .footer-left, .footer-distributed .footer-center, .footer-distributed .footer-right {
display: inline-block;
vertical-align: top;
}



/* Footer left */



.footer-distributed .footer-left {
width: 30%;
}



.footer-distributed h3 {
color: #92999f;
font: normal 36px 'Cookie', cursive;
margin: 0;
}




.footer-distributed h3 span {
color: #DED3D3;
}



/* Footer links */



.footer-distributed .footer-links {
color: #92999f;
margin: 20px 0 12px;
}



.footer-distributed .footer-links a {
display: inline-block;
line-height: 1.8;
text-decoration: none;
color: inherit;
}



.footer-distributed .footer-company-name {
color: #8f9296;
font-size: 14px;
font-weight: normal;
margin: 0;
}



/* Footer Center */



.footer-distributed .footer-center {
width: 35%;
}



.footer-distributed .footer-center i {
background-color: #33383b;
color: #DED3D3;
font-size: 25px;
width: 38px;
height: 38px;
border-radius: 50%;
text-align: center;
line-height: 42px;
margin: 10px 15px;
vertical-align: middle;
}



.footer-distributed .footer-center i.fa-envelope {
font-size: 17px;
line-height: 38px;
}



.footer-distributed .footer-center p {
display: inline-block;
color: #92999f;
vertical-align: middle;
margin: 0;
}



.footer-distributed .footer-center p span {
display: block;
font-weight: normal;
font-size: 14px;
line-height: 2;
}



.footer-distributed .footer-center p a {
color: #92999f;
text-decoration: none;
;
}



/* Footer Right */



.footer-distributed .footer-right {
width: 30%;
}



.footer-distributed .footer-company-about {
line-height: 20px;
color: #92999f;
font-size: 13px;
font-weight: normal;
margin: 0;
}



.footer-distributed .footer-company-about span {
display: block;
color: #92999f;
font-size: 18px;
font-weight: bold;
margin-bottom: 20px;
}



.footer-distributed .footer-icons {
margin-top: 25px;
}



.footer-distributed .footer-icons a {
display: inline-block;
width: 35px;
height: 35px;
cursor: pointer;
background-color: #33383b;
border-radius: 2px;
font-size: 20px;
color: #92999f;
text-align: center;
line-height: 35px;
margin-right: 3px;
margin-bottom: 5px;
}



.footer-distributed .footer-icons a:hover {
background-color: #3F71EA;
}



.footer-links a:hover {
color: #3F71EA;
}



@media (max-width: 880px) {
.footer-distributed .footer-left, .footer-distributed .footer-center, .footer-distributed .footer-right {
display: block;
width: 100%;
margin-bottom: 40px;
text-align: center;
}
.footer-distributed .footer-center i {
margin-left: 0;
}
}

/*Ending of the footer*/
	</style>
<script type="text/javascript" src="validation.js"></script>
</head>
<body>
	<nav style="display: flex; justify-content: space-around; align-items: center; min-height: 8vh; background-color: #0017BF;">
		<div style="color: #DED3D3; font-family: 'Poppins',sans-serif; text-transform: uppercase; letter-spacing: 5px; font-size: 30px;">
			<h4>SRI LANKA TRAFFIC POLICE</h4>
		</div>
		<ul class="nav-links" style="display: flex; justify-content: space-around; width: 35%;">
			<li style="list-style: none;"><a style="color:#DED3D3; text-decoration: none; letter-spacing: 3px; font-weight: bold; font-size: 14px;" href="offenderRegistration.php">Add Offenders</a></li>
			<li style="list-style: none;"><a style="color:#DED3D3; text-decoration: none; letter-spacing: 3px; font-weight: bold; font-size: 14px;" href="officersSearchOffenders.php">Search Offenders</a></li>
			<li style="list-style: none;"><a style="color:#DED3D3; text-decoration: none; letter-spacing: 3px; font-weight: bold; font-size: 14px;" href="aboutUs.php">About Us</a></li>
		</ul>
		<div class="lines" style="cursor: pointer;">
			<div class="line1" style="width: 25px; height: 4px; background-color:#DED3D3; margin:3px; transition: all 0.3s ease;"></div>
			<div class="line2" style="width: 25px; height: 4px; background-color:#DED3D3; margin:3px; transition: all 0.3s ease;"></div>
			<div class="line3" style="width: 25px; height: 4px; background-color:#DED3D3; margin:3px; transition: all 0.3s ease;"></div>
		</div>
	</nav>
	<div style="display: flex; height: 100vh; justify-content: center; align-items: center; background: linear-gradient(135deg, #71b7e6, #9b59b6); padding: 10px;">
	
	<div class="containerOR">
	<div class="titleOR">Offenders Registration 
		
	</div>
	<!--<a href="logout.php">Logout</a>-->
	    <form action="offenderRegistration.php" method="POST">
			<div class="user-detailsOR">
				<div class="inputBxOR">
					<span>Offender NIC</span>
					<input type="text" name="offenderNic" maxlength="12" required>
				</div>
				<div class="inputBxOR">
					<span>Police ID</span>
					<?php
					while ($row1 = mysqli_fetch_assoc($result1)) {
						?>
						<input type="text" name="offenderPoliceId" value="<?php echo $row1['Officer_ID'] ?>" required>
						<?php
					}
					?>
				</div>
				<div class="inputBxOR">
					<span>First Name</span>
					<input type="text" name="offenderFirstName" required>
				</div>
				<div class="inputBxOR">
					<span>Last Name</span>
					<input type="text" name="offenderLastName" required>
				</div>
				<div class="inputBxOR">
					<span>Street Number</span>
					<input type="text" name="offenderStreetNum" required>
				</div>
				<div class="inputBxOR">
					<span>Street_Name</span>
					<input type="text" name="offenderStreetName" required>
				</div>
				<div class="inputBxOR">
					<span>City</span>
					<input type="text" name="offenderCity" required>
				</div>
				<div class="inputBxOR">
					<span>Email</span>
					<input type="email" name="offenderEmail" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
				</div>
				<div class="inputBxOR">
					<span>Telephone</span>
					<input type="text" name="offenderTelephone" maxlength="10" minlength="10" required>
				</div>
				<div class="inputBxOR">
					<span>Licesnse Number</span>
					<input type="text" name="offenderLicenceNo" maxlength="10" minlength="10" required>
				</div>
				<div class="inputBxOR">
					<span>Vehicle Number</span>
					<input type="text" name="offenderVehicleNo" required>
				</div>
				<div class="inputBxOR">
					<span>Date Of Offense</span>
					<input type="date" name="offenderDateOfOffense" required>
				</div>
				<div class="inputBxOR">
					<span>Due(Court) Date</span>
					<input type="date" name="offenderDuecourt" required>
				</div>
				<div class="inputBxOR">
					<span>Time</span>
					<input type="time" name="offenderTime"  required>
				</div>
				<div class="inputBxOR">
					<span>Place</span>
					<input type="text" name="offenderPlace" required>
				</div>
				</div>
				<div class="user-details2">
				<div class="checkBx">
					<span>Gender</span>
						<select name="offenderGender">
						  <option value="male">Male</option>
						  <option value="female">Female</option>
						  <option value="none">Prefer Not To Mention</option>
						</select>
				</div>
				<div class="checkBx">
					<span>Name Of Offense</span> 
						<select class="CTD w-100" multiple data-selected-text-format="count > 2" name="offenderNameOfOffense">
							<?php
							while ($row= mysqli_fetch_assoc($result)) {
								?>
								<option value="<?php echo $row['Fine_Id'] ?>"><?php echo $row['Fine_Name']; ?></option>
								<?php
							}
							 ?>
						</select>
				</div>		
				<div class="checkBx">
					<span>Competent To Drive</span> 
						<select class="CTD w-100" multiple data-selected-text-format="count > 6" name="offenderCompetenttoDrive">
						  <option>A1</option>
						  <option>A</option> 
						  <option>B1</option>
						  <option>B</option>
						  <option>C1</option>
						  <option>C</option>
					      <option>CE</option>
						  <option>D1</option>
						  <option>D</option>
						  <option>DE</option>
						  <option>G1</option>
						  <option>G</option>
						  <option>J</option>
						</select>
				</div>		
				</div>
			<br>
			<br>
			<div class="btnBx">
				<input type="submit" value="Add Offender" name="btnAddOffender" >
			</div>
			<br>		
		</form>	
	</div>

</div>







<script src="navMenu.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js">
</script>
<script type="text/javascript" src="offenderRegScript.js"></script>


<footer class="footer-distributed">


<div class="footer-left">
<h3>SriLanka<span>TrafficPolice</span></h3>



<p class="footer-links">
<a href="offenderRegistration.php">Add Offenders</a>
|
<a href="officersSearchOffenders.php">Search Offenders</a>
|
<a href="aboutUsOIC.php">About Us</a>
</p>



<p class="footer-company-name">Copyright © 2021 <strong>SriLankaTrafficPolice</strong> All rights reserved</p>
</div>



<div class="footer-center">
<div>
<i class="fa fa-map-marker" style="color: #92999f;"></i>
<p><span>Sri Lanka</span>
Kalutara</p>
</div>



<div>
<i class="fa fa-phone" style="color: #92999f;"></i>
<p>+94 342 237 225</p>
</div>
<div>
<i class="fa fa-envelope" style="color: #92999f;"></i>
<p><a href="mailto:kalutaranorth@gmail.com">kalutaranorth@police.lk</a></p>
</div>
</div>
<div class="footer-right">
<p class="footer-company-about">
<span>About Us</span>
<strong>Sri Lankan Traffic Police </strong>The Traffic Police is a specialized unit of the Sri Lanka Police responsible for overseeing and enforcing traffic safety compliance on roads and highways. It is headed by the Director of Traffic, in recent times a senior gazetted officer of the rank of Deputy Inspector General of Police
</p>
<div class="footer-icons">
<a href="https://m.facebook.com/profile.php?id=100064876533371&ref=py_c&_rdr&_se_imp=0BkmqItYxLVcHPTSZ"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-youtube"></i></a>
</div>
</div>
</footer>


</body>
</html>
<?php 
function input_data($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST['btnAddOffender'])) {
    	$offenderNic = input_data($_POST['offenderNic']);
    	$offenderFirstName = input_data($_POST['offenderFirstName']);
    	$offenderLastName = input_data($_POST['offenderLastName']);
    	$offenderStreetNum = input_data($_POST['offenderStreetNum']);
    	$offenderStreetName = input_data($_POST['offenderStreetName']);
    	$offenderCity = input_data($_POST['offenderCity']);
    	$offenderEmail = input_data($_POST['offenderEmail']);
    	$offenderTelephone = input_data($_POST['offenderTelephone']);
    	$offenderLicenseNo = input_data($_POST['offenderLicenceNo']);
    	$offenderVehicleNo = input_data($_POST['offenderVehicleNo']);
    	$offenderDateOfOffense = $_POST['offenderDateOfOffense'];
    	$offenderDuecourt = $_POST['offenderDuecourt'];
    	$offenderTime = $_POST['offenderTime'];
    	$offenderPlace = input_data($_POST['offenderPlace']);
    	$offenderGender = input_data($_POST['offenderGender']);
    	$offenderFineid = input_data($_POST['offenderNameOfOffense']);
    	$offenderCompetenttoDrive = input_data($_POST['offenderCompetenttoDrive']);
    	$offenderPoliceId= input_data($_POST['offenderPoliceId']);

    	$query2 = "INSERT into offenders (Offender_NIC, First_Name, Last_Name, Street_Number, Street_Name, City, Email, Telephone, Vehicle_Number, Date_of_Offense, Due_Court_Date, Offender_Time, Place, Gender, Fine_Id, Officer_ID) VALUES('$offenderNic','$offenderFirstName','$offenderLastName','$offenderStreetNum','$offenderStreetName','$offenderCity','$offenderEmail','$offenderTelephone','$offenderVehicleNo','$offenderDateOfOffense','$offenderDuecourt','$offenderTime','$offenderPlace','$offenderGender','$offenderFineid','$offenderPoliceId')";
    	$result2 = mysqli_query($connection, $query2);
    	if ($result2) {
    		$offenderId = mysqli_insert_id($connection);// Get offender id from offender table
			//Officer_Fine
			$query3 = "INSERT into officer_fine (Officer_ID, Fine_Id) VALUES('$offenderPoliceId','$offenderFineid')";
			$result3 = mysqli_query($connection, $query3);
			//License
			$handoutDate= date('Y-m-d');
			$query4 = "INSERT into license (License_No, Received_Date, Handout_Date, Competent_to_drive, Offender_ID) VALUES('$offenderLicenseNo','$offenderDateOfOffense','$handoutDate','$offenderCompetenttoDrive','$offenderId')";
			$result4 = mysqli_query($connection, $query4);

			if ($result3 && $result4)
			{

		 	echo '<script>alert("Offender Added Successfully")</script>';
		 	$to = $offenderEmail;
			$subject = "CEYLON E-TRAFFIC FINE PAYMENT SYSTEM";
			$echo = '<a href="searchOffenders.php">Press This Link</a>';
			$message = "Hi please be kind to press the link given in order to pay your fine {$echo}";
			$headers = "From: rajeewhesoyamuvinduaezakmi@gmail.com\r\n Content-Type: text/html;";
			$mail = mail($to, $subject, $message, $headers);

			if ($mail) {
				echo '<script>alert("Email successfully sent...")</script>';
			}
		 	else {
				echo '<script>alert("Email sending failed...")</script>';
			}
    	}
    	else{
    		echo '<script>alert("Failed to add Offender")</script>';
    	}

    }
    else{
    		echo '<script>alert("Failed to add Offender")</script>';
    	}
}
?>