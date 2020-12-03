<?php include("include/header_admin.php");?>

    <div id="wrapper">
        <!-- Navigation -->
       <?php include("include/navigation_admin.php");?>;
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

            <h1 class="page-header">
                            Bienvenue dans Goundo
                            <small><?php echo $_SESSION['username'] ."  ". $_SESSION['user_lastname']  ?></small>
                        </h1>

             <?php 
                if (isset($_GET['source'])) {
                  $source= $_GET['source']; 
                }
                else{
                  $source="";
                }

                 switch ($source) {
                   case 'add_post';
                     echo include("add_post.php");
                     break;
                    case 'edit_post';
                    echo include("edit_post.php");
                     break;
                   default:
                     include("view_all_posts.php");
                     break;
                 }





              ?>

                   
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <link rel="stylesheet"  href="css/styleloader.css">
    <link rel="stylesheet" type="text/css" href="../css/mycss.css">
     <script type="text/javascript" src="js/texteditor.js"></script>
     <script type="text/javascript" src="js/selectAll.js"></script>
     <script type="text/javascript" src="js/edit_cat.js"></script>
    <script type="text/javascript" src="js/del_cat.js"></script>
     <script type="text/javascript" src="js/approuve_post.js"></script>
    <script type="text/javascript" src="js/desapprouve_post.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
