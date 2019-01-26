 <table class="table table-bordered table-hover text-center" >
        <thead>
            <tr>
                <th class="text-center"> Id </th>
                <th class="text-center"> Author </th>
                <th class="text-center"> Title</th>
                <th class="text-center"> Category </th>
                <th class="text-center"> Status </th>
                <th class="text-center"> Image </th>
                <th class="text-center"> Tags </th>
                <th class="text-center"> comments </th>
                <th class="text-center">Date</th>
            </tr>
        </thead>
   <tbody> 
     <tr>

<?php
$query = "SELECT * FROM posts";
$select_posts = mysqli_query($connection,$query);
#to display from sql
while ($row = mysqli_fetch_assoc($select_posts)) {
$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_category_id = $row['post_category_id'];
$post_status = $row['post_status'];
$post_image = $row['post_image'];
$post_tags = $row['post_tags'];
$post_comment_count= $row['post_comment_count'];
$post_date = $row['post_date'];
echo  "  <tr>";
echo  " <td>$post_id </td>";
echo  " <td>$post_author </td>";
echo  " <td>$post_title </td>";



$query = "SELECT * FROM categories WHERE cat_id ={$post_category_id} ";
$select_categories_id = mysqli_query($connection,$query);
#to display from sql
while ($row = mysqli_fetch_assoc($select_categories_id )) {
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];

echo  " <td>{$cat_title}</td>";
}

echo  " <td>$post_category_id </td>";
echo  " <td>$post_status </td>";
echo  " <td><img class = 'img-responsive' src ='../images/$post_image' alt = 'image'</td>";
echo  " <td>$post_tags </td>";
echo  " <td>$post_comment_count </td>";
echo  " <td>$post_date </td>";
echo  " <td><a href ='posts.php?delete={$post_id}'> DELETE </a> </td>";
echo  " <td><a href ='posts.php?source=edit_post&p_id={$post_id}'> EDIT </a> </td>";
echo  "  </tr>";
}
?>
      <td>10</td>
       <td> Aya Mosaad </td>
        <td>Bootstrap framework</td>
         <td> Bootstrap </td>
          <td> Status</td>
           <td> Image</td>
            <td> Tags </td>
             <td> Comments </td>
              <td>Date </td>
      </tr>
   </tbody>
    </table>
    <?php
    if (isset($_GET['delete'])) {
     $the_post_id = $_GET['delete'];
     $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
     $delete_query = mysqli_query($connection,$query);
    }
    ?>