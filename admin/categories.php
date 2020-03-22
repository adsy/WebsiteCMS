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
	<small>Manage Categories</small>
</h1>

<div class="col-xs-6">






	<!--  Form to add category	-->
	<form action="" method="post">
	<?php 
		
	//If button is pressed to add category, pass text in input value to AddCategory function
	if(isset($_POST['add'])){

		
		AddCategory($_POST['cat_title']);
	}
	?>
	
	
		<div class="form-group">
			<h4><label for="cat-title" class="">Add Category</label></h4>
			<input class="form-control" type="text" name="cat_title">

		</div>
		<div class="form-group">

			<input class="btn btn-primary" type="submit" name="add" value="Add Category">

		</div>

	</form>



	<!--  Code to load form to update category if edit buttons are pressed	-->
	<?php if (isset($_GET['edit'])) {
		$cat_id = $_GET['edit'];
		
	
	include "includes/update_categories.php";
	} 
	?>



	
</div>


<!--	Display category data in table	-->
<div class="col-xs-6">

	<table class="table table-primary table-bordered table-hover ">
		<thead>
			<tr class="bg-danger">
				<th>ID</th>
				<th>Category Title</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		<!-- Adds Data from DB into table fields -->
		<?php
			DisplayCategoriesData();
		?>

	<?php

		if (isset($_GET['delete'])) {
			DeleteCategory($_GET['delete']);

		}

	?>

		</tbody>
	</table>

</div>

</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>

<?php include "includes/adminFooter.php";?>