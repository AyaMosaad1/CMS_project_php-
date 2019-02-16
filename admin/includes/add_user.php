<?php
if(isset($_POST['create_user'])) {

	$user_firstname= $_POST['user_firstname'];
	$user_lastname= $_POST['user_lastname'];
	$user_role= $_POST['user_role'];
//	$post_image= $_FILES['image']['name'];
//$post_image_temp=$_FILES['image']['tmp_name'];
	$username=$_POST['username'];
	$user_email=$_POST['user_email'];
	$user_password=$_POST['user_password'];
	//$post_date = date ('d-m-y');


//for images  
/*move_uploaded_file($post_image_temp,"../images/$post_image");

*/
$query = "INSERT  INTO  users ( user_firstname, user_lastname , user_role , username , user_email ,user_password )";

//use '' in strings only
$query .= "VALUES('{$user_firstname}', '{$user_lastname}' , '{$user_role}' ,'{$username}', '{$user_email}', '{$user_password }')";
$create_user_query = mysqli_query($connection,$query );

if (!$create_user_query)
{
    die('QUERY FAILED' . mysqli_error($connection));
}

/*
$query = "UPDATE posts SET post_comment_count = post_comment_count + 1";
$query .= "WHERE post_id = $the_post_id ";
$update_comment_count = mysqli_query($connection,$query);
*/
}



?>

<div class="container">
	<div class="row">
		<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">First Name </label>
		<input type="text" name="user_firstname" class="form-control">
	</div>

	<div class="form-group">
		<label for="user_lastname">Last Name</label>
		<input type="text" name="user_lastname" class="form-control">
	</div>


	<div class="form-group">
		<select name="user_role" id="">
	<option value="subsciber">select option </option>
	<option value="admin"> Admin </option>
	<option value="subsciber"> subsciber </option>

		</select>
		</div>



<!--	<div class="form-group">
		<label for="post_image">user Image</label>
		<input type="file" name="image" class="form-control">
	</div>
-->
	<div class="form-group">
		<label for="post_tags">Username</label>
		<input type="text" name="username" class="form-control">
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="user_email" class="form-control">
	</div>


	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="user_password" class="form-control">
	</div>

	

<div class="form-group">   
<input class="btn btn-primary" type="submit" name="create_user" value="Add user">
    </div>

</form>
	</div>
</div>

