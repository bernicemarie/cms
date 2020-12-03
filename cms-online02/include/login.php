 <?php 
 include("db.php");
 session_start();
 if (isset($_POST['envoyer'])) {
 $user_email=$_POST['username'];
 $password=$_POST['password'];
 $user_email=mysqli_real_escape_string($connect,$user_email);
 $password=mysqli_real_escape_string($connect, $password);
 $query= "SELECT * FROM users WHERE user_email='$user_email'";
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
 	$db_user_email=$row['user_email'];
 	$db_status=$row['user_status'];
 }
  
   //Password verification!
 if (password_verify($password,$db_password) ) {
 	   $_SESSION['user_lastname']=$db_user_lastname;
 	   $_SESSION['username']=$db_username;
       $_SESSION['user_firstname']=$db_user_firstname;
       $_SESSION['user_role']=$db_role; 
       $_SESSION['user_email']=$db_user_email; 
       $_SESSION['user_status']=$db_status; 
       if ($_SESSION['user_role']=='admin') {
       	header("Location: ../admin/index_admin");   
       }
 	 else if ($_SESSION['user_role']=='user') {
 	 	header("Location: ../admin/index_user");   
 	 }
 }
 else {
 	header("Location: ../errors.php? message = Informations non conformes");
  }
  }
 ?>