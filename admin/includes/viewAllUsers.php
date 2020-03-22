

<table class="table table-primary table-bordered table-hover ">
	<thead>
		<tr class="bg-danger">
			<th>ID</th>
			<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Role</th>
			<th>Avatar</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<tbody>
			<tr>
				<?php DisplayUserData();?>
				
			</tr>
		</tbody>
	</thead>
</table>




<?php 


if (isset($_GET['delete'])){
	
	$user_id = $_GET['delete'];
	DeleteUser($user_id);
}

?>