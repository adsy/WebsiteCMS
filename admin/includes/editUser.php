
<?php 

	if (isset($_GET['user_id'])) {
		$userID = $_GET['user_id'];
		
		
		
		$query = "SELECT * FROM users WHERE user_id = $userID ";
		
		global $connection;
		$select_user = mysqli_query($connection,$query);
	
		while($row = mysqli_fetch_assoc($select_user)) {
			$user_id = $row['user_id'];
			$username = $row['username'];
			$password = $row['password'];
			$firstName = $row['firstName'];
			$lastName = $row['lastName'];
			$email = $row['email'];
			$role = $row['role'];
			$user_image = $row['user_image'];
			
			
		}
		
	}

	if (isset($_POST['edit_user'])) {
		$userID = $_GET['user_id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$role = $_POST['role'];
		$user_image = $_FILES['user_image']['name'];
		$user_image_temp = $_FILES['user_image']['tmp_name'];
		
		move_uploaded_file($user_image_temp, "../images/$user_image");
		
		if (empty($user_image)) {
			$query = "SELECT * FROM users WHERE user_id = $userID";
			$select_image = mysqli_query($connection,$query);
			
			while ($row = mysqli_fetch_array($select_image)){
				$user_image = $row['user_image'];
			}
		}
		
		$query = "
					UPDATE users 
					   SET username = '$username'
						 , password = '$password'
						 , firstName = '$firstName'
						 , lastName = '$lastName'
						 , email = '$email'
						 , user_image = '$user_image'
						 , role = '$role' 
					 WHERE user_id = $userID;
					";
		
		$update_user = mysqli_query($connection,$query);

		if (!$update_user) {
			die('QUERY FAILED' . mysqli_error($connection));
		}
		
		header("Location: users.php");
		
	}
	
?>


<form action="" method="post" id="post_form" enctype="multipart/form-data">
 
  <div class="form-group">
  
	<label for="username">Username</label>
	
	<input value="<?php echo $username;?>" type="text" class="form-control" id="username" name="username" placeholder="Enter Post Title">
	
  </div>
  
  
  <div class="form-group">
  
	<label for="password">Password</label>
	<br>
	
	<input value="<?php echo $password;?>"  type='password' class='form-control' name='password'>
	
  </div>
  
  <div class="form-group">
  
	<label for="email">Email</label>
	
	<input value="<?php echo $email;?>"  type="text" class="form-control" id="email" name="email">
	
  </div>
  
  <div class="form-group">
  
	<label for="firstName">First Name</label>
	
	<input value="<?php echo $firstName;?>"  type="text" class="form-control" id="firstName" name="firstName">
	
  </div>
    
  <div class="form-group">
  
	<label for="lastName">Last Name</label>
	
	<input value="<?php echo $lastName;?>"  type="text" class="form-control" id="lastName" name="lastName">
	
  </div>
  
  <div class="form-group">
  
	<label for="role">Role</label><br>
	
	<select name="role" id="" value=""> 
		<option value="<?php echo $role;?>"><?php echo $role; ?></option>
	<?php
	
		if ($role == 'Admin')
		{
			echo "<option value='User'>User</option>";
		}
		else {
			echo "<option value='Admin'>Admin</option>";
		}
		
	
	?>
	</select>
	
  </div>
    
  <div class="form-group">
  
	<label for="user_image">User Image</label>
	<br>
	<img src="../images/<?php echo $user_image;?>" width="300px" alt="">
	<input type="file" class="form-control" id="user_image" name="user_image">
	<br>
  
  
  
  
  <input name="edit_user" type="submit" class="btn btn-primary" value="Edit User">
</form>