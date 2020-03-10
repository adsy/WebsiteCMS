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
                    Search Results <br>
                    <small>PHP, Bootstrap</small>
                </h1>

                <!-- First Blog Post -->
                
                
				<?php
				
				if (isset($_POST['submit'])) {
					
					$search = $_POST['search'];

					SearchPosts($search);
					
				}
				?>
                
                
                
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php 
			
			include "includes/sidebar.php"
			
			?>
            
            

        </div>
        <!-- /.row -->

        <hr>
        
       <?php include "includes/footer.php"; ?>