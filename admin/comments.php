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
	<small>Manage Comments</small>
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
			
		default:
			include "includes/viewAllComments.php";
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