<?php
 $connection = mysqli_connect('localhost:3306','root','','cetfp_system_db');
 if ($connection) 
 {
  	//echo "connection Successful";
 }
 else{
 	echo "connection Unsuccessful";
 }
?>