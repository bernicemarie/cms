  <?php 
   if (isset($_POST['create_post'])) {
    $post_title=escape($_POST['post_title']);
    $post_category_id=escape($_POST['post_category']);
    $post_author=escape($_POST['post_author']);
    $username=escape($_SESSION['username']);
    $post_image=$_FILES['post_image']['name'];
    $post_image_temp=$_FILES['post_image']['tmp_name']; 
    $post_tags=escape($_POST['post_tags']);
    $post_content=escape($_POST['post_content']);
    $post_date=date('d-m-y');
    move_uploaded_file($post_image_temp,"../images/$post_image");
    $query1= "INSERT INTO posts(username,post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags)
    VALUES('{$username}','{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}')";
    $query= mysqli_query($connect,$query1);
    if (!$query) {
      die("Pas d\'insertion possible dans la table POSTS".mysqli_error($connect));
    }
    $the_post_id=mysqli_insert_id($connect);
    echo "<p  class='text-center btn-danger' >Insertion bien efffectuée!<a href='../post.php?p_id=$the_post_id'><br>Allez sur le poste inseré</a></p>";
   }
   ?>
  <div class="block">                                                 
                <form class="form-validate form-horizontal" action=""  method="POST"  enctype="multipart/form-data">
                          <div class="panel panel-info">
                                            <div class="panel-heading ui-draggable-handle">
                                            <h3 class="panel-title"><strong>Ajouter un Post</strong></h3>
                                                
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
                      <label for="cemail" class="control-label col-lg-4">Post Date<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input name="post_date" type="date" class=" form-control" />
                      </div>
                    </div> 
                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Content<span class="required">*</span></label>
                      <div class="col-lg-8">
                        <textarea name="post_content"  class=" form-control" cols="30" rows="30" id="body" maxlength="30"></textarea>
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
                                <a href="index_admin.php" class="btn btn-danger">Rétour</a>
                                          </div>

                        </div>
                    </div>
                  </form>       
                 </div>   

