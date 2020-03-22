<?php 

	if (isset($_GET['p_id'])) {
		$pID = $_GET['p_id'];
		$query = "SELECT * FROM posts WHERE post_id = $pID";
		
		global $connection;
		$select_post = mysqli_query($connection,$query);
	
		while($row = mysqli_fetch_assoc($select_post)) {
			$post_id = $row['post_id'];
			$post_title = $row['post_title'];
			$post_category = $row['post_category_id'];
			$post_image = $row['post_image'];
			$post_status = $row['post_status'];
			$post_author = $row['post_author'];
			$post_comment_count = $row['post_comment_count'];
			$post_date = $row['post_date'];
			$post_tags = $row['post_tags'];
			$post_content = $row['post_content'];
		}
		
	}

	
	if (isset($_POST['update_post'])){
		
		$post_title = $_POST['post_title'];
		$post_category_id = $_POST['post_category'];
		$post_author = $_POST['post_author'];
		$post_status = $_POST['post_status'];

		$post_image = $_FILES['post_image']['name'];
		$post_image_temp = $_FILES['post_image']['tmp_name'];

		$post_content = $_POST['post_contents'];
		$post_tags = $_POST['post_tags'];
		
	
		
		move_uploaded_file($post_image_temp, "../images/$post_image");

		if (empty($post_image)) {
			$query = "SELECT * FROM posts WHERE post_id = $pID";
			$select_image = mysqli_query($connection,$query);
			
			while ($row = mysqli_fetch_array($select_image)){
				$post_image = $row['post_image'];
			}
		}

		$query = "
					UPDATE posts 
					   SET post_title = '$post_title'
						 , post_category_id = '$post_category_id'
						 , post_date = now()
						 , post_author = '$post_author'
						 , post_status = '$post_status'
						 , post_tags = '$post_tags'
						 , post_content = '$post_content'
						 , post_image = '$post_image'
					 WHERE post_id = $pID;
					";

		
		$update_post_query = mysqli_query($connection, $query);
		
		if (! $update_post_query) {
			die("QUERY FAILED" . mysqli_error($connection));
		}
		
}
?>



<form action="" method="post" id="post_form" enctype="multipart/form-data">
 
  <div class="form-group">
  
	<label for="post_title">Post Title</label>
	
	<input value="<?php echo $post_title?>" type="text" class="form-control" id="title" name="post_title" placeholder="Enter Post Title">
	
  </div>
  
  
  <div class="form-group">
  
	<label for="post_cat_id">Post Category ID</label>
	<br>
	
	<select name="post_category" id="post_category">
		
		<?php 
	
		CategorySelect();
		
	
		?>
		
		
	</select>
	
  </div>
  
  <div class="form-group">
  
	<label for="post_author">Post Author</label>
	
	<input value="<?php echo $post_author;?>" type="text" class="form-control" id="post_author" name="post_author">
	
  </div>
  
  <select name="post_status" id="" value=""> 
		<option value="<?php echo $post_status;?>"><?php echo $post_status; ?></option>
	<?php
	
		if ($post_status == 'Draft')
		{
			echo "<option value='Published'>Published</option>";
		}
		else {
			echo "<option value='Draft'>Draft</option>";
		}
		
	
	?>
	</select>
    
  <div class="form-group">
  	<label for="post_status">Post Image</label><br>
	<img src="../images/<?php echo $post_image;?>" width="300px" alt="">
	<br>
	<input type="file" id="post_image" name="post_image">
  </div>
  
  <div class="form-group">
  
	<label for="post_tags">Post Tags</label>
	
	<input value="<?php echo $post_tags;?>" type="text" class="form-control" id="post_tags" name="post_tags">
	
  </div>
  
  <div class="form-group">
  
	<label for="post_content">Post Content</label>
	
	<textarea class="form-control" form="post_form" name="post_contents" id="post_content" cols ="30" rows="10"><?php echo $post_content;?></textarea>
	
  </div>
  
  
  
  <input name="update_post" type="submit" class="btn btn-primary" value="Publish Post">
</form>