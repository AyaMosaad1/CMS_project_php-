<?php  
include "includes/admin_header.php";
?>

    <div id="wrapper">
        <!-- Navigation -->
        <?php
 include "includes/admin_navigation.php";
        ?>

       
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome at Admin page.
                            <small>Anthor</small>
                        </h1>
<div class="col-xs-6">

<?php
insertCategory();
?>

<form action="" method="post">
    <div class="form-group">  
        <label class="lead" for="cat_title"> Add Category</label>
<input class="form-item" type="text" name="cat_title">
    </div>


      <div class="form-group">   
<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
    </div>
</form>

   <?php  //UPDATE CATEGORY 
   if (isset($_GET['edit'])) {
       $cat_id = $_GET['edit'];
      include "includes/update_category.php";
  }
     ?>
      

</div><!--Add category Form -->



<div class="col-xs-6">  
    <table class="table table-bordered table-hover text-center" >
        <thead>
            <tr>
                <th class="text-center"> ID </th>
                <th class="text-center">category Title</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
<?php
findAllCategories ();
deleteCategory ();

?>
  
        </tbody>
    </table>
</div>

                    </div>
                </div>
                <!-- /.row -->

            </div>


      <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php
include "includes/admin_footer.php";
   ?> 
   