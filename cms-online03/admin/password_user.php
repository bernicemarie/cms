<?php 
   if (isset($_POST['update'])) {
     $nouveau=escape($_POST['nouveau']);
     $compte=$_POST['compte'];
     $confirm=escape($_POST['confirm']);
     if ($nouveau==$confirm) {
       $nouveau=password_hash($nouveau,PASSWORD_BCRYPT, array('cost'=>12));
       $query="UPDATE users SET user_password='$nouveau' WHERE user_email='$compte'";
       $result_query=mysqli_query($connect,$query);
       if (!$result_query) {
         die('Mise à jour impossible du mot de pass '.mysqli_error($connect));
       }
       echo '<h2 class="text-center"><span style="color: red">Mot de pass bien modifié</span></h2>';
     }
     else
     {
      echo "<script type='text/javascript'>
  alert('Les champs doivent être identiques');
</script>
";
     }
   }

 ?>  
    <div class="container">
              
                <div class="row">
                  
                          <form action="" method="POST">
                           <div class="col-xs-6">
                                   
                                 <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">compte<span class="required">*</span></label>
                      <div class="col-lg-10">
                          <select name="compte" id="" class="form-control">
                            <?php 
                             $query= "SELECT * FROM users";
                             $result_query= mysqli_query($connect,$query);
                             while ($row=mysqli_fetch_assoc($result_query)) {
                               $user_email=$row['user_email'];
                               $username=$row['username'];
                               
                                 echo"<option value='$user_email'>$username | $user_email</option>";
                              
                             
                                }
                             ?>
                         </select>
                      </div>
                    </div>   
                                
                           </div> 
                           <div class="col-xs-6">          
                                 
                                    <div class="form-group">
                                 <label for="cat_title" class="control-label col-xs-4">Nouveau<span class="required">*</span></label>
                                   <input  type="password" name="nouveau" class="form-control" required>
                                   </div>
                                    <div class="form-group">
                                 <label for="cat_title" class="control-label col-xs-4">Confirmer<span class="required">*</span></label>
                                   <input  type="password" name="confirm" class="form-control" required>
                                   </div>
                           
                                         <div class="form-group">
                                           <button  type="submit"  class="btn btn-primary" name="update">Mise à Jour</button>
                                          <button  type="reset"  class="btn btn-danger" >Annuler</button>
                                       </div>

                           </div>                  
                          </form>                
                    
                      
                </div>

                <!-- /.row -->

      
            <!-- /.container-fluid -->

    
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    
