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
  .user-details .inputBx textarea{
width: 637px;
height:200px;
display: block;
padding: 8px 20px;
outline: none;
font-weight: 400;
border: 1px solid #607d8b;
font-size: 10px;
letter-spacing: 1px;
color: #607d8b;
background: transparent;
border-radius: 30px;
border-bottom-width: 2px;
}


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
</head>
<body>

  <nav style="display: flex; justify-content: space-around; align-items: center; min-height: 8vh; background-color: #0017BF;">
    <div style="color: #DED3D3; font-family: 'Poppins',sans-serif; text-transform: uppercase; letter-spacing: 5px; font-size: 30px;">
      <h4>SRI LANKA TRAFFIC POLICE</h4>
    </div>
    <ul class="nav-links" style="display: flex; justify-content: space-around; width: 35%;">
     <li style="list-style: none;"><a style="color:#DED3D3; text-decoration: none; letter-spacing: 3px; font-weight: bold; font-size: 14px;" href="searchOffenders.php">Search Offenses</a></li>
      <li style="list-style: none;"><a style="color:#DED3D3; text-decoration: none; letter-spacing: 3px; font-weight: bold; font-size: 14px;" href="aboutUs2.php">About Us</a></li>
      <li style="list-style: none;"><a style="color:#DED3D3; text-decoration: none; letter-spacing: 3px; font-weight: bold; font-size: 14px;" href="contactUs.php">Contact Us</a></li>
      <li style="list-style: none;"><a style="color:#DED3D3; text-decoration: none; letter-spacing: 3px; font-weight: bold; font-size: 14px;" href="#"></a></li>
    </ul>
    <div class="lines" style="cursor: pointer;">
      <div class="line1" style="width: 25px; height: 4px; background-color:#DED3D3; margin:3px; transition: all 0.3s ease;"></div>
      <div class="line2" style="width: 25px; height: 4px; background-color:#DED3D3; margin:3px; transition: all 0.3s ease;"></div>
      <div class="line3" style="width: 25px; height: 4px; background-color:#DED3D3; margin:3px; transition: all 0.3s ease;"></div>
    </div>
  </nav>

  <div style="display: flex; height: 100vh; justify-content: center; align-items: center; background: linear-gradient(135deg, #71b7e6, #9b59b6); padding: 10px;">

<div class="container">
<div class="title">Contact Sri Lankan Traffic Police</div>
<form action="contactUs.php" method="POST">
<div class="user-details">
<div class="inputBx">
<span>First Name</span>
<input type="text" name="FName"  required>
</div>
<div class="inputBx">
<span>Last Name</span>
<input type="text" name="LName"  required>
</div>
<div class="inputBx">
<span>Email Address</span>
<input type="text" name="email"  required>
</div>
<div class="inputBx">
<span>Phone Number</span>
<input type="text" name="tel"  required>
</div>
<div class="inputBx">
<span>Your Message</span>
<textarea name="message" placeholder="Write something..." required></textarea>
</div>
</div>
<br>
<br>
<div class="btnBx">
<input type="submit" value="Send" name="btnSend">
</div>
</form>
</div>
</div>
<footer class="footer-distributed">


<div class="footer-left">
<h3>SriLanka<span>TrafficPolice</span></h3>



<p class="footer-links">
<a href="searchOffenders.php">Search Offenses</a>
|
<a href="aboutUs2.php">About Us</a>
|
<a href="contactUs.php">Contact Us</a>
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

if (isset($_POST['btnSend'])) {
  $firstName = $_POST['FName'];
  $lastName = $_POST['LName'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $msg = $_POST['message'];

  $to = 'rajeewhesoyamuvinduaezakmi@gmail.com';
  $subject = "CEYLON E TRAFFIC PAYMENT SYSTEM CONTACT US MESSAGE";
  $message = "{$firstName}<br>{$lastName}<br>{$email}<br>{$msg}<br>{$tel}";
  $headers = "From: rajeewhesoyamuvinduaezakmi@gmail.com\r\n Content-Type: text/html;";
  $mail = mail($to, $subject, $message, $headers);
  if ($mail) {
    echo '<script>alert("Email successfully sent...")</script>';
  }
  else{
    echo '<script>alert("Email sending failed ...")</script>';
  }

}



?>