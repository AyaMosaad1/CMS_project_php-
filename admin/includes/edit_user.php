<?php
if (isset($_GET['edit_user']))
{
$the_user_id = $_GET['edit_user'];

$query = "SELECT * FROM users WHERE user_id = $the_user_id";
$select_users_by_id = mysqli_query($connection,$query);


#to display from sql and take key from sql
while($row = mysqli_fetch_assoc($select_users_by_id)) {
	$user_id= $row['user_id'];
	$user_firstname= $row['user_firstname'];
	$user_lastname= $row['user_lastname'];
	$user_role= $row['user_role'];
//	$post_image= $_FILES['image']['name'];
//$post_image_temp=$_FILES['image']['tmp_name'];
	$username=$row['username'];
	$user_email=$row['user_email'];
	$user_password=$row['user_password'];
//$post_date = date ('d-m-y');
}
}
#take keys from form 
if (isset($_POST['edit_user'])) {
	$user_firstname= $_POST['user_firstname'];
	$user_lastname= $_POST['user_lastname'];
	$user_role= $_POST['user_role'];
//	$post_image= $_FILES['image']['name'];
//$post_image_temp=$_FILES['image']['tmp_name'];
	$username=$_POST['username'];
	$user_email=$_POST['user_email'];
	$user_password=$_POST['user_password'];

$query ="UPDATE users SET ";
$query .= "user_firstname= '{$user_firstname}', ";
$query .= "user_lastname = '{$user_lastname}', ";
//$quary .= "post_date = now(), ";
$query .= "user_role = '{$user_role}', ";
$query .= "username = '{$username}', ";
$query .= "user_email= '{$user_email}', ";
$query .= "user_passwordt = '{$user_password}' ";
//$quary .= "post_image = '{$post_image}' ";
$query .= "WHERE user_id = {$the_user_id} ";

$update_user = mysqli_query($connection,$query);
//confirmQuery($update_user);

}
?>


<div class="container">
	<div class="row">
		<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">First Name </label>
		<input type="text" value="<?php echo $user_firstname;   ?>" name="user_firstname" class="form-control">
	</div>

	<div class="form-group">
		<label for="user_lastname">Last Name</label>
		<input type="text" name="user_lastname" value="<?php echo $user_lastname; ?>"  class="form-control">
	</div>


	<div class="form-group">
		<select name="user_role" id="">
	<option value="subsciber"><?php echo $user_role ?> </option>

	<?php  
if($user_role == 'admin')
{
	echo 	"<option value='subsciber'> subsciber </option>";
}
else
{
echo "<option value='admin'> Admin </option>";
}

	?>

		</select>
		</div>



<!--	<div class="form-group">
		<label for="post_image">user Image</label>
		<input type="file" name="image" class="form-control">
	</div>
-->
	<div class="form-group">
		<label for="post_tags">Username</label>
		<input type="text" name="username" value="<?php echo $username;   ?>"  class="form-control">
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="user_email"  value="<?php echo $user_email;   ?>" class="form-control">
	</div>


	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" value="<?php echo $user_password; ?>" name="user_password" class="form-control">
	</div>

	

<div class="form-group">   
<input class="btn btn-primary" type="submit" name="edit_user" value="edit user">
    </div>

</form>
	</div>
</div>
