<?php 
if (isset($_GET['pers_id'])) {
    $pers_id=$_GET['pers_id'];
}
 $query=" SELECT * FROM personne WHERE id=$pers_id";
                                             $result=mysqli_query($connect,$query);
                                             while($row=mysqli_fetch_assoc($result)){
                                                  $id=$row['id'];
                                                  $matricule=$row['matricule'];
                                                  $nom=$row['nom'];
                                                  $prenom=$row['prenom'];
                                                  $sexe=$row['sexe'];
                                                  $fonction=$row['fonction'];
                                                  $telephone=$row['telephone'];
                                                  $site=$row['site'];
                                                  $chambre=$row['chambre'];
                                                  $matela=$row['matela'];
                                                  $lit=$row['lit'];
                                                  }

if (isset($_POST['editer'])) {
     $matricule=$_POST['matricule'];
     $nom=$_POST['nom'];
     $prenom=$_POST['prenom'];
     $sexe=$_POST['sexe'];
     $fonction=$_POST['fonction'];
     $telephone=$_POST['telephone'];
     $site=$_POST['site'];
     $chambre=$_POST['chambre'];
     $matela=$_POST['matela'];
     $lit=$_POST['lit'];
}
  $query_update="UPDATE personne SET 
  matricule='$matricule',
  nom='$nom',
  prenom='$prenom',
  sexe='$sexe',
  fonction='$fonction',
  telephone='$telephone',
  matela='$matela',
  lit='$lit',
  site='$site',
  chambre='$chambre'
   WHERE   id='$pers_id'";
 
   $result_update=mysqli_query($connect,$query_update);
   if (!$result_update) {
      die('Modification impossible');
   }
      echo "<p class='bg-success text-center'>Mise à jour effectuée</p>";
 ?>
   <form class="form-validate form-horizontal" action=""  method="POST" >
                          <div class="panel panel-info">
                                            <div class="panel-heading ui-draggable-handle">
                                                <h3 class="panel-title"><strong>Modification des données</strong></h3>
                                                
                                            </div>
                  <div class="col-md-5">  
                       <div class="row">
                       <div class="block">
                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Matricule <span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name= "matricule" type="text"  value="<?php echo $matricule ?>" class=" form-control"required />
                      </div>
                    </div>

                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Nom <span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input name="nom" type="text"  value="<?php echo $nom ?>" class=" form-control" required />
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Prenom<span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input name="prenom" type="text"  value="<?php echo $prenom ?>" class=" form-control" required />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-4">Sexe<span class="required">*</span></label>
                         <div class="col-lg-8">
                        <select name= "sexe"  class="form-control" id="formGender" required>
                                                
                                                <option  value="<?php echo $sexe;?>"><?php echo $sexe ;?></option>
                                                <?php 
                                                  if ($sexe=="Masculin") {
                                                      echo'<option value="Feminin">Feminin</option>';
                                                  }
                                                  else{
                                                       echo'<option value="Masculin">Masculin</option>';
                                                  }
                                                 ?>
                                            </select>        
                                           </div>
                                            </div>
                                            <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-4">Site<span class="required">*</span></label>
                         <div class="col-lg-8">
                        <select name= "site"  class="form-control" id="formGender" required>
                                                
                                                <option  value="<?php echo $site;?>"><?php echo $site ;?></option>
                                                <?php 
                                                  if ($site=="Site 1") {
                                                      echo'<option value="Site 2">Site 2</option>';
                                                  }
                                                  else{
                                                       echo'<option value="Site 1">Site 1</option>';
                                                  }
                                                 ?>
                                            </select>        
                                           </div>
                                            </div>
                    
                   </div>
                    </div>
                    </div>
                  <div class="col-md-5">  
                    <div class="row">
                    <div class="block">
                  
                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Fonction <span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="fonction" type="text"  value="<?php echo $fonction ?>" class=" form-control" required />
                      </div>
                    </div>
                       
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Telephone<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="telephone" type="text"  value="<?php echo $telephone ?>" class=" form-control" />
                      </div>
                    </div>  
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Chambre<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="chambre" type="text"  value="<?php echo $chambre ?>" class=" form-control" />
                      </div>
                    </div> 
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Dotation Matela<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="matela" type="date"  value="<?php echo $matela ?>" class=" form-control" />
                      </div>
                    </div> 
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Dotation Lit<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="lit" type="date"  value="<?php echo $lit ?>" class=" form-control" />
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
                                                 
                              <input type="submit" name="editer" value="Editer" class="btn btn-info">
                              <a href="liste_personnes.php" class="btn btn-danger">Retour</a>
                                          </div>

                        </div>
                    </div>
                  </form>
