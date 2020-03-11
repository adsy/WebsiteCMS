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


<table class="table table-primary table-bordered table-hover ">
	<thead>
		<tr class="bg-danger">
			<th>ID</th>
			<th>Title</th>
			<th>Author</th>
			<th>Category</th>
			<th>Status</th>
			<th>Image</th>
			<th>Tags</th>
			<th>Comments</th>
			<th>Date</th>
		</tr>
		<tbody>
			<tr>
				<?php DisplayPostsData();?>
				
			</tr>
		</tbody>
	</thead>
</table>

</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>

<?php include "includes/adminFooter.php";?>