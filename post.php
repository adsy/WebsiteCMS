
<?php include "includes/header.php";?>


<!-- Navigation -->
<?php 

include "includes/navigation.php";

?>

<!-- Page Content -->
<div class="container">

<div class="row">

<!-- Blog Entries Column -->
<div class="col-md-8">

	<h1 class="page-header pb-5">
		Example CMS Website by Adam Brittain <br>
		<small>PHP, Bootstrap</small>
	</h1>

	<!-- First Blog Post -->


	<?php

	if(isset($_GET['p_id'])) {
		$pID = $_GET['p_id'];
		GetPost($pID);
	}



	?>



	<!-- Blog Comments -->

	<!-- Comments Form -->
	<div class="well">
		<h4>Leave a Comment:</h4><br>
		<form action="" method="post" role="form">
		   <div class="form-group">
			   <label for="comment_author">Author</label>
				<input class="form-control" type="text" name="comment_author">
			</div>

		   <div class="form-group">
			   <label for="comment_email">Email</label>
				<input class="form-control"  type="email" name="comment_email">
			</div>

			<div class="form-group">
			   <label for="Comment">Comment</label>
				<textarea name="comment_content" class="form-control" rows="3"></textarea>
			</div>

			<button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
		</form>
	</div>

	<hr>

	<?php 


	if(isset($_POST['create_comment'])) {
		//Get from URL
		$pID = $_GET['p_id'];
	
		
		
		$comment_author = $_POST['comment_author'];
		$comment_email = $_POST['comment_email'];
		$comment_content = $_POST['comment_content'];

		$query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
		
		$query .= " VALUES ({$pID},'{$comment_author}', '{$comment_email}', '$comment_content', 'Unapproved', now() )";
		
		
		$add_comment = mysqli_query($connection,$query);
		
		if (! $add_comment) {
			die("QUERY FAILED" . mysqli_error($connection));
		}
		
		$update_count = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = {$pID}";
		
		$update = mysqli_query($connection,$update_count);
		
		
		
		
		
	}

	?>

	<!-- Posted Comments -->
	
	<?php
	
	$pID = $_GET['p_id'];
	
	$query = "SELECT * FROM comments WHERE comment_post_id = {$pID} ";
	$query .= "AND comment_status = 'Approved' ";
	$query .= "ORDER BY comment_id DESC ";
	
	
	$select_comment_query = mysqli_query($connection,$query);
	
	if (! $select_comment_query) {
		die("QUERY FAILED" . mysqli_error($connection));
	}
	
	while ($row = mysqli_fetch_assoc($select_comment_query)) {
		$comment_date = $row['comment_date'];
		$comment_content = $row['comment_content'];
		$comment_author = $row['comment_author'];
		
		echo "<div class='media'>
		<a class='pull-left' href='#'>
			<img class='media-object' src='#' alt=''>
		</a>
		<div class='media-body'>
			<h4 class='media-heading'>{$comment_author}
				<small>{$comment_date}</small>
			</h4>
			{$comment_content}
		</div>
	</div>";
	}
	
	?>

	<!-- Comment -->
	

	<!-- Comment -->
	


</div>

<!-- Blog Sidebar Widgets Column -->
<?php 

include "includes/sidebar.php"

?>



</div>
<!-- /.row -->

<hr>

<?php include "includes/footer.php"; ?>