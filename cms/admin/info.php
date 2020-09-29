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
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h1 class="text-center"><P>Cette application permet de partager nos souvenirs, tres simple à utiliser!</P></h1>
                                </div>
                            </div>

                        </div>
             
                   
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
    <script type="text/javascript" src="js/texteditor.js"></script>
     <script type="text/javascript" src="js/edit_comment.js"></script>
    <script type="text/javascript" src="js/del_comment.js"></script>
   

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
