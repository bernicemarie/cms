
 <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Nom Utilisateur</th>
                          <th>Prenom</th>
                          <th>Nom</th>
                          <th>Privilege</th>
                          <th>Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php 
                                      $query= "SELECT * FROM users_online";
                                      $result=mysqli_query($connect,$query);
                                      while ($row=mysqli_fetch_assoc($result)) {
                                      $id= $row['id'];
                                      $username= $row['utilisateur'];
                                       $user_firstname=$row['user_firstname'];
                                       $user_lastname=$row['user_lastname'];
                                       $user_role=$row['user_role'];
                                       echo"</tr>";
                                       
                                       echo"<td>$username</td>";
                                       echo"<td>$user_firstname</td>";
                                       echo"<td>$user_lastname</td>";
                                       echo"<td>$user_role</td>";
echo"<td><a onClick=\"javascript: return confirm('Voulez vous supprimer cet utilisateur?');\" class='btn btn-danger' href='online_users.php?del=$id'>Supprimer</a></td>";
                                      echo"</tr>";
                                  }
                                  ?>
                      </tbody>
                    </table>
                    <?php 
                  
                      
                  if (isset($_GET['del'])) {
                    $the_user_id= $_GET['del'];
                    $query="DELETE FROM users_online WHERE id=$the_user_id";
                    $result=mysqli_query($connect,$query);
                      header('location:online_users.php?message=Bien supprimé'); }
                     
                     ?>




















