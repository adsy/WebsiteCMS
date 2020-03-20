<!--  Form to update category name	-->
<br>
	<form class="" action="" method="post">
	
	
	
	<?php
	//If update button is pressed, pass value in text box + cat_id to UpdateCategory function.	
		if (isset($_POST['update'])) {
			UpdateCategory($_POST['cat_title'],$cat_id);

		}

	?>
	
		<div class="form-group">
			<h4><label for="cat-title" class="">Update Category</label></h4>
			


			<?php

			//If edit button is presed, grab value from assoc array and assign to value - pass to LoadEditCategory function to load edit category form.
			if (isset($_GET['edit'])){

				$cat_id = $_GET['edit'];



				LoadEditCategory($cat_id); }

				
			?>


		</div>
		<div class="form-group">

			<input class="btn btn-primary" type="submit" name="update" value="Add Category">



			

		</div>

	</form>