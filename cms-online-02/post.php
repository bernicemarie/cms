<?php include('loggedin.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php session_start(); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Goundo</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            <!-- Collect the nav links, forms, and other content for toggling -->
             
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">            
<?php 
include("include/db.php");
include("include/header.php");
 ?>


    <!-- Navigation -->
   <?php 
    include("include/navigation.php");
    ?>

<?php

 if(isset($_POST['liked'])) {

     $post_id = $_POST['post_id'];
     $user_id = $_POST['user_id'];

      //1 =  FETCHING THE RIGHT POST

     $query = "SELECT * FROM posts WHERE post_id=$post_id";
     $postResult = mysqli_query($connect, $query);
     $post = mysqli_fetch_array($postResult);
     $likes = $post['likes'];

     // 2 = UPDATE - INCREMENTING WITH LIKES

     mysqli_query($connect, "UPDATE posts SET likes=$likes+1 WHERE post_id=$post_id");

     // 3 = CREATE LIKES FOR POST

     mysqli_query($connect, "INSERT INTO likes(user_id, post_id) VALUES($user_id, $post_id)");
     exit();


 }



 if(isset($_POST['unliked'])) {



     $post_id = $_POST['post_id'];
     $user_id = $_POST['user_id'];

     //1 =  FETCHING THE RIGHT POST

     $query = "SELECT * FROM posts WHERE post_id=$post_id";
     $postResult = mysqli_query($connect, $query);
     $post = mysqli_fetch_array($postResult);
     $likes = $post['likes'];

     //2 = DELETE LIKES

     mysqli_query($connect, "DELETE FROM likes WHERE post_id=$post_id AND user_id=$user_id");


     //3 = UPDATE WITH DECREMENTING WITH LIKES

     mysqli_query($connect, "UPDATE posts SET likes=$likes-1 WHERE post_id=$post_id");

     exit();


 }



 ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

               <?php 
               if (isset($_GET['p_id'])) {
                $the_post_id=$_GET['p_id'];
                   
                $query2="UPDATE posts SET posts_views_count=posts_views_count+1 WHERE post_id=$the_post_id"; 
                $result_pots_views_count=mysqli_query($connect,$query2);
                if (!$result_pots_views_count) {
                    die('errrrorrrr'.mysqli_error($connect));
                }
                $query= "SELECT * FROM posts where post_id=$the_post_id";
                $result= mysqli_query($connect,$query);
                while ($row=mysqli_fetch_assoc($result)) {
                       $post_title=$row['post_title'];
                       $post_author=$row['post_author'];
                       $post_date=$row['post_date'];
                       $post_image=$row['post_image'];
                       $post_content=$row['post_content'];
                     ?>  
                    
                <!-- First Blog Post -->
                <h2>
                    <a href="index.php"><?php echo $post_title ;?></a>
                </h2>
                <p class="lead">
                    Postée par<a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="Aucune image n'est disponible">
                <hr>
                <p><?php echo $post_content ;?></p>

               <hr>
                
                 
            <?php } 
        
        } else{

            header(("Location:index.php"));
        }
        ?>    
       <?php

                if(isLoggedIn()){ ?>
                    <div class="row">
                        <p class="pull-right"><a
                                class="<?php echo userLikedThisPost($the_post_id) ? 'unlike' : 'like'; ?>"
                                href=""><span class="glyphicon glyphicon-thumbs-up"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="<?php echo userLikedThisPost($the_post_id) ? ' I liked this before' : 'Want to like it?'; ?>"
                                ></span>
                                <?php echo userLikedThisPost($the_post_id) ? ' Unlike' : ' Like'; ?>
                            </a></p>
                    </div>

              <?php  } else { ?>

                    <div class="row">
                        <p class="pull-right login-to-post">Connectez-Vous <a href="login.php">Login</a> pour aimer </p>
                    </div>
                <?php }
                 ?>
              <div class="row">
                    <p class="pull-right likes">Like: <?php getPostlikes($the_post_id); ?></p>
                </div>

                 <div class="clearfix"></div>

<?php

?>

                  <?php 

                  if (isset($_POST['envoyer'])) {
                    $comment_post_id=$the_post_id=$_GET['p_id'];
                      $username=$_SESSION['username'];
                      $comment_author=$_POST['comment_author'];
                      $comment_email=$_POST['comment_email'];
                      
                      $comment_date=$_POST['comment_date'];
                      $comment_content=$_POST['comment_content'];
                      $comment_author=mysqli_real_escape_string($connect,$comment_author);
                      $comment_email=mysqli_real_escape_string($connect,$comment_email);
                      $comment_content=mysqli_real_escape_string($connect,$comment_content);
                    
                    if (!empty($comment_author) && !empty($comment_email) && !empty($comment_date) && !empty($comment_content)) {
                        $insert= "INSERT INTO comments(comment_post_id,username,comment_author,comment_email,comment_content,comment_date)
                   VALUES ($comment_post_id,'$username','$comment_author','$comment_email','$comment_content','$comment_date')";
                  $query=mysqli_query($connect,$insert);
                  if (!$query) {
                      die('Contactez votre Administrateur'.mysqli_error($connect));
                  }
                        
                         $query2="UPDATE posts SET post_comment_count=post_comment_count+1 WHERE post_id=$the_post_id"; 
                
                        $result_comment_count=mysqli_query($connect,$query2);
                        
                    }
                    else{
                   
                   echo" <script type='text/javascript'> 
                      alert('Merci de remplir tous les champs');
                      </script>";
                    }


                }
                      
            
                  
                   ?>
                <div class="well">
                    <h4>Laissez un commentaire:</h4>
                    <form role="form" action="" method="POST">
                         <div class="form-group">
                             <label for="comment_author" class="control-label col-lg-4">Nom <span class="required">*</span></label>
                             <input type="text" name="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                             <label for="cemaile" class="control-label col-lg-4">Adresse Electronique <span class="required">*</span></label>
                             <input type="email" name="comment_email" class="form-control" >
                        </div>
                       
                        
                        <div class="form-group">
                            <label for="comment_date" class="control-label col-lg-4">Date <span class="required">*</span></label>
                             <input type="date" name="comment_date" class="form-control">
                        </div>
                         <div class="form-group">
                             <label for="comment_content" class="control-label col-lg-4">Commentaire<span class="required">*</span></label>
                            <textarea name ="comment_content" class="form-control" rows="3" cols="3" class="form-control" id="body" maxlength="15"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php 

                $query= "SELECT * FROM comments WHERE comment_post_id=$the_post_id 
                and comment_status= 'Approuve' order by comment_id DESC";
                $select_comment_query=mysqli_query($connect,$query);
                if (!$select_comment_query) {
                    die("Contactez l'administrateur principal de l'application".mysqli_error($connect));
                }
                while ($row=mysqli_fetch_assoc($select_comment_query)) {
                    $comment_date= $row['comment_date'];
                    $comment_author= $row['comment_author'];
                    $comment_content= $row['comment_content'];
                
                 ?>
                   <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>

                </div>


                 <?php } ?>   
                <!-- Comment -->
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php 
            include("include/sidebar.php");
             ?>
            
        
        </div>
        </div>
        <!-- /.row -->

        <hr>

       <?php 
include("include/footer.php");
        ?>
 


 <script>
            $(document).ready(function(){

                  $("[data-toggle='tooltip']").tooltip();
                    var post_id = <?php echo $the_post_id; ?>;
                    var user_id = <?php echo loggedInUserId(); ?>;

                // LIKING

                $('.like').click(function(){
                    $.ajax({
                        url: "post.php?p_id=<?php echo $the_post_id; ?>",
                        type: 'post',
                        data: {
                            'liked': 1,
                            'post_id': post_id,
                            'user_id': user_id
                        }
                    });
                });

                // UNLIKING

                $('.unlike').click(function(){

                    $.ajax({

                        url: "post.php?p_id=<?php echo $the_post_id; ?>",
                        type: 'post',
                        data: {
                            'unliked': 1,
                            'post_id': post_id,
                            'user_id': user_id

                        }


                    });

                });





            });




        </script>



                <!-- Blog Comments -->

                <!-- Comments Form -->

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                

                <!-- Blog Categories Well -->
                 

                <!-- Side Widget Well -->
                

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../cms/admin/js/texteditor.js"></script>

</body>

</html>
