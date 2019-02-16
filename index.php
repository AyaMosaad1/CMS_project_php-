<?php include "include/db.php"; ?> 
<!DOCTYPE html>
<html lang="en">




  <!-- header -->
 <?php include "include/header.php"; ?>
  <body>

    <!-- Navigation -->
   <?php include "include/navigation.php"; ?>
   
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
                <div class="col-md-8">

 <?php
# after write my search and enter
if (isset($_POST['submit'])){ 

#my word which I want to search in Variable
$search = $_POST['search']; 

#to find the search from post_tags
#Query to connect with database 
$query ="SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
#send query to database
$search_query = mysqli_query($connection,$query);

if (!$search_query){
    
    die("QUERY FAILED" . mysqli_error($connection));
}
$count = mysqli_num_rows ($search_query);

if ($count == 0){
   echo "<h1> NO RESULT </h1>";
} else {
       echo "<h1>SOME RESULT</h1>";
}
}      
  





#to display from sql
if (isset($_GET['p_id']))
{
    $the_post_id = $_GET['p_id'];
}








$query ="SELECT * FROM posts";
#send query to database
$index_query = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($index_query)) {
$post_id = $row['post_id'];  
$post_title = $row['post_title'];
$post_author = $row['post_author'];
$post_date   = $row['post_date'];
$post_image = $row['post_image'];
$post_content = substr($row['post_content'],0,100);
$post_status = $row['post_status'];



if ($post_status !== 'publishied')
{
echo "<h1 class='text_center'> no post SORRY </h1>";
}
else
 {

    ?>

                 <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                     <a href='?p_id= <?php $post_id ?>'> <?php echo "$post_title";?> </a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo "$post_author";?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo "$post_date";?> at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo "$post_content";?>.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
<?php } ?>
 <?php
 #it is belong to else 
  }?>



                    <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>




                <!-- Side Widget Well -->
<?php include "include/sidebar.php"; ?>
</div>
        <!-- /.row -->


 <!-- Blog Comments -->
<?php 


if (isset($_POST['create_comment'])) {
$the_post_id = $_GET['p_id'];
$comment_author = $_POST['comment_author'];
$comment_email = $_POST['comment_email'];
$comment_content = $_POST['comment_content'];

$query ="INSERT INTO comments(comment_post_id ,comment_author,comment_email,comment_content,comment_status, comment_date)";
 
$query .="VALUES ($the_post_id ,'{$comment_author}','{$comment_email}','{$comment_content}','unapproved' , now())";

$create_comment_query = mysqli_query($connection,$query);
if(!$create_comment_query)
{
    die('QUERY FAILED' . mysqli_error($connection));

}
$query = "UPDATE posts SET post_comment_count = post_comment_count + 1";
$query.= "WHERE post_id = $the_post_id";
$update_comment_count = mysqli_query ($connection , $query);
}

?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>


                    <form role="form" action="" method="post" >

               <div class="form-group">
                <label for="Author"> Author </label>
                            <input type="text" name="comment_author"class="form-control" >
                        </div>


 <div class="form-group">
                <label for="Email"> Email </label>
                            <input type="email" name="comment_email"class="form-control" >
                        </div>


                        <div class="form-group">
                               <label for="comment"> Your comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>

                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
<?php
$query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id ";
$query .= " AND comment_status ='approved' ";
# to put the newest comment in top
$query .= "ORDER BY comment_id DESC ";

$select_comment_query = mysqli_query($connection,$query);
if (!$select_comment_query){ 
die ('Query Failed' . mysqli_error($connection));
}
while ($row = mysqli_fetch_assoc($select_comment_query)) {
    $comment_date = $row['comment_date'];
    $comment_content = $row['comment_content'];
    $comment_author = $row['comment_author'];
?>


  <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <?php
                           echo $comment_author;
                            ?>
                            <small>
                            <?php
                              echo $comment_date;
                            ?>
                            </small>
                        </h4>
                           <?php
                           echo $comment_content;
                            ?>
                    </div>
                </div>
<?php
}
?>


   <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
            </div>
        <hr>


    <!-- /.footer -->
      <?php include "include/footer.php"; ?>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
