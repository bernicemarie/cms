<?php include('include/header_admin.php');
$id=$_GET['id'];
$query="select * from categories where cat_id=".$id;
$count=mysqli_query($connect,$query);
$result=mysqli_fetch_assoc($count); 
?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include("include/navigation_admin.php");?>;
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bienvenue dans le monde du code!
                            <small>L'amour des code!</small>
                        </h1>
                           <div class="col-xs-6">
                                
                                <form action="edition_cat" method="POST">
                                  
                                 <label >Edition</label>
                                         <input type="text" name="cat_title" class="form-control" value="<?php echo $result['cat_title'];?>">
                                         <input type="hidden" name="cat_id" class="form-control" value="<?php echo $result['cat_id'];?>">
                                    
                                        <button type="submit"  class="btn btn-primary">Mise à Jour Categorie</button>
                                       
                                
                               </form>
                           </div>   </div>                  
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
     <script type="text/javascript" src="js/editescript.js"></script>
  <script type="text/javascript" src="js/delscript.js"></script>
  

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
