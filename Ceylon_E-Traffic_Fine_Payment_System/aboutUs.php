<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ceylon E-Traffic Fine Payment System</title>	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PV1GOfQNHSoD2xbE+QkPxCAF1NEevoEH3S10sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
	
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
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
			font-family: 'Dosis', sans-serif;
		}
		.about{
			height: 100vh;
			width: 100%;
      			
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.about .main img{
			width: 580px;
			max-width: 100%;
			height: auto;
			padding: 0 10px;
		}
		.all-text{
			width: 600px;
			max-width: 100%;
			padding: 0 10px;
		}
		.main{
			width: 1290px;
			max-width: 95%;
			margin: 0 auto;
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			justify-content: space-around;
		}
		.all-text h4{
			font-family: 'Roboto', sans-serif;
			font-size: 50px;
			color: #020065;
			letter-spacing: 1px;
			font-weight: 600;
			margin-bottom: 20px;
			text-transform: uppercase;
			border-bottom: 4px solid #020065;
			letter-spacing: 1px;
			width: 100%;
		}
		.all-text h1{
			font-family: 'Poppins',sans-serif;
			font-size: 1.8em;
			color: #111111;
			font-weight: 700;
			margin-bottom: 20px;
		}
		.all-text p{
			font-family: 'Roboto', sans-serif;
			font-size: 20px;
			color: #111111;
			line-height: 30px;
			margin-bottom: 35px;
		}
		.btn button{
			background: white;
			padding: 20px 32px;
			font-size: 16px;
			font-weight: bold;
			color: #111111;
			border: none;
			outline: none;
			box-shadow: 0px 16px 32px 0px rgb(0 0 0 / 6%);
			margin-right: 20px;
		}
		.btn button:hover{
			background-color: #1d44f9;
			color: white;
			transition: .3s;
			cursor: pointer;
		}
		.btn .btn2{
			background: #020065;
			color: white;
			outline: none;
			border: none;
			border-radius: 35px;
		}
		@media screen and (max-width: 1250px){
			.about{
				width: 100%;
				height: auto;
				padding: 60px 0;
			}
			.all-text{
				text-align: center;
				margin-top: 40px;
			}
		}
		@media screen and (max-width: 650px){
			.about .main img{
				margin-bottom: 35px;
			}
			.all-text h1{
				font-size: 45px;
				margin-bottom: 20px;
			}
		}

		/*Gallery*/
.gallery-section{
  width: 100%;
  padding: 60px 0;
  
}

.inner-width{
  width: 100%;
  max-width: 1200px;
  margin: auto;
  padding: 0 20px;
}

.gallery-section h1{
  text-align: center;
  text-transform: uppercase;
  color: #020065;
}

.border{
  width: 180px;
  height: 4px;
  background: #020065;
  margin: 60px auto;
}

.gallery-section .gallery{
  display: flex;
  flex-wrap: wrap-reverse;
  justify-content: center;
}

.gallery-section .image{
  flex: 25%;
  overflow: hidden;
  cursor: pointer;
}

.gallery-section .image img{
  width: 100%;
  height: 100%;
  transition: 0.4s;
}

.gallery-section .image:hover img{
  transform: scale(1.4) rotate(15deg);
}

@media screen and (max-width:960px) {
  .gallery-section .image{
    flex: 33.33%;
  }
}

@media screen and (max-width:768px) {
  .gallery-section .image{
    flex: 50%;
  }
}

@media screen and (max-width:480px) {
  .gallery-section .image{
    flex: 100%;
  }
}


	</style>
</head>
<body style="background: linear-gradient(135deg, #71b7e6, #9b59b6);">

	<nav style="display: flex; justify-content: space-around; align-items: center; min-height: 8vh; background-color: #0017BF;">
		<div style="color: #DED3D3; font-family: 'Poppins',sans-serif; text-transform: uppercase; letter-spacing: 5px; font-size: 30px;">
			<h4>SRI LANKA TRAFFIC POLICE</h4>
		</div>
		<ul class="nav-links" style="display: flex; justify-content: space-around; width: 35%;">
			<li style="list-style: none;"><a style="color:#DED3D3; text-decoration: none; letter-spacing: 3px; font-weight: bold; font-size: 14px;" href="offenderRegistration.php">Add Offenders</a></li>
			<li style="list-style: none;"><a style="color:#DED3D3; text-decoration: none; letter-spacing: 3px; font-weight: bold; font-size: 14px;" href="officersSearchOffenders.php">Search offenders</a></li>
			<li style="list-style: none;"><a style="color:#DED3D3; text-decoration: none; letter-spacing: 3px; font-weight: bold; font-size: 14px;" href="aboutUs.php">About Us</a></li>
			<li style="list-style: none;"><a style="color:#DED3D3; text-decoration: none; letter-spacing: 3px; font-weight: bold; font-size: 14px;" href="#"></a></li>
		</ul>
		<div class="lines" style="cursor: pointer;">
			<div class="line1" style="width: 25px; height: 4px; background-color:#DED3D3; margin:3px; transition: all 0.3s ease;"></div>
			<div class="line2" style="width: 25px; height: 4px; background-color:#DED3D3; margin:3px; transition: all 0.3s ease;"></div>
			<div class="line3" style="width: 25px; height: 4px; background-color:#DED3D3; margin:3px; transition: all 0.3s ease;"></div>
		</div>
	</nav>

	<section class="about">
		<div class="main">
			<img src="abt.jpg">
			<div class="all-text">
				<h4>About Us</h4>
				<h1>Ceylon E-Traffic Fine Payment System</h1>
				<p>The Traffic Police is a specialized unit of the Sri Lanka Police responsible for overseeing and enforcing traffic safety compliance on roads and highways. It is headed by the Director of Traffic, in recent times a senior gazetted officer of the rank of Deputy Inspector General of Police</p>
				<div class="btn">
					<a href="https://www.police.lk/index.php/item/52-traffic-police"><button type="button" class="btn2">Read More</button></a>
				</div>
			</div>
		</div>
	</section>
	
	<div class="gallery-section">
      <div class="inner-width">
        <h1>Gallery</h1>
        <div class="border"></div>
        <div class="gallery">

          <a href="img/g1.jfif" class="image">
            <img src="img/g1.jfif" alt="">
          </a>

          <a href="img/g2.jfif" class="image">
            <img src="img/g2.jfif" alt="">
          </a>

          <a href="img/g3.jfif" class="image">
            <img src="img/g3.jfif" alt="">
          </a>

          <a href="img/g4.jfif" class="image">
            <img src="img/g4.jfif" alt="">
          </a>

          <a href="img/g5.jfif" class="image">
            <img src="img/g5.jfif" alt="">
          </a>

          <a href="img/g6.jfif" class="image">
            <img src="img/g6.jfif" alt="">
          </a>

          <a href="img/g7.jfif" class="image">
            <img src="img/g7.jfif" alt="">
          </a>
			
          <a href="img/g8.jfif" class="image">
            <img src="img/g8.jfif" alt="">
          </a>
			
			<a href="img/g9.jfif" class="image">
            <img src="img/g9.jfif" alt="">
          </a>
			
			<a href="img/g10.jfif" class="image">
            <img src="img/g10.jfif" alt="">
          </a>
			
			<a href="img/g11.jfif" class="image">
            <img src="img/g11.jfif" alt="">
          </a>
			
			<a href="img/g12.jfif" class="image">
            <img src="img/g12.jfif" alt="">
          </a>
			
			<a href="img/g13.jfif" class="image">
            <img src="img/g13.jfif" alt="">
          </a>
			
			<a href="img/g14.jfif" class="image">
            <img src="img/g14.jfif" alt="">
          </a>
			
			<a href="img/g15.jfif" class="image">
            <img src="img/g15.jfif" alt="">
          </a>
			
			<a href="img/g16.jfif" class="image">
            <img src="img/g16.jfif" alt="">
          </a>

        </div>
      </div>
    </div>


  <script>
    $(".gallery").magnificPopup({
      delegate: 'a',
      type: 'image',
      gallery:{
        enabled: true
      }
    });
  </script>
<script src="navMenu.js"></script>
  <footer class="footer-distributed">


<div class="footer-left">
<h3>SriLanka<span>TrafficPolice</span></h3>



<p class="footer-links">
<a href="offenderRegistration.php">Add Offenders</a>
|
<a href="officersSearchOffenders.php">Search Offenders</a>
|
<a href="aboutUs.php">About Us</a>
|
<a href="#">Home</a>
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