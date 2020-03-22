

<?php session_start();?>

<?php 

$_SESSION['username'] = null;
$_SESSION['role'] = null;
$_SESSION['firstName'] = null;
$_SESSION['lastName'] = null;

session_destroy();
header("Location: ../index.php");




?>