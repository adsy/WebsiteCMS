

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
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<tbody>
			<tr>
				<?php DisplayPostsData();?>
				
			</tr>
		</tbody>
	</thead>
</table>




<?php 

if (isset($_GET['delete'])){
	$post_id = $_GET['delete'];
	DeletePosts($post_id);
}

?>