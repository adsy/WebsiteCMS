<?php
include "db.php";



//Function that grabs categories from DB and creates links for header.
function GetCategoriesLink () {
global $connection;
$query = "SELECT * FROM categories";
$all_categories = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($all_categories)) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

echo "<li>
		<a href='category.php?category={$cat_id}'>{$cat_title}</a>
	  </li>";
}
}

//Function that grabs categories from DB and creates table rows with data entries.
function DisplayCategoriesData () {
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
				<a style='color:white; text-decoration:none;'  href='categories.php?edit={$cat_id}'>Edit</a>
			</button>
		</td>
		<td>
			<button type='button' class='text-muted btn btn-danger'>
				<a style='color:white; text-decoration:none;'  href='categories.php?delete={$cat_id}'>Delete</a>
			</button>
		</td>
	  </tr>";
}
}

//Function that displays categories in select input field
function CategorySelect () {
global $connection;
$query = "SELECT * FROM categories";
$load_cats = mysqli_query($connection,$query);

if (!$load_cats) {
	die('QUERY FAILED' . mysqli_error($connection));
}

while($row = mysqli_fetch_assoc($load_cats)) {

$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
echo "<option value='{$cat_id}'>{$cat_title}</option>";
}
}

//Function that deletes categories from DB
function DeleteCategory ($getCatID) {
global $connection;
$query = "DELETE FROM categories WHERE cat_id = {$getCatID}";
$delete_query = mysqli_query($connection,$query);
header("Location: categories.php");
}

function AddCategory ($cat_title) {
global $connection;
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

//Function that loads the edit category form
function LoadEditCategory($cat_id) {
global $connection;
$query = "SELECT * FROM categories WHERE cat_id = $cat_id";
$load_cats = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($load_cats)) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];



echo "<input value='{$cat_title}' class='form-control' type='text' name='{cat_title}'>";

}	
}

//Function that updates category in DB.
function UpdateCategory ($catTitle,$cat_id) {
global $connection;
$query = "UPDATE categories SET cat_title = '{$catTitle}' WHERE cat_id = {$cat_id}";

$update_query = mysqli_query($connection,$query);

if (!$update_query) {
	die('QUERY FAILED' . mysqli_error($connection));
}
header("Location: categories.php");
}

//Function that grabs all posts from DB and adds to page.
function GetAllPosts () {
global $connection;
$query = "SELECT * FROM posts WHERE post_status = 'Published'";


$all_categories = mysqli_query($connection,$query);

if (mysqli_num_rows($all_categories) == 0) {
    echo '<h1>There are currently no posts.</h1>';
} 
	
    while($row = mysqli_fetch_assoc($all_categories)) {
	

		$post_id = $row['post_id'];
		$post_title = $row['post_title'];
		$post_author = $row['post_author'];
		$post_date = $row['post_date'];
		$post_image = $row['post_image'];
		$post_content = substr($row['post_content'],0,200);
		$post_tags = $row['post_tags'];
		$post_status = $row['post_status'];

			

				echo "  <h2>
						<a href='post.php?p_id={$post_id}'>{$post_title}   </a>
						</h2>
						<p class='lead>
							by <a href=''>{$post_author}</a>
						</p>
						<p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>
						<hr>
						<a href='post.php?p_id={$post_id}'><img class='img-responsive' src='images/{$post_image}' alt=''></a>
						<hr>
						<p>{$post_content}</p>
						<a class='btn btn-primary'' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

						<hr>";
	


}

	


}

function GetAllPostsByCat ($cat_ID) {
global $connection;
$query = "SELECT * FROM posts WHERE post_category_id = {$cat_ID}";


$all_categories = mysqli_query($connection,$query);

if (!$all_categories) {
	die('QUERY FAILED' . mysqli_error($connection));
}

while($row = mysqli_fetch_assoc($all_categories)) {
$post_id = $row['post_id'];
$post_title = $row['post_title'];
$post_author = $row['post_author'];
$post_date = $row['post_date'];
$post_image = $row['post_image'];
$post_content = substr($row['post_content'],0,200);
$post_tags = $row['post_tags'];

echo "<h2>
	  <a href='post.php?p_id={$post_id}'>{$post_title}</a>
	  </h2>
	  <p class='lead>
			by <a href=''>{$post_author}</a>
		</p>
		<p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date}</p>
		<hr>
		<a href='post.php?p_id={$post_id}'><img class='img-responsive' src='images/{$post_image}' alt=''></a>
		<hr>
		<p>{$post_content}</p>
		<a class='btn btn-primary'' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

		<hr>";
}

}

