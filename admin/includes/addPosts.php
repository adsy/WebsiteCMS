
<?php 

	if (isset($_POST['create_post'])) {
		
		$post_title = $_POST['post_title'];
		$post_category = $_POST['post_category'];
		$post_author = $_POST['post_author'];
		$post_status = 'Draft';
		
		$post_image = $_FILES['post_image']['name'];
		$post_image_temp = $_FILES['post_image']['tmp_name'];
		
		$post_content = $_POST['post_contents'];
		$post_tags = $_POST['post_tags'];
		$post_date = date('d-m-y');
		$post_comment_count = 0;
		
		move_uploaded_file($post_image_temp, "../images/$post_image");
		
		$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
		$query .= "VALUES ('{$post_category}','{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";
		
		$create_post = mysqli_query($connection,$query);

		if (!$create_post) {
			die('QUERY FAILED' . mysqli_error($connection));
		}
		
	}
	
?>


<form action="" method="post" id="post_form" enctype="multipart/form-data">
 
  <div class="form-group">
  
	<label for="post_title">Post Title</label>
	
	<input type="text" class="form-control" id="title" name="post_title" placeholder="Enter Post Title">
	
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
	
	<input type="text" class="form-control" id="post_author" name="post_author">
	
  </div>
    
  <div class="form-group">
  
	<label for="post_image">Post Image</label>
	<br>
	<input type="file" class="form-control" id="post_image" name="post_image">
	<br>
  </div>
  
  <div class="form-group">
  
	<label for="post_tags">Post Tags</label>
	
	<input type="text" class="form-control" id="post_tags" name="post_tags">
	
  </div>
  
  <div class="form-group">
  
	<label for="post_content">Post Content</label>
	
	<textarea class="form-control" form="post_form" name="post_contents" id="post_content" cols ="30" rows="10"></textarea>
	
  </div>
  
  
  
  <input name="create_post" type="submit" class="btn btn-primary" value="Publish Post">
</form>