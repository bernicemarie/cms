 <?php 
 include("db.php");
 session_start();
 if (isset($_POST['envoyer'])) {
 $username=$_POST['username'];
 $password=$_POST['password'];
 $username=mysqli_real_escape_string($connect,$username);
 $password=mysqli_real_escape_string($connect, $password);
 $query= "SELECT * FROM users WHERE username='$username'";
 $result=mysqli_query($connect,$query);
 if (!$result) {
 	die('Erreur de connexion,contactez votre administrateur'.mysqli_error($connect));
 }
 while ($row=mysqli_fetch_array($result)) {
 	$db_user_id=$row['user_id'];
 	$db_username=$row['username'];
 	$db_user_lastname=$row['user_lastname'];
 	$db_user_firstname=$row['user_firstname'];
 	$db_password=$row['user_password'];
 	$db_role=$row['user_role'];
 }
   //Password verification!
 if (password_verify($password,$db_password)) {
 	   $_SESSION['user_lastname']=$db_user_lastname;
 	   $_SESSION['username']=$db_username;
       $_SESSION['user_firstname']=$db_user_firstname;
       $_SESSION['user_role']=$db_role; 
 	header("Location: ../admin/index_admin.php");   
 }
 else {
 	header("Location: ../index.php");
  }
  }
 ?>