//Function that grabs single post
function GetPost ($pID) {
global $connection;
$query = "SELECT * FROM posts WHERE post_id = {$pID}";


$all_categories = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($all_categories)) {
$post_id = $row['post_id'];
$post_title = $row['post_title'];
$post_author = $row['post_author'];
$post_date = $row['post_date'];
$post_image = $row['post_image'];
$post_content = $row['post_content'];
$post_tags = $row['post_tags'];

echo "<h2>
	  <a href='post.php?p_id={$post_id}'>{$post_title}</a>
	  </h2>
	  <p class='lead>
			by <a href=''>{$post_author}</a>
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

//Function that adds post into DB from admin page
function AddPosts($post) {
global $connection;
$post_title = $post['post_title'];
$post_category = $post['post_cat_id'];
$post_author = $post['post_author'];
$post_status = $post['post_status'];

$post_image = $_FILES['post_image']['name'];
$post_image_temp = $_FILES['post_image']['tmp_name'];

$post_content = $post['post_contents'];
$post_tags = $post['post_tags'];
$post_date = date('d-m-y');
$post_comment_count = 4;

move_uploaded_file($post_image_temp, "../images/$post_image");

$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
$query .= "VALUES ('{$post_category}','{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";

$create_post = mysqli_query($connection,$query);

if (!$create_post) {
die('QUERY FAILED' . mysqli_error($connection));
}
}

//Function that deletes post in DB from admin page
function DeletePosts($post_id) {
global $connection;

$query = "DELETE FROM posts WHERE post_id = {$post_id}";

$delete_query = mysqli_query($connection,$query);
header("Location: posts.php");
}

function DisplayPostsData () {
global $connection;
$query = "SELECT * FROM posts";
$all_posts = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($all_posts)) {
$post_id = $row['post_id'];
$post_title = $row['post_title'];
$post_category = $row['post_category_id'];
$post_image = $row['post_image'];
$post_status = $row['post_status'];
$post_author = $row['post_author'];
$post_comment_count = $row['post_comment_count'];
$post_date = $row['post_date'];
$post_tags = $row['post_tags'];


$query = "SELECT * FROM categories WHERE cat_id = {$post_category}";

$category = mysqli_query($connection,$query);

if (!$category) {
	die('QUERY FAILED' . mysqli_error($connection));
}

while($row = mysqli_fetch_assoc($category)) {

	$cat_title = $row['cat_title'];
}


echo "<tr>
		<td>{$post_id}</td>
		<td>{$post_title}</td>
		<td>{$post_author}</td>
		<td>{$cat_title}</td>
		<td>{$post_status}</td>
		<td><img class='image-responsive'
		width='150' src='../images/$post_image'></td>
		<td>{$post_tags}</td>
		<td>{$post_comment_count}</td>
		<td>{$post_date}</td>

		<td>
			<button type='button' class='text-muted btn btn-success'>
				<a style='color:white; text-decoration:none;'  href='posts.php?publish={$post_id}'>Publish</a>
			</button>
		</td>
		<td>
			<button type='button' class='text-muted btn btn-warning'>
				<a style='color:white; text-decoration:none;'  href='posts.php?source=editPosts&p_id={$post_id}'>Edit</a>
			</button>
		</td>
		<td>
			<button type='button' class='text-muted btn btn-danger'>
				<a style='color:white; text-decoration:none;'  href='posts.php?delete={$post_id}'>Delete</a>
			</button>
		</td>
	  </tr>";
}
}

function ApprovePost($post_id) {
	global $connection;

	$query = "UPDATE posts SET post_status = 'Published' WHERE post_id = {$post_id}";
	echo $query;
	$approve_query = mysqli_query($connection,$query);

	if (!$approve_query) {
		die('QUERY FAILED' . mysqli_error($connection));
	}

		header("Location: posts.php");

}

