<?php
if (isset($_GET['p_id']))
{
$the_post_id = $_GET['p_id'];
}
$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$select_posts_by_id = mysqli_query($connection,$query);


#to display from sql and take key from sql
while($row = mysqli_fetch_assoc($select_posts_by_id)) {
	$post_id=  $row['post_id'];
    $post_title = $row['post_title'];
	$post_author=  $row['post_author'];
	$post_category_id=  $row['post_category_id'];
	$post_status=  $row['post_status'];
	$post_image=  $row['post_image'];
	$post_tags= $row['post_tags'];
	$post_date=  $row['post_date'];
	$post_content=  $row['post_content'];
	$post_comment_count=  $row['post_comment_count'];

#take keys from form 
if (isset($_POST['update_post'])) {
	$post_title = $_POST['title'];
	$post_author= $_POST['author'];
	$post_category_id= $_POST['post_category_id'];
	$post_status= $_POST['post_status'];
	$post_tags=$_POST['post_tags'];
	$post_content=$_POST['post_content'];

/*move_uploaded_file($post_image_temp,"../images/$post_image");
}

if(empty($post_image)){
$quary = "SELECT * FROM posts WHERE post_id = $the_post_id ";
$select_image = mysqli_query($connection , $quary);
while($row = mysqli_fetch_assoc($select_image)) {
	$post_image =  $row['post_image'];
}*/


$query ="UPDATE posts SET";
$query .= "post_title = '{$post_title}', ";
$query .= "post_category_id = '{$post_category_id}', ";
$query .= "post_date = now(), ";
$query .= "post_author = '{$post_author}', ";
$query .= "post_status = '{$post_status}', ";
$query .= "post_tags= '{$post_tags}', ";
$query .= "post_content = '{$post_content}' ";
//$quary .= "post_image = '{$post_image}' ";
$query .= "WHERE post_id = {$the_post_id} ";

$update_post = mysqli_query($connection,$query);
confirmQuery($update_post);
}
}

?>
<div class="container">
	<div class="row">
		<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title"> Post Title </label>
		<input type="text" name="title" class="form-control">
	</div>

	<div class="form-group">
		<select name="post_category" id="">
			<?php
$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection,$query);

#to display from sql
while($row = mysqli_fetch_assoc($select_categories)) {
	$cat_id=  $row['cat_id'];
    $cat_title= $row['cat_title'];
    echo "<option value ='$cat_id'>{$cat_title}</option>";
    } 
?>
		</select>
		</div>


	<div class="form-group">
		<label for="author">Post Author</label>
		<input type="text" name="author" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_status">post status</label>
		<input type="text" name="post_status" class="form-control">
	</div>


	<div class="form-group">
		<label for="post_image">post Image</label>
		<input type="file" name="image" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" name="post_tags" class="form-control">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" class="form-control" id="" cols="30" rows="10"></textarea> 
	</div>

<div class="form-group">   
<input class="btn btn-primary" type="submit" name="create_post" value="create post">
    </div>

</form>
	</div>
</div>


