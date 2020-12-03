 <?php 
  session_start();
  include('include/db.php');
  if (isset($_POST['connectez'])) {
    $utilisateur=mysqli_real_escape_string($connect,$_POST['utilisateur']);
    $motdepass=mysqli_real_escape_string($connect,$_POST['motdepass']);
    $query="SELECT * FROM users WHERE compte='$utilisateur'";
    $result=mysqli_query($connect,$query);
    if (!$result) {
        die('Acces non autorisé');
    }
 
   while ($row=mysqli_fetch_array($result)) {
    $db_user_id=$row['id'];
    $db_user_nom=$row['nom'];
    $db_user_prenom=$row['prenom'];
    $db_user_compte=$row['compte'];
    $db_user_password=$row['password'];
    $db_user_role=$row['role'];
   }
   if (password_verify($motdepass,$db_user_password)) {
       $_SESSION['user_nom']=$db_user_nom;
       $_SESSION['user_prenom']=$db_user_prenom;
       $_SESSION['user_compte']=$db_user_compte;
       $_SESSION['user_role']=$db_user_role; 
        if ($_SESSION['user_role']=='Admin') {
            header("Location:admin.php");
        }
        else if  ($_SESSION['user_role']=='User'){
                    header("Location:admin.php");
        }
       
        }
          else{
             header("Location:error?message=Vos informations sont erronnées");
        }
     }
 ?>