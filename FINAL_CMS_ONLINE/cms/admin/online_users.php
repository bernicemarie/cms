<?php include("include/header_admin.php");
 
?>

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
                   case 'add_use';
                     include("add_use.php");
                     break;
                     
                   default:
                     include("view_online_users.php");
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
     <script type="text/javascript" src="js/edit_comment.js"></script>
    <script type="text/javascript" src="js/del_comment.js"></script>
   

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
