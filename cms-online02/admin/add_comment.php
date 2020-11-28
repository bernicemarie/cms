<div class="block">                                                 
                <form class="form-validate form-horizontal" action=""  method="POST"  enctype="multipart/form-data">
                          <div class="panel panel-info">
                                            <div class="panel-heading ui-draggable-handle">
                                                <h3 class="panel-title"><strong>Ajouter une Personne</strong></h3>
                                                
                                            </div>
                  <div class="col-md-5">  
                       <div class="row">
                       <div class="block">
                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Title<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name= "post_title" type="text" class=" form-control"/>
                      </div>
                    </div>

                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Category Id <span class="required">*</span></label>
                      <div class="col-lg-8">
                         <select name="post_category" id="" class="form-control">
                           <?php 
                                      $query= "SELECT * FROM categories";
                                      $select_categories=mysqli_query($connect,$query);
                                        while ($row=mysqli_fetch_assoc($select_categories)) {
                                     $cat_id=$row['cat_id'];
                                     $cat_title=$row['cat_title'];
                                echo "<option value'$cat_title'>$cat_title</option>";
                               }
                            ?>
                           
                         </select>
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Author<span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input name="post_author" type="text" class=" form-control"  />
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Status<span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input name="post_status" type="text" class=" form-control" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Image <span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input name="post_image" type="file" class="form-control" />
                      </div>
                    </div>
                     
                   </div>
                    </div>
                    </div>
                  <div class="col-md-5">  
                    <div class="row">
                    <div class="block">
                  
                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Tags <span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="post_tags" type="text" class=" form-control"  />
                      </div>
                    </div>
                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Content<span class="required">*</span></label>
                      <div class="col-lg-8">
                        <textarea name="post_content"  class=" form-control" cols="30" rows="10"></textarea>
                      </div>
                    </div>  
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Date<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="post_date" type="date" class=" form-control" />
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
                                                 
                              <input class="btn btn-primary" type="submit" name="create_post" value="Publier"> 
                                <a href="../index.php" class="btn btn-danger">Rétour</a>
                                          </div>

                        </div>
                    </div>
                  </form>       
                 </div>   

