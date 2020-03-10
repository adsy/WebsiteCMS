<?php include "includes/adminHeader.php";?>


<body>

    <div id="wrapper">

       <?php include "includes/adminNav.php";?>

       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                           
                       	
                           
					   	<h1 class="page-header">
							CMS ADMIN <br>
							<small>Website Dashboard</small>
                        </h1>
                        
                        <div class="col-xs-6">
                        
                        
                        <?php 
							if(isset($_POST['submit'])){
								
								$cat_title = $_POST['cat_title'];
								
								
								if ($cat_title == "" || empty($cat_title)) {
									echo "<span class='badge'>This field must not be empty.</span><br><br>";
								}
								else
								{
									$query = "INSERT INTO categories(cat_title) ";
									$query .= "VALUE('{$cat_title}') ";
									
									$create_cat = mysqli_query($connection,$query);
									
									if (!$create_cat) {
										die('QUERY FAILED' . mysqli_error($connection));
									}
								}
								
							}
	
						?>
                        
                        
							<form action="" method="post">
 							
	 							<div class="form-group">
	 								<h4><label for="cat-title" class="">Add Category</label></h4>
	 								<input class="form-control" type="text" name="cat_title">
	 								
	 							</div>
	 							<div class="form-group">
	 							
	 								<input class="btn btn-warning" type="submit" name="submit" value="Add Category">
	 								
	 							</div>
	 							
							</form>
						</div>
                        
                        <div class="col-xs-6">
                        	
                        	<table class="table table-primary table-bordered table-hover ">
                        		<thead>
                        			<tr class="bg-danger">
                        				<th>ID</th>
                        				<th>Category Title</th>
                        				<th>REMOVE CATEGORY</th>
                        			</tr>
                        		</thead>
                        		<tbody>
								<!-- Adds Data from DB into table fields -->
                        		<?php
                        			GetCategoriesData();
								?>
                      		
                      		<?php
							
								if (isset($_GET['delete'])) {
									DeleteCategory($_GET['delete']);
									
								}
									
							?>
                       		
                        		</tbody>
                        	</table>
                        	
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
     
<?php include "includes/adminFooter.php";?>