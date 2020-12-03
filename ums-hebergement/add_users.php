<?php 
if (isset($_POST['ajouter'])) {
      
     $nom=escape($_POST['nom']);
     $prenom=escape($_POST['prenom']);
     $role=escape($_POST['role']);
     $compte=escape($_POST['compte']);
     $password=escape($_POST['password']);
     $password=password_hash($password,PASSWORD_BCRYPT, array('cost'=>12));
      if (verification($compte)) {
       $message="Ces informations existent déjà, le champ compte doit être unique!  <a href='liste_users.php'>Voir la liste</a>";
    }

       else if
    (!empty($compte) ) {
     $query="INSERT INTO users (nom,prenom,compte,password,role)
      VALUES ('$nom','$prenom','$compte','$password','$role')";
     $result=mysqli_query($connect,$query);
     if (!$result) {
      die('errorrr');

     }
       $message="Vous avez été enregistré(e) avec succès <a href='liste_users.php'>Voir la liste</a>
";
}
 else{ 
     $message="Aucun champ ne doit être vide!";

    }
}else{
    $message="";
  }
 ?>
   <h2 class="text-center" style="color: red"><?php echo $message; ?></h2>
   <form class="form-validate form-horizontal" action=""  method="POST" >
                          <div class="panel panel-info">
                                            <div class="panel-heading ui-draggable-handle">
                                                <h3 class="panel-title"><strong>Ajouter un utilisateur</strong></h3>
                                                
                                            </div>
                  <div class="col-md-5">  
                       <div class="row">
                       <div class="block">
                      

                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Nom <span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input name="nom" type="text" class=" form-control" required />
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Prenom<span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input name="prenom" type="text" class=" form-control" required />
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Compte <span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="compte" type="text" class=" form-control" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-4">role<span class="required">*</span></label>
                         <div class="col-lg-8">
                        <select name= "role"  class="form-control" id="formGender" required>
                                                <option value="">Choisissez</option>
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                            </select>        
                                           </div>
                                            </div>
                                             <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Mot de pass<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="password" type="text" class=" form-control" />
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
                                                 
                              <input type="submit" name="ajouter" value="Ajouter" class="btn btn-info">
                              <input type="reset" value="Annuler" class="btn btn-danger">
                                          </div>

                        </div>
                    </div>
                  </form>
