
 <?php 
 ob_start();
 include("db.php");
   session_start();
   $_SESSION['user_nom']=null;
   $_SESSION['user_prenom']=null;
   $_SESSION['user_role']=null; 
   $_SESSION['user_compte']=null; 
   header("Location:index.php");

 ?>