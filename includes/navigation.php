
<?php include "queries.php";?>
        
         <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
           
          
           
           
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                   
                   
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    
                    
                </button>
                <a class="navbar-brand" href="index.php">Adam's CMS Website</a>
            </div>
            
            
            
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   
                   
                   <?php
					//Add Categories as links into heeader
					GetCategoriesLink();
					
					
					?>
                   <li>
                  		<?php 
					   		
					   		if (isset($_SESSION['role'])) {
								if ($_SESSION['role'] == 'Admin')
								{
									echo "<a href='admin'>ADMIN</a>";
								}
							}
					   		
					   	?>
                  		
                   		
                   </li>
                   
                    
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>