 <?php 
 function online_users(){
if (isset($_GET['onlineusers'])) {
 global $connect;
 if (!$connect) {
 	session_start();
 include("../include/db.php");
$session= session_id();
$utilisateur= $_SESSION['username'];
$user_firstname= $_SESSION['user_firstname'];
$user_lastname= $_SESSION['user_lastname'];
$user_role= $_SESSION['user_role'];
$time=time();
$time_out_in_seconds= 05;
$time_out= $time - $time_out_in_seconds;
$query="SELECT * FROM users_online WHERE session='$session'";
$send_query=mysqli_query($connect,$query);
$count=mysqli_num_rows($send_query);
if ($count==NULL) {
    mysqli_query($connect,"INSERT INTO users_online(session,temps,utilisateur,user_firstname,user_lastname,user_role) VALUES ('$session','$time','$utilisateur','$user_firstname','$user_lastname','$user_role')"); 
}
else{
   mysqli_query($connect,"UPDATE users  SET temps='$time' WHERE session='$session'");
}
  $users_online_query= mysqli_query($connect,"SELECT * FROM users_online WHERE temps <= $time_out");
  echo $count_user=mysqli_num_rows($users_online_query);
 }
} //get request isset
 }
 online_users();


  ?>