<?php
include "db.php";



//Function that grabs categories from DB and creates links for header.
function GetCategoriesLink () {
	global $connection;
	$query = "SELECT * FROM categories";
	$all_categories = mysqli_query($connection,$query);
	
	while($row = mysqli_fetch_assoc($all_categories)) {
		$cat_title = $row['cat_title'];
		
		echo "<li>
              	<a href='#'>{$cat_title}</a>
              </li>";
	}
}

//Function that grabs categories from DB and creates table rows with data entries.
function GetCategoriesData () {
	global $connection;
	$query = "SELECT * FROM categories";
	$all_categories = mysqli_query($connection,$query);
	
	while($row = mysqli_fetch_assoc($all_categories)) {
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		
		echo "<tr>
				<td>{$cat_id}</td>
				<td>{$cat_title}</td>
				<td>
					<button type='button' class='text-muted btn btn-warning'>
						<a style='color:white; text-decoration:none;'  href='categories.php?delete={$cat_id}'>Delete</a>
					</button>
				</td>
			  </tr>";
	}
}

//Function that deletes categories from DB
function DeleteCategory ($getCatID) {
	global $connection;
	$query = "DELETE FROM categories WHERE cat_id = {$getCatID}";
	$delete_query = mysqli_query($connection,$query);
	header("Location: categories.php");
}

//Function that grabs all posts from DB and adds to page.
function GetAllPosts () {
	global $connection;
	$query = "SELECT * FROM posts";
	
	
	$all_categories = mysqli_query($connection,$query);
	
	while($row = mysqli_fetch_assoc($all_categories)) {
		$post_title = $row['post_title'];
		$post_author = $row['post_author'];
		$post_date = $row['post_date'];
		$post_image = $row['post_image'];
		$post_content = $row['post_content'];
		$post_tags = $row['post_tags'];
		
		echo "<h2>
              <a href='#'>{$post_title}</a>
              </h2>
              <p class='lead>
                    by <a href='index.php'>{$post_author}</a>
                </p>
                <p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>
                <hr>
                <img class='img-responsive' src='images/{$post_image}' alt=''>
                <hr>
                <p>{$post_content}</p>
                <a class='btn btn-primary'' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

                <hr>";
	}

}

//Function that searches DB for search tags similar to text inputted into search box
function SearchPosts($searchText) {
	global $connection;
	
	$query = "SELECT * FROM posts WHERE post_tags LIKE '%$searchText%' ";
					
	$search_query = mysqli_query($connection,$query);
	
	if (!$search_query) {
		die("query failed " . mysqli_error($connection));
	}
	
	$count = mysqli_num_rows($search_query);
	
	if($count == 0) {
		echo "<h1> NO RESULTS FOUND </h1>";
	}
	else
	{
		while($row = mysqli_fetch_assoc($search_query )) {
		$post_title = $row['post_title'];
		$post_author = $row['post_author'];
		$post_date = $row['post_date'];
		$post_image = $row['post_image'];
		$post_content = $row['post_content'];
		$post_tags = $row['post_tags'];
		
		echo "<h2>
              <a href='#'>{$post_title}</a>
              </h2>
              <p class='lead>
                    by <a href='index.php'>{$post_author}</a>
                </p>
                <p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>
                <hr>
                <img class='img-responsive' src='images/{$post_image}' alt=''>
                <hr>
                <p>{$post_content}</p>
                <a class='btn btn-primary'' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

                <hr>";
	}
	}
}



?>