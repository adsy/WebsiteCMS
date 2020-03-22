<?php include "includes/adminHeader.php";?>


<body>

<div id="wrapper">

<?php include "includes/adminNav.php";?>


<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">




<h1 class="page-header">
	CMS ADMIN <br>
	<small>Manage Users</small>
</h1>

<?php 

	if (isset($_GET['source'])) {
		$source = $_GET['source'];
	}
	else
	{
		$source ='';
	}
	
	//Grab the source variable that was added into the URL and return the page base off its value.
	switch ($source) {
			
			case 'addUser';
			include 'includes/addUser.php';
			break;
			

			case 'editUser';
			include 'includes/editUser.php';
			break;
			
			
			case '3';
			include '';
			break;
			
		default:
			include "includes/viewAllUsers.php";
			break;
	}
	
?>



</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>

<?php include "includes/adminFooter.php";?>