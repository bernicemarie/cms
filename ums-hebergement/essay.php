
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Export Des Données</h3>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> EXPORT</button>
                                        <ul class="dropdown-menu">
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> EXCEL</a></li> 
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <form action="" method="POST">
   <div id="bulkOptionContainer" class="col-xs-4">
  <select name="bulk_options" class="form-control" id="">
    <option value="">Selectionnez</option>
    <option value="editer">Editer</option>
    
    <option value="Supprimer">Supprimer</option>
  </select>
</div>
<div class="col-xs-4">
  <input class="btn btn-success" type="submit" name="appliquer" value="Appliquer">
  <a class="btn btn-primary"href="data_personne.php?source=add_personne">Ajouter une personne</a>
</div>
                                <div class="panel-body">
                                    <table id="customers2" class="table datatable table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" name="" id="selectAllboxes"></th>
                                                <th>Matricule</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Sexe</th>
                                                <th>Fonction</th>
                                                <th>Telephone</th>
                                                <th>Site</th>
                                                <th>Chambre</th>
                                                <th>Dotation Matelat</th>
                                                <th>Dotation Lit</th>
                                                <th>ACTIONS</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php 
                                             $query=" SELECT * FROM personne";
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
                                         echo"<tr>";
                                         ?>
    <td><input type='checkbox' class='checkboxes' name="checkboxArray[]" value="<?php echo $id;?>"></td>
                          <?php 
                                            echo"<td>$matricule</td>";
                                            echo"<td>$nom</td>";
                                            echo"<td>$prenom</td>";
                                            echo"<td>$sexe</td>";
                                            echo"<td>$fonction</td>";
                                            echo"<td>$telephone</td>";
                                            echo"<td>$site</td>";
                                            echo"<td>$chambre</td>";
                                            echo"<td>$matela</td>";
                                            echo"<td>$lit</td>";
                                             echo "<td><a onClick=\"javascript: return confirm('Voulez vous editer cette personne?');\"  class='btn btn-info' href='data_personne.php?source=edit_pers&pers_id=$id'>Editer</a>
                                             <a onClick=\"javascript: return confirm('Voulez vous supprimer cette personne?');\"  class='btn btn-danger' href='data_personne.php?delete=$id'>Supprimer</a></td>";
                                         echo"</tr>";

                                         }
                                           ?>
                                        </tbody>
                                    </table>  
                                    </form>                                  
                                    
                                </div>
                            </div>

                            <!-- END DATATABLE EXPORT -->                            
                            
                            <!-- START DEFAULT TABLE EXPORT -->
                             
                            <!-- END DEFAULT TABLE EXPORT -->

                        </div>


                    </div>
