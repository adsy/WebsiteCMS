

<table class="table table-primary table-bordered table-hover ">
	<thead>
		<tr class="bg-danger">
			<th>ID</th>
			<th>Author</th>
			<th>Comment</th>
			<th>Email</th>
			<th>Status</th>
			<th>In Response to</th>
			<th>Date</th>
			<th>Approve</th>
			<th>Disapprove</th>
			<th>Delete</th>
		</tr>
		<tbody>
			<tr>
				<?php DisplayCommentsData();?>
				
			</tr>
		</tbody>
	</thead>
</table>




<?php 

if (isset($_GET['approve'])){
	
	$comment_id = $_GET['approve'];
 	ApproveComments($comment_id);
}

if (isset($_GET['disapprove'])){
	
	$comment_id = $_GET['disapprove'];
	DisapproveComments($comment_id);
}


if (isset($_GET['delete'])){
	
	$comment_id = $_GET['delete'];
	DeleteComments($comment_id);
}

?>