function DisplayCommentsData () {
global $connection;
$query = "SELECT * FROM comments";
$all_comments = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($all_comments)) {
$comment_id = $row['comment_id'];
$comment_author = $row['comment_author'];
$comment_content = substr($row['comment_content'],0,200);
$comment_email = $row['comment_email'];
$comment_post_id = $row['comment_post_id'];
$comment_status = $row['comment_status'];
//		$comment_title = $row['comment_title'];

$comment_date = $row['comment_date'];


$postQuery = "SELECT * FROM posts WHERE post_id = $comment_post_id";




echo "<tr>
		<td>{$comment_id}</td>
		<td>{$comment_author}</td>
		<td>{$comment_content}</td>
		<td>{$comment_email}</td>
		<td>{$comment_status}</td>";


		echo "<td>";
	
		$post = mysqli_query($connection,$postQuery);
	
		while($row = mysqli_fetch_assoc($post)) {
			$post_id = $row['post_id'];
			
			$in_response = $row['post_title'];
			
			echo "<a href='../post.php?p_id={$post_id}'>$in_response</a>";
		
			echo "</td>";
		}

			echo "
		<td>{$comment_date}</td>


		<td>
			<button type='button' class='text-muted btn btn-success'>
				<a style='color:white; text-decoration:none;'  href='comments.php?approve={$comment_id}'>Approve</a>
			</button>
		</td>
		<td>
			<button type='button' class='text-muted btn btn-warning'>
				<a style='color:white; text-decoration:none;'  href='comments.php?disapprove={$comment_id}'>Disapprove</a>
			</button>
		</td>
		<td>
			<button type='button' class='text-muted btn btn-danger'>
				<a style='color:white; text-decoration:none;'  href='comments.php?delete={$comment_id}'>Delete</a>
			</button>
		</td>
	  </tr>";
}
}

//Function that deletes comments in DB from admin page
function DeleteComments($comment_id) {
global $connection;

$query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
echo $query;
$delete_query = mysqli_query($connection,$query);

if (!$delete_query) {
	die('QUERY FAILED' . mysqli_error($connection));
}
	
	header("Location: comments.php");
}

//Function that deletes comments in DB from admin page
function DisapproveComments($comment_id) {
global $connection;

$query = "UPDATE comments SET comment_status = 'Disapproved' WHERE comment_id = {$comment_id}";
echo $query;
$disapprove_query = mysqli_query($connection,$query);

if (!$disapprove_query) {
	die('QUERY FAILED' . mysqli_error($connection));
}
	
	header("Location: comments.php");
}

//Function that deletes comments in DB from admin page
function ApproveComments($comment_id) {
global $connection;

$query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = {$comment_id}";
echo $query;
$approve_query = mysqli_query($connection,$query);

if (!$approve_query) {
	die('QUERY FAILED' . mysqli_error($connection));
}
	
	header("Location: comments.php");
}





//User functions


function DisplayUserData () {
global $connection;
$query = "SELECT * FROM users";
$all_users = mysqli_query($connection,$query);

while($row = mysqli_fetch_assoc($all_users)) {
$user_id = $row['user_id'];
$username = $row['username'];
$password = $row['password'];
$firstName = $row['firstName'];
$lastName = $row['lastName'];
$email = $row['email'];
$image = $row['user_image'];
$role = $row['role'];





echo "<tr>
		<td>{$user_id}</td>
		<td>{$username}</td>
		<td>{$firstName}</td>
		<td>{$lastName}</td>
		<td>{$email}</td>
		<td>{$role}</td>
		<td><img class='image-responsive'
		width='150' src='../images/$image'></td>
	
		
	
		<td>
			<button type='button' class='text-muted btn btn-warning'>
				<a style='color:white; text-decoration:none;'  href='users.php?source=editUser&user_id={$user_id}'>Edit</a>
			</button>
		</td>
		
		
		<td>
			<button type='button' class='text-muted btn btn-danger'>
				<a style='color:white; text-decoration:none;'  href='users.php?delete={$user_id}'>Delete</a>
			</button>
		</td>
		
		
	  </tr>";
}
}

function DeleteUser($user_id) {
global $connection;

$query = "DELETE FROM users WHERE user_id = {$user_id}";

$delete_query = mysqli_query($connection,$query);

if (!$delete_query) {
	die('QUERY FAILED' . mysqli_error($connection));
}
	
	header("Location: users.php");
}


?>


