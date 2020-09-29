<?php 
if (isset($_GET['p_id'])) {
  $the_post_id=$_GET['p_id'];

}

$query= "SELECT * FROM posts WHERE post_id=$the_post_id";
$select_posts= mysqli_query($connect,$query);
while ($row=mysqli_fetch_assoc($select_posts)) {
    $post_id=$row['post_id'];
    $post_title=$row['post_title'];
    $post_category_id=$row['post_category_id'];
    $post_author=$row['post_author'];
    $post_status=$row['post_status'];
    $post_image=$row['post_image'];
    $post_tags=$row['post_tags'];
    $post_content=$row['post_content'];
    $post_date= $row['post_date'];
    $post_comment_count= $row['post_comment_count'];
    $post_content=mysqli_real_escape_string($connect,$post_content);
}
if (isset($_POST['update_post'])) {
    $post_title=$_POST['post_title'];
    $post_category_id=$_POST['post_category'];
    $post_author=$_POST['post_author'];
    $post_status=$_POST['post_status'];
    $post_image=$_FILES['post_image']['name'];
    $post_image_temp=$_FILES['post_image']['tmp_name'];
    $post_tags=$_POST['post_tags'];
    $post_content=$_POST['post_content'];
    move_uploaded_file($post_image_temp,"../images/$post_image");
    if (empty($post_image)) {
      $query= "SELECT * FROM posts WHERE post_id=$the_post_id";
          $select_image=mysqli_query($connect,$query);
    while ($row=mysqli_fetch_assoc($select_image)) {
      $post_image=$row['post_image'];
    }
 }
 }
$query_update="UPDATE posts SET 
post_title='$post_title'
,post_category_id='$post_category_id',
post_date= now() 
,post_author='$post_author'
,post_status='$post_status'
,post_tags='$post_tags'
,post_content='$post_content'
,post_image='$post_image'
,post_comment_count='$post_comment_count' 
WHERE post_id='$the_post_id'";
  $result_update=mysqli_query($connect,$query_update);
  if (!$result_update) {
    die('errrorrrrorrr'.mysqli_error($connect));
  }
  echo "<p class='bg-success text-center'>Mise à jour effectuée.<a href='../post.php?p_id=$the_post_id'>Voir ce post</a> Ou  <a href='posts.php'>Voir tous les posts</a></p>";
 ?>
<div class="block">                                                 
                <form class="form-validate form-horizontal" action=""  method="POST"  enctype="multipart/form-data">
                          <div class="panel panel-info">
                                            <div class="panel-heading ui-draggable-handle">
                                                <h3 class="panel-title"><strong>Mise à Jour</strong></h3>
                                           
                                            </div>
                  <div class="col-md-5">  
                       <div class="row"><a href=""></a>
                       <div class="block">
                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Title<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input value="<?php echo $post_title;?>" name= "post_title" type="text" class=" form-control"/>
                      </div>
                    </div>

                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Category <span class="required">*</span></label>
                      <div class="col-lg-8">
                         <select name="post_category" id="" class="form-control">
                           <?php 
                                      $query= "SELECT * FROM categories";
                                      $select_categories=mysqli_query($connect,$query);
                                        while ($row=mysqli_fetch_assoc($select_categories)) {
                                     $cat_id=$row['cat_id'];
                                     $cat_title=$row['cat_title'];
                                echo "<option value='$cat_title'> $cat_title </option>";
                               }
                            ?>
                           
                         </select>
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Author<span class="required">*</span></label>
                      <div class="col-lg-8">
                         <input value="<?php echo $post_author;?>" name="post_author" type="text" class=" form-control"  />
                      </div>
                    </div>
                     <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Status<span class="required">*</span></label>
                      <div class="col-lg-8">
                        <select name="post_status" class="form-control">
                           <option value="<?php echo $post_status;?>"><?php echo $post_status;?></option>
                           <?php 
                            if ($post_status=='Approuve') {
                              echo "<option value='Desapprouve'>Desapprouve</option>";
                            }
                            else {
                              echo "<option value='Approuve'>Approuve</option>";
                            }
                            ?>
                        </select>
                          
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Image <span class="required">*</span></label>
                      <div class="col-lg-8">
                        <input type="file" name="post_image">
                       <img width="100" src="../images/<?php echo $post_image;?>" alt="Nice to code">
                         
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
                       <input value= "<?php echo $post_tags;?>" name="post_tags" type="text" class=" form-control"/>
                      </div>
                    </div>
                      <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Content<span class="required">*</span></label>
                      <div class="col-lg-8">
                        <textarea name="post_content"  class=" form-control" cols="30" rows="10" id="body" maxlength="30"><?php echo str_replace('\r\n','</br>',$post_content) ;?> </textarea>
                      </div>
                    </div>  
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-4">Post Date<span class="required">*</span></label>
                      <div class="col-lg-8">
                       <input value="<?php echo $post_date;?>" name="post_date" type="date" class=" form-control" />
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
                                                 
                              <input class="btn btn-primary" type="submit" name="update_post" value="modifier"> 
                              
                               <a href="posts.php" class="btn btn-danger">Rétour</a>
                                          </div>

                        </div>
                    </div>
                  </form>       
                 </div>  