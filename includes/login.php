<?php include "db.php"; ?>

<?php session_start();?>

<?php 
global $connection;


if(isset($_POST['submit'])) {
	$username = $_POST['user'];
	$password = $_POST['pass'];
	
	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);
	
	$query = "SELECT * FROM users WHERE username = '{$username}' ";
	
	$select_user_query = mysqli_query($connection, $query);
	
	if (!$select_user_query) {
		die("select user query failed = " . mysqli_error($connection));
	}
		
	while ($row = mysqli_fetch_assoc($select_user_query)) {
		$db_user_id = $row['user_id'];
		$db_username = $row['username'];
		$db_password = $row['password'];
		$db_firstName = $row['firstName'];
		$db_lastName = $row['lastName'];
		$db_role = $row['role'];
	}
	
	$incorrect ='<h4> Incorrect username or Password </h4>';
	
	if ($username ==== $db_username && $password === $db_password) {
		
		if ($db_role == 'Admin' ){
			$_SESSION['username'] = $db_username;
			$_SESSION['role'] = $db_role;
			$_SESSION['firstName'] = $db_firstName;
			$_SESSION['lastName'] = $db_lastName;
			header("Location: ../admin");
		} else if ($db_role == 'User' )
		{
			$_SESSION['username'] = $db_username;
			$_SESSION['role'] = $db_role;
			$_SESSION['firstName'] = $db_firstName;
			$_SESSION['lastName'] = $db_lastName;
			header("Location: ../index.php");
		}
	}
	else
	{
		header("Location: ../index.php");
	}
	
}




?>