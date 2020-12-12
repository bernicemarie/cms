 <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <input type="hidden" name="" value="<?php echo $user=$_SESSION['username'] ?>">
                          
                          <th>Utilisateur</th>
                          <th>Commentaire</th>
                          <th>Email</th>
                          <th>Etat du commentaire</th>
                          <th>En Réponse vers</th>
                          <th>Date</th>
                           
                        </tr>
                      </thead>
                      <tbody>
                                    
                                    <?php 
                                      $query= "SELECT * FROM comments";
                                      $result=mysqli_query($connect,$query);
                                      while ($row=mysqli_fetch_assoc($result)) {
                                      $comment_id= $row['comment_id'];
                                      $comment_post_id= $row['comment_post_id'];
                                       $username=$row['username'];
                                       $comment_author=$row['comment_author'];  
                                       $comment_content=$row['comment_content'];
                                       $comment_email=$row['comment_email'] ;
                                       $comment_status=$row['comment_status'];
                                       $comment_date=$row['comment_date'];
                                       echo"<tr>";
                                        echo"<td>$username</td>";
                                       echo"<td>$comment_content</td>";
                                       echo"<td>$comment_email</td>";
                                       echo"<td>$comment_status</td>";
                                        $query_post= "SELECT * FROM posts WHERE post_id=$comment_post_id";
                                       $select_post_id_query=mysqli_query($connect,$query_post);
                                       while($row1=mysqli_fetch_assoc($select_post_id_query)){
                                         $post_id=$row1["post_id"];
                                        $post_title=$row1["post_title"]; 
                                        if (empty($post_title)) {
                                         $post_title="Aucun titre";
                                         
                                                }
                                         
                                        echo"<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>" ; 
                                 }
                                       
                                       echo"<td>$comment_date</td>";
 if (isset($_SESSION['username']) && $_SESSION['username']== $username) {
echo"<td><a onclick='_edite(event)' class='btn btn-primary ' href='comments.php?approuve=$comment_id'>approuver</a></td>";
echo"<td><a onclick='_edite(event)' class='btn btn-primary ' href='comments.php?desapprouve=$comment_id'>Désapprouver</a></td>";
echo"<td><a onclick='_delete(event)' class='btn btn-danger' href='comments.php?delete=$comment_id'>Supprimer</a></td>";
 }

                                      echo"</tr>";
                                  }
                                  ?>
                      </tbody>

                    </table>
                    <?php 
                  if (isset($_GET['desapprouve'])) {
                    $the_comment_id= $_GET['desapprouve'];
                    $query="UPDATE comments SET comment_status='Desapprouvé' WHERE comment_id=$the_comment_id";
                    $result_desapprouve=mysqli_query($connect,$query);
                      header('location:comments.php?message=Bien desapprouvé'); }
                      
                  if (isset($_GET['approuve'])) {
                    $the_comment_id= $_GET['approuve'];
                    $query="UPDATE  comments SET comment_status='Approuve' WHERE comment_id=$the_comment_id";
                    $result_approuve=mysqli_query($connect,$query);
                      header('location:comments.php?message=Bien approuvé'); }
                      
                  if (isset($_GET['delete'])) {
                    $the_comment_id= $_GET['delete'];
                    $query="DELETE FROM comments WHERE comment_id=$the_comment_id";
                    $result=mysqli_query($connect,$query);
                      header('location:comments.php?message=Bien supprimé'); }
                     
                     ?>



















