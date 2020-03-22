<div class="col-md-4">


	
	
	<!-- Login -->
	<div class="well">

		<?php 
		if (isset($_SESSION['username'])) {
			echo "<h3>Welcome ";
			echo $_SESSION['username'];
			echo "</h3>
				  <form action='includes/logout.php' method=
				  'post'>
				  <button type='submit' name='submit' class='btn btn-primary'>Logout</button>
				  </form>
				  ";
						
		}
		else {
			echo " <h4>Login</h4>
		<form action='includes/login.php' method=
	  'post'>
		  <div class='form-group'>
			<label for='exampleInputEmail1'>Username</label>
			<input name='user' type='text' class='form-control'  placeholder='Enter Username'>
				
		  </div>
		  <div class='form-group'>
			<label for='password'>Password</label>
			<input type='password' name='pass' class='form-control' placeholder='Enter Password'>
		  </div>
			  
			
			<button type='submit' name='submit' class='btn btn-primary'>Login</button>
	   </form>";
		}
			
		?>
		
		<!-- /.input-group -->
	</div>






	<!-- Blog Search Well -->
	<div class="well">
		<h4>Blog Search</h4>
		<form action="search.php" method="post">
			<div class="input-group">
				<input name="search" type="text" class="form-control">
				<span class="input-group-btn">
					<button name="submit" class="btn btn-default" type="submit">
						<span class="glyphicon glyphicon-search"></span>
				</button>
				</span>
			</div>
	   </form>
		<!-- /.input-group -->
	</div>
	
	
	



	<!-- Blog Categories Well -->
	<div class="well">





		<h4>Blog Categories</h4>
		<div class="row">
			<div class="col-lg-12">
				<ul class="list-unstyled">
					<?php

					GetCategoriesLink();

					?>	
				</ul>
			</div>
			<!-- /.col-lg-6 -->
		</div>
		<!-- /.row -->
	</div>





	<!-- Side Widget Well -->
	<div class="well">
		<h4>Side Widget Well</h4>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
	</div>





</div>