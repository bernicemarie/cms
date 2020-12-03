<?php 
if (isset($_POST['ajouter'])) {
     $matricule=$_POST['matricule'];
     $nom=$_POST['nom'];
     $prenom=$_POST['prenom'];
     $sexe=$_POST['sexe'];
     $fonction=$_POST['fonction'];
     $telephone=$_POST['telephone'];
     $matela=$_POST['matela'];
     $lit=$_POST['lit'];
     $site=$_POST['site'];
     $chambre=$_POST['chambre'];
     $query="INSERT INTO personne (matricule,nom,prenom,sexe,fonction,telephone,matela,lit,site,chambre)
      VALUES ('$matricule','$nom','$prenom','$sexe','$fonction','$telephone','$matela','$lit','$site','$chambre')";
     $result=mysqli_query($connect,$query);
     if (!$result) {
       header('Location:data_personne?source=add_personne');
     }

     echo "<h2 style='color: red' class='text-center'>Insertion bien efffectuée! <a href='liste_personnes.php'>Voir la liste</a></h2>";
     header('Location:data_personne?source=add_personne');
}
 ?>
   <form class="form-validate form-horizontal" action=""  method="POST">
                          <div class="panel panel-info">
                                            <div class="panel-heading ui-draggable-handle">
                                                <h3 class="panel-title"><strong>Ajouter une Personne</strong></h3>
                                                
                                            </div>
                  <div class="col-md-5">  
                       <div class="row">
                       <div class="block">
                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Matricule <span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name= "matricule" type="text" class=" form-control"required />
                      </div>
                    </div>

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
                      <label for="ccomment" class="control-label col-lg-4">Sexe<span class="required">*</span></label>
                         <div class="col-lg-8">
                        <select name= "sexe"  class="form-control" id="formGender" required>
                                                <option value="">Choisissez</option>
                                                <option value="Masculin">Masculin</option>
                                                <option value="Feminin">Feminin</option>
                                            </select>        
                                           </div>
                                            </div>
                                            <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-4">Site<span class="required">*</span></label>
                         <div class="col-lg-8">
                        <select name= "site"  class="form-control" id="formGender" required>
                                                <option value="">Choisissez</option>
                                                <option value="Site 1">Site 1</option>
                                                <option value="Site 2">Site 2</option>
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
                       <input name="fonction" type="text" class=" form-control" required />
                      </div>
                    </div>
                       
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Telephone<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="telephone" type="text" class=" form-control" />
                      </div>
                    </div> 
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Chambre<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="chambre" type="text" class=" form-control" />
                      </div>
                    </div>  
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Dotation Matela<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="matela" type="date" class=" form-control" />
                      </div>
                    </div> 
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Dotation Lit<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="lit" type="date" class=" form-control" />
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
