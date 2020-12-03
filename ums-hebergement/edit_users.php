<?php 
if (isset($_GET['users_id'])) {
    $users_id=$_GET['users_id'];

 $query=" SELECT * FROM users WHERE id=$users_id";
                                             $result=mysqli_query($connect,$query);
                                             while($row=mysqli_fetch_assoc($result)){
                                                  $id=$row['id'];
                                                  
                                                  $nom=$row['nom'];
                                                  $prenom=$row['prenom'];
                                                  $compte=$row['compte'];
                                                  $password=$row['password'];
                                                  $role=$row['role'];
                                                  
                                                  }
      if (isset($_POST['editer_user'])) {
     $nom=escape($_POST['nom']);
     $prenom=escape($_POST['prenom']);
     $role=escape($_POST['role']);
     $compte=escape($_POST['compte']);
     $password=escape($_POST['password']);
      $password=password_hash($password,PASSWORD_BCRYPT, array('cost'=>12));
     $query="UPDATE users SET nom='$nom',
     prenom='$prenom',
     role='$role',
     compte='$compte',
     password='$password' WHERE id='$users_id'";
     $result=mysqli_query($connect,$query);
      if (!$result) {
      die('Modification impossible');
   }
      header("Location:liste_users.php? Modification réalisée!");
       }
       }
 ?>
   <form class="form-validate form-horizontal" action=""  method="POST" >
                          <div class="panel panel-info">
                                            <div class="panel-heading ui-draggable-handle">
                                                <h3 class="panel-title"><strong>Modifier cet utilisateur</strong></h3>
                                                
                                            </div>
                  <div class="col-md-8">  
                       <div class="row">
                       <div class="block">
                      

                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Nom <span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input value="<?php echo $nom;?>" name="nom" type="text" class=" form-control" required />
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Prenom<span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input  value="<?php echo $prenom; ?>" name="prenom" type="text" class=" form-control" required />
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Compte <span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input  value="<?php echo $compte; ?>" name="compte" type="text" class=" form-control" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-4">role<span class="required">*</span></label>
                         <div class="col-lg-8">
                        <select name= "role"  class="form-control" id="formGender" required>
                              <option value="<?php echo $role; ?>" ><?php echo $role ?></option>
                                  <?php 
                                  if ($role=='Admin') {
                                     echo'<option value="User">User</option>';
                                  }
                                  else {
                                    echo' <option value="Admin">Admin</option>';
                                  }
                                   ?>
                                               
                                               
                                            </select>        
                                           </div>
                                            </div>
                                             <div class="form-group ">
                                  
                                  
                                
                      <label for="cemail" class="control-label col-lg-4">Mot de pass<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input autocomplete="off"  name="password" type="text" class=" form-control" />
                      </div>
                    </div> 
                                            
                    
                   </div>
                    </div>
                    </div>
                  

                    <div class="form-group">
                      <div class="col-lg-offset-5 col-lg-7">

 


                         
                      </div>
                    </div>
                    </div>
<div class="row">
                        <div class="col-md-12">

                           <div class="modal-footer">
                                                 
                              <input type="submit" name="editer_user" value="Modifier" class="btn btn-info">
                              <a href="liste_users.php" class="btn btn-danger">Annuler</a>
                             
                                          </div>

                        </div>
                    </div>
                  </form>
