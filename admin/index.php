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
							CMS ADMIN
							<small>Welcome <?php echo $_SESSION['username'];?></small>
                        </h1>
					</div> 	
						       
                <!-- /.row -->
                
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-file-text fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
								  		<div class='huge'>
										
										
<?php

							$query = "SELECT * FROM posts WHERE post_status = 'Published'";
							$select_all_post = mysqli_query($connection,$query);
							echo $post_count = mysqli_num_rows($select_all_post);
							
											
?>
											
											
											
										
										</div>
										<div>Posts</div>
									</div>
								</div>
							</div>
							<a href="posts.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-comments fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
									 <div class='huge'>
										
										
										<?php

										$query = "SELECT * FROM comments";
										$select_all_comments = mysqli_query($connection,$query);
										echo $comment_count = mysqli_num_rows($select_all_comments);
							
										?>
								  </div>
									  <div>Comments</div>
									</div>
								</div>
							</div>
							<a href="comments.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-user fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
									<div class='huge'>
										
										<?php

										$query = "SELECT * FROM users";
										$select_all_users = mysqli_query($connection,$query);
										echo $user_count = mysqli_num_rows($select_all_users);

										?>
										
										</div>
										<div> Users</div>
									</div>
								</div>
							</div>
							<a href="users.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-list fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class='huge'>
											
											
											<?php

											$query = "SELECT * FROM categories";
											$select_all_cats = mysqli_query($connection,$query);
											echo $category_count = mysqli_num_rows($select_all_cats);
							
											?>
												
											
										</div>
										 <div>Categories</div>
									</div>
								</div>
							</div>
							<a href="categories.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
				</div>
								<!-- /.row -->
                        
                        
                        <?php
					
							$query = "SELECT * FROM posts WHERE post_status = 'Draft'";
							$select_all_draftPost = mysqli_query($connection,$query);
							$draft_count = mysqli_num_rows($select_all_draftPost);
					
							$comments_query = "SELECT * FROM comments WHERE comment_status = 'Approved'";
							$select_all_approved = mysqli_query($connection,$query);
							$approved_count = mysqli_num_rows($select_all_draftPost);
							
							$comments_query = "SELECT * FROM comments WHERE comment_status = 'Unapproved'";
							$select_all_unapproved = mysqli_query($connection,$query);
							$unapproved_count = mysqli_num_rows($select_all_draftPost);
						
					
						?>
                    
                    
                    <div class="row d-flex ">
						<div class="col-lg-12 ">
							<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
							<script type="text/javascript">
							  google.charts.load('current', {'packages':['bar']});
							  google.charts.setOnLoadCallback(drawChart);

							  function drawChart() {
								var data = google.visualization.arrayToDataTable([
								  ['Data', 'Count',],
									
									<?php 
									
									$element_text = ['Categories','Users', 'Active Posts','Draft Posts','Approved Comments','Unapproved Comments'];
									
									$element_count = [$category_count, $user_count,$post_count, $draft_count, $approved_count, $unapproved_count];
									
									for ($i = 0; $i < 6; $i++) {
										echo "['{$element_text[$i]}'" . "," . " {$element_count[$i]}],";
									}
									
									?>
								]);

								var options = {
								  chart: {
									title: '',
									  subtitles: '',
								  }
								};

								var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

								chart.draw(data, google.charts.Bar.convertOptions(options));
							  }
							</script>
						</div>
						<div id="columnchart_material" style="padding-left: 20px; width: 95%; display:inline-block; height: 500px;"></div>

                    	
                    </div>
                    
                    
                    
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    

<?php include "includes/adminFooter.php";?>