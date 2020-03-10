<?php 
//File used to create DB connection


$db['DB_HOST']="localhost";
$db['DB_USER']="root";
$db['DB_PASS']="";
$db['DB_NAME']="cms";

foreach($db as $key => $value){
	
	define(strtoupper($key),$value);
	
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


?>