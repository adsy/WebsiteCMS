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
	<small>Post Management System</small>
</h1>

<?php 

	if (isset($_GET['source'])) {
		$source = $_GET['source'];
	}
	else
	{
		$source ='';
	}
	
	switch ($source) {
			
			case 'addPosts';
			include 'includes/addPosts.php';
			break;
			

			case 'editPosts';
			include 'includes/editPosts.php';
			break;
			
			
			case '3';
			include '';
			break;
			
		default:
			include "includes/viewAllPosts.php";
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