<!-- Blog Sidebar Widgets Column -->
           
  <div class="col-md-4">
               <?php
               /*

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
    
    echo"SOME RESULT";
}      
}
 
       */ 
        ?>



                <!-- search -->
                <div class="well">
                    <h4>Blog search </h4>
                    <form action="search.php" method="post" class= "form-group">

                    <div class="form-group">
                        <input name= "search" type="text" class="form-control" >
                    </div>


<div class="form-group">
      <span class="input-group-btn">
                            <button class="btn btn-primary" name="search" type="submit">search</button>
                        </span>
</div>
                    </form> <!--search form-->
                    <!-- /.input-group -->
                </div>


                <!-- login -->
                <div class="well">
                    <h4>Blog login </h4>
                    <form action="include/login.php" method="post" class= "form-group">

                    <div class="form-group">
                        <input name= "username" type="text" class="form-control" placeholder = "Enter username">
                    </div>

                      <div class="form-group">
                        <input name= "password" type="password" class="form-control" placeholder = "Enter password">
                    </div> 
                 <div class="form-group">
                  <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="submit">login</button>
                        </span>
                  </div>
                    </form> <!--search form-->
                    <!-- /.input-group -->
                </div>


<!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">

                                <?php 

#to DISPLAAAY from sql
                                $query = "SELECT * FROM categories";
                                $select_all_categories_query = mysqli_query($connection ,$query);
                                while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                                    $cat_title = $row['cat_title'];
                                    echo  "<li><a href '#'>{$cat_title}</a></li>";
                                }

                                ?>

                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>


        <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

</div>

       