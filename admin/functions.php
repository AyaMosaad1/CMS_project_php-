<?php

function confirmQuery($result)
{
if (!$result) {
die('QUERY FAILED' . mysqli_error($connection));
    }

	
}

function insertCategory()
{
global $connection;
 #to creat new category
if (isset($_POST['submit'])){
$cat_title = $_POST['cat_title'];

if($cat_title == "" || empty ($cat_title))
{
    echo "this field should not be empty";
}
 #isert date to query
$query = "INSERT  INTO  categories(cat_title) ";
$query .= "VALUE('{$cat_title}') ";
$create_category_query = mysqli_query($connection , $query );

if (!$create_category_query)
{
    die('QUERY FAILED' . mysqli_error($connection));
}
}
}

?>


<?php
function findAllCategories()
{
	global $connection;

$query = "SELECT * FROM categories";
$select_categories = mysqli_query($connection,$query);
#to display from sql
while ($row = mysqli_fetch_assoc($select_categories)) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
echo  "  <tr>";
echo  " <td>{$cat_id} </td>";
echo  " <td>{$cat_title} </td>";
echo  " <td><a href ='category.php?delete={$cat_id}'>Delete</a></td>";
echo  " <td><a href ='category.php?edit={$cat_id}'>Edit</a></td>";
echo  "  </tr>";
}

}
?>



<?php
function deleteCategory (){
global $connection;
if (isset($_GET['delete'])){
$the_cat_id =$_GET['delete']; 
$query = "DELETE FROM categories";
$query .= " WHERE cat_id ={$the_cat_id}";
$delete_query = mysqli_query( $connection , $query);
 //it is refreash the page 
header("Location: category.php");
}
}
?>

