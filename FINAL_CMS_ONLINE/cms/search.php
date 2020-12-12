<?php 
include("include/db.php");
include("include/header.php");
session_start();
 ?>


    <!-- Navigation -->
   <?php 
    include("include/navigation.php");
    ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
  
               <?php 
                    

                 if (isset($_POST['submit'])) {
                     $search= escapecontact($_POST['search']); 
                     $query= "SELECT * FROM posts WHERE username LIKE '%$search%'"; 
                     $search_query=mysqli_query($connect,$query);
                     if (!$search_query) {
                        die('No data found in the database');
                         }
                          $count=mysqli_num_rows($search_query);
                        if ($count==0) {
                            echo ' <h1 class="text-center btn-info">Aucun résultat n\'a été trouvé</h1>';
                            
                       
                         } else {

                while ($row=mysqli_fetch_assoc($search_query)) {
                       $post_id=$row['post_id'];
                       $username=$row['username'];
                       $post_title=$row['post_title'];
                       $post_author=$row['post_author'];
                       $post_date=$row['post_date'];
                       $post_image=$row['post_image'];
                       $post_content=$row['post_content'];
                     ?>  
                    
                <!-- First Blog Post -->
                
                <p class="lead">
                    Par <a href="index.php"><?php echo $username;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content ;?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Laissez un commentaire <span class="glyphicon glyphicon-chevron-right"></span></a>
  
            <?php } 
                         }
                    
                 } ?>    
                
                 
              

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php 
            include("include/sidebar.php");
             ?>
            
        
        </div>
        </div>
        <!-- /.row -->

       

       <?php 
include("include/footer.php");
        ?>
