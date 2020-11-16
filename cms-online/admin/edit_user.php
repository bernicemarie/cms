<?php 
if (isset($_GET['userid'])) {
  $the_user_id=$_GET['userid'];
}
 $query= "SELECT * FROM users WHERE user_id=$the_user_id";
 $result= mysqli_query($connect,$query);
 while ($row=mysqli_fetch_assoc($result)) {
    $nomcompte= $row['username'];
      $motdepass= $row['user_password'];
      $prenom= $row['user_firstname'];
      $nom= $row['user_lastname'];
      $adresse= $row['user_email'];
      $user_image=$row['user_image'];
      $role= $row['user_role'];
      
 }
 if (isset($_POST['update_user'])) {
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
     if (empty($user_image)) {
      $query= "SELECT * FROM users WHERE user_id=$the_user_id";
          $select_image=mysqli_query($connect,$query);
    while ($row=mysqli_fetch_assoc($select_image)) {
      $user_image=$row['user_image'];
    }
 }
 
 if (isset($_SESSION['user_role']) && $_SESSION['user_role']='admin') {
 $query_update= "UPDATE users SET username='$nomcompte',
  user_password='$motdepass', 
  user_firstname='$prenom',
 user_lastname='$nom'
 ,user_email='$adresse',
 user_image='$user_image',
 user_role='$role'
  WHERE user_id='$the_user_id'";
  $query_update_result= mysqli_query($connect,$query_update);
  if (!$query_update_result) {
    die("Pas de modification, contactez l'administrateur de l'application".mysqli_error($connect));
  }
      echo '<h2 class="text-center"><span style="color: red">Modification réalisée</span></h2>';
  }
   
   
 }
 ?>


<div class="block">                                                 
                <form class="form-validate form-horizontal" action=""  method="POST"  enctype="multipart/form-data">
                          <div class="panel panel-info">
                                            <div class="panel-heading ui-draggable-handle">
                                                <h3 class="panel-title"><strong>Modifier  un utilisateur</strong></h3>
                                                
                                            </div>
                  <div class="col-md-5">  
                       <div class="row">
                       <div class="block">
                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Nom Compte<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input  value="<?php echo $nomcompte;?>" name= "nomcompte" type="text" required class=" form-control"/>
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Mot de Passe<span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input  autocomplete="off"  name="motdepass" type="password" required class=" form-control" placeholder="Votre nouveau mot de pass" />
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Prenom<span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input  value="<?php echo $prenom;?>"  name="prenom" type="text" class=" form-control" required/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Nom <span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input  value="<?php echo $nom;?>"  name="nom" type="text" class="form-control" required/>
                      </div>
                    </div> 
                   </div>
                    </div>
                    </div>
                  <div class="col-md-5">  
                    <div class="row">
                    <div class="block">
                  
                        <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Adresse <span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input  value="<?php echo $adresse;?>"  name="adresse" type="email" class="form-control" required/>
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Image <span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input name="image" type="file" class="form-control">
                        <img width="100" src="../images/<?php echo $user_image;?>" alt="Image">
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Role<span class="required">*</span></label>
                      <div class="col-lg-8">
                        <?php 
                         ?>
                          <select name="role" id="" class="form-control" required>
    
                            <option value="<?php echo "$role";?>"><?php echo "$role";?></option>
                            <?php 
                           if ($role=='admin') {
                             echo"<option value='user'>User</option>";
                           }
                           else{
                              echo "<option value='admin'>Admin</option>";
                           }
                         ?>
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
                                                 
                              <input class="btn btn-primary" type="submit" name="update_user" value="Modifier"> 
                                <a href="index_admin.php" class="btn btn-danger">Rétour</a>
                                          </div>

                        </div>
                    </div>
                  </form>       
                 </div>   

