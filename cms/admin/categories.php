<?php include("include/header_admin.php");
 
 if (isset($_POST['envoyer'])) {
  $cat_title=$_POST['cat_title'];
  $query= "INSERT INTO categories(cat_title) VALUES('$cat_title')";
  $result= mysqli_query($connect,$query);
  if (!$result) {
    die('Aucune insertion possible'.mysqli_error($connect));
  }
 }
?>
<?php 
if (isset($_GET['ide'])) {
 $the_cat_id=$_GET['ide'];
 $query="SELECT * FROM categories WHERE cat_id=$the_cat_id";
$result=mysqli_query($connect,$query);
$count=mysqli_num_rows($result);
while ($row=mysqli_fetch_array($result)) {
  $cat_id=$row['cat_id'];
  $cat_title=$row['cat_title'];
}
}

if (isset($_POST['update'])) {
$cat_title=$_POST['cat_title'];
$query_update_cat= "UPDATE categories SET cat_title='$cat_title' WHERE cat_id=$the_cat_id";
$query_update_cat_result= mysqli_query($connect,$query_update_cat);
if (!$query_update_cat_result) {
  die('Pas de modification possible'.mysqli_error($connect));
}

}

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
                            Bienvenue dans le monde du code
                            <small><?php echo $_SESSION['user_firstname'] ."  ". $_SESSION['user_lastname']  ?></small>
                        </h1>
                           <div class="col-xs-6">
                               <form action="" method="POST">
                                   <div class="form-group">
                                 <label for="cat_title" class="control-label col-xs-4">Category<span class="required">*</span></label>
                                       <input type="text" name="cat_title" class="form-control" required>

                                   </div>
                                    <div class="form-group">
                                        <button type"submit" name="envoyer"  class="btn btn-primary">Ajouter</button>
                                        <button type= "reset"   class="btn btn-danger">Annuler</button>
                                        
                                   </div>
                               </form>
                                <form action="" method="POST">
                                   
                                   <div class="form-group">
                                 <label for="cat_title" class="control-label col-xs-4">Edition<span class="required">*</span></label>
            <input value="<?php if (isset($cat_title)) {echo $cat_title;};?>" type="text" name="cat_title" class="form-control">
                                   </div>
                           
                                    <div class="form-group">
                                    <button  type="submit"  class="btn btn-primary" name="update">Mise à Jour Categorie</button>
                                    <button  type="reset"  class="btn btn-danger" >Annuler</button>
                                   </div>
                               </form>
                           </div> 
                           <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                      $query= "SELECT * FROM categories";
                                      $result=mysqli_query($connect,$query);
                                      while ($row=mysqli_fetch_assoc($result)) {
                                               echo "<tr>";
                                         $cat_id=$row['cat_id'];
                                         $cat_title=$row['cat_title'];
                                    echo "<td> $cat_id</td>";
                                    echo "<td> $cat_title</td>";
                                    echo "<td><a onclick='_edite(event)' class='btn btn-primary' href='categories.php?ide=$cat_id'>Editer</a></td>";
                                    echo "<td><a onclick='_edite(event)' class='btn btn-danger' href='categories.php?id=$cat_id'>Supprimer</a></td>";
                                         echo "<tr>";
                                    
                                  }
                                    if (isset($_GET['id'])) {
                                      $the_cat_id=mysqli_real_escape_string($connect,$_GET['id']);
                                      $query="DELETE FROM categories WHERE cat_id=$the_cat_id";
                                      $result=mysqli_query($connect,$query);
                                      if (!$result) {
                                        die('eeeeerrrrooooorrrr'.mysqli_error($connect));
                                      }
                                      
                                      
                                      else{
                                        header("Location:categories.php");
                                      }
                                    }
                                     

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

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
     <script type="text/javascript" src="js/edit_cat.js"></script>
  <script type="text/javascript" src="js/del_cat.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
