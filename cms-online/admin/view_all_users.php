 <?php 
if (isset($_POST['checkboxArray'])) {
  foreach ($_POST['checkboxArray'] as $checkPostId_Value) {
    $bulk_options=$_POST['bulk_options'];
    switch ($bulk_options) {
  case 'admin':
    $query="UPDATE users set user_role='$bulk_options' WHERE user_id=$checkPostId_Value";
    $result=mysqli_query($connect,$query);
    if (!$result) {
      die('Erreur de mise à jour'.mysqli_error($connect));
    }
    break;
    case 'user':
    $query="UPDATE users set user_role='$bulk_options' WHERE user_id=$checkPostId_Value";
    $result=mysqli_query($connect,$query);
    if (!$result) {
      die('Erreur de mise à jour'.mysqli_error($connect));
    }
    break;
    case 'Supprimer':
    $query="DELETE FROM users  WHERE user_id=$checkPostId_Value";
    $result=mysqli_query($connect,$query);
    if (!$result) {
      die('Erreur de supression'.mysqli_error($connect));
    }
    break;
  
  default:
    # code...
    break;
}
  }
  
}


  ?>
 <form action="" method="POST">
   <div id="bulkOptionContainer" class="col-xs-4">
  <select name="bulk_options" class="form-control" id="">
    <option value="">Selectionnez</option>
    <option value="admin">Admin</option>
    <option value="user">User</option>
    <option value="Supprimer">Supprimer</option>
  </select>
</div>
<div class="col-xs-4">
  <input class="btn btn-success" type="submit" name="appliquer" value="appliquer">
  <a class="btn btn-primary"href="users.php?source=add_user">Ajouter un utilisateur</a>
</div>
 
 <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th><input type="checkbox" name="" id="selectAllboxes"></th>
                          <th>Id</th>
                          <th>Nom Utilisateur</th>
                          <th>Prenom</th>
                          <th>Nom</th>
                          <th>E-Mail</th>
                          <th>Image</th>
                          <th>Role</th>
                          <th>Etat</th>
                          <th>Editer</th>
                          <th>Admin</th>
                          <th>User</th>
                          <th>Statut Utilisateur</th>
                          <th>Supprimer</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php 
                                      $query= "SELECT * FROM users";
                                      $result=mysqli_query($connect,$query);
                                      while ($row=mysqli_fetch_assoc($result)) {
                                      $user_id= $row['user_id'];
                                      $username= $row['username'];
                                       $user_firstname=$row['user_firstname'];
                                       $user_lastname=$row['user_lastname'];
                                       $user_email=$row['user_email'] ;
                                       $user_image=$row['user_image'];
                                       $user_role=$row['user_role'];
                                       $user_status=$row['user_status'];
                                        echo"<tr>";
                    ?>
    <td><input type='checkbox' class='checkboxes' name="checkboxArray[]" value="<?php echo $user_id;?>"></td>
                          <?php 
                                       echo"<td>$user_id</td>";
                                       echo"<td>$username</td>";
                                       echo"<td>$user_firstname</td>";
                                       echo"<td>$user_lastname</td>";
                                       echo"<td>$user_email</td>";
                                       echo "<td><img width='50' height='50' src='../images/$user_image'></td>";
                                       echo"<td>$user_role</td>";
                                       echo"<td>$user_status</td>";
echo"<td><a onClick='_edite(event)' class='btn btn-primary ' href='?source=edit_user&userid=$user_id'>Editer</a></td>";
echo"<td><a onClick='_edite(event)' class='btn btn-primary ' href='users.php?admin=$user_id'>Admin</a></td>";
echo"<td><a onClick='_edite(event)' class='btn btn-primary ' href='users.php?user=$user_id'>User</a></td>";
echo"<td><a onClick=\"javascript: return confirm('Voulez-vous changer son status?');\" class='btn btn-primary ' href='users.php?status=$user_id'>Validé</a>
<a onClick=\"javascript: return confirm('Voulez-vous changer son status?');\" class='btn btn-primary ' href='users.php?nostatus=$user_id'>En Attente</a></td>";
echo"<td><a onClick=\"javascript: return confirm('Voulez vous supprimer cet utilisateur?');\" class='btn btn-danger' href='users.php?delete=$user_id'>Supprimer</a></td>";
                                      echo"</tr>";
                                  }
                                  ?>
                      </tbody>
                    </table>
                    </form>
                    <?php 
                  if (isset($_GET['admin'])) {
                    $the_user_id= $_GET['admin'];
                    $query="UPDATE users SET user_role='admin' WHERE user_id=$the_user_id";
                    $result_admin=mysqli_query($connect,$query);
                      header('location:users.php?message=Bien corrigé'); }
                      
                  if (isset($_GET['user'])) {
                    $the_user_id= $_GET['user'];
                    $query="UPDATE users SET user_role='user' WHERE user_id=$the_user_id";
                    $result_user=mysqli_query($connect,$query);
                      header('location:users.php?message=Bien corrigé'); }
                      
                  if (isset($_GET['delete'])) {
                    if (isset($_SESSION['user_role']) && $_SESSION['user_role']=='admin' ) {
                    $the_user_id= mysqli_real_escape_string($connect,$_GET['delete']);
                    $query="DELETE FROM users WHERE user_id=$the_user_id";
                    $result=mysqli_query($connect,$query);
                      header('location:users.php?message=Bien supprimé');  
                            
                             }
                             }

                              if (isset($_GET['status'])) {
                    if (isset($_SESSION['user_role']) && $_SESSION['user_role']=='admin' ) {
                    $the_user_status= mysqli_real_escape_string($connect,$_GET['status']);
                    $query="UPDATE users SET user_status='valide' WHERE user_id=$the_user_status";
                    $result=mysqli_query($connect,$query);
                      header('location:users.php?message=Bien supprimé');  
                            
                             }
                             }
                              if (isset($_GET['nostatus'])) {
                    if (isset($_SESSION['user_role']) && $_SESSION['user_role']=='admin' ) {
                    $the_user_status= mysqli_real_escape_string($connect,$_GET['nostatus']);
                    $query="UPDATE users SET user_status='En Attente' WHERE user_id=$the_user_status";
                    $result=mysqli_query($connect,$query);
                      header('location:users.php?message=Modifiation faite!');  
                            
                             }
                             }
                     ?>




















