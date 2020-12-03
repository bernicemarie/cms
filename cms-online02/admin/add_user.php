<?php 
  if (isset($_POST['ajout_user'])) {
      $nomcompte= $_POST['nomcompte'];
      $motdepass= $_POST['motdepass'];
      $prenom= $_POST['prenom'];
      $nom= $_POST['nom'];
      $adresse= $_POST['adresse'];
      $user_image=$_FILES['image']['name'];
    $user_image_temp=$_FILES['image']['tmp_name'];
    $role= $_POST['role'];
    $motdepass=password_hash($motdepass,PASSWORD_BCRYPT, array('cost'=>12));
     
     
    move_uploaded_file($user_image_temp,"../images/$user_image");
    $query="INSERT INTO users (username,user_password,user_firstname, user_lastname,user_email,user_image,user_role) VALUES('$nomcompte','$motdepass','$prenom','$nom','$adresse','$user_image','$role')";
    $result=mysqli_query($connect,$query);
    if (!$result) {
      die('Contactez votre Administrateur'.mysqli_error($connect));
    }
    
      echo "<h2 class='text-center  btn-danger'>Utilisateur crée:". " ". "<a href='users.php'>Voir utilisateurs</a></h2> ";
    
       
  }

 ?>





<div class="block">                                                 
                <form class="form-validate form-horizontal" action=""  method="POST"  enctype="multipart/form-data">
                          <div class="panel panel-info">
                                            <div class="panel-heading ui-draggable-handle">
                                                <h3 class="panel-title"><strong>Ajouter un utilisateur</strong></h3>
                                                
                                            </div>
                  <div class="col-md-5">  
                       <div class="row">
                       <div class="block">
                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Nom Compte<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name= "nomcompte" type="text" class=" form-control"/>
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Mot de Passe<span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input name="motdepass" type="text" class=" form-control"  />
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Prenom<span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input name="prenom" type="text" class=" form-control" />
                      </div>
                    </div>
                     
                   </div>
                    </div>
                    </div>
                  <div class="col-md-5">  
                    <div class="row">
                    <div class="block">
                  

                  <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Nom <span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input name="nom" type="text" class="form-control" />
                      </div>
                    </div>
                        <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Adresse <span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input name="adresse" type="email" class="form-control" />
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Image <span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input name="image" type="file" class="form-control" />
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Role<span class="required">*</span></label>
                      <div class="col-lg-8">
                         <select name="role" id="" class="form-control">
                           <option value="admin">Selectionnez un rôle</option>
                           <option value="admin">Admin</option>
                           <option value="user">User</option>
                         </select>
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
                        <div class="col-md-6">

                           <div class="modal-footer">
                                                 
                              <input class="btn btn-primary" type="submit" name="ajout_user" value="Ajouter"> 
                                <a href="index_admin.php" class="btn btn-danger">Rétour</a>
                                          </div>

                        </div>
                    </div>
                  </form>       
                 </div>   

