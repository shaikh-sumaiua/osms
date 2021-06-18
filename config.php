<?php
$hname = "localhost";
$user = "root";
$pass ="";
$dbname = "cource";
$conn=mysqli_connect($hname,$user,$pass,$dbname);
if($conn){
	//echo "Connection";
}else{
	echo "not connect";
}
?>