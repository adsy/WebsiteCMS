
<?php 

	if (isset($_POST['create_user'])) {
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$role = $_POST['role'];
		$user_image = $_FILES['user_image']['name'];
		$user_image_temp = $_FILES['user_image']['tmp_name'];
		
		move_uploaded_file($user_image_temp, "../images/$user_image");
		
		$query = "INSERT INTO users(username, password, firstName, lastName, email, user_image, role) ";
		$query .= "VALUES ('{$username}','{$password}', '{$firstName}', '{$lastName}', '{$email}', '{$user_image}', '{$role}' )";
		
		$create_user = mysqli_query($connection,$query);

		if (!$create_user) {
			die('QUERY FAILED' . mysqli_error($connection));
		}
		
		echo "<h2>User Created: $username</h2><br>";
		
	}
	
?>


<form action="" method="post" id="post_form" enctype="multipart/form-data">
 
  <div class="form-group">
  
	<label for="username">Username</label>
	
	<input type="text" class="form-control" id="username" name="username">
	
  </div>
  
  
  <div class="form-group">
  
	<label for="password">Password</label>
	<br>
	
	<input type='password' class='form-control' name='password'>
	
  </div>
  
  <div class="form-group">
  
	<label for="email">Email</label>
	
	<input type="text" class="form-control" id="email" name="email">
	
  </div>
  
  <div class="form-group">
  
	<label for="firstName">First Name</label>
	
	<input type="text" class="form-control" id="firstName" name="firstName">
	
  </div>
    
  <div class="form-group">
  
	<label for="lastName">Last Name</label>
	
	<input type="text" class="form-control" id="lastName" name="lastName">
	
  </div>
  
  <div class="form-group">
  
	<label for="role">Role</label><br>
	
	<select name="role" id="">
		<option value="Admin">Admin</option>
		<option value="User">User</option>
	</select>
	
  </div>
    
  <div class="form-group">
  
	<label for="user_image">User Image</label>
	<br>
	<input type="file" class="form-control" id="user_image" name="user_image">
	<br>
  
  
  
  
  <input name="create_user" type="submit" class="btn btn-primary" value="Add User">
</form>