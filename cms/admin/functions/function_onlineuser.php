 <?php 
 function online_users(){
 global $connect;
  $session= session_id();
$time=time();
$time_out_in_seconds= 30;
$time_out= $time - $time_out_in_seconds;
$query="SELECT * FROM users_online WHERE session='$session'";
$send_query=mysqli_query($connect,$query);
$count=mysqli_num_rows($send_query);
if ($count==NULL) {
    mysqli_query($connect,"INSERT INTO users_online(session,temps) VALUES ('$session','$time')");
    
}
else{
    mysqli_query($connect,"UPDATE users  SET temps='$time' WHERE session='$session'");
}
  $users_online_query= mysqli_query($connect,"SELECT * FROM users_online WHERE temps > $time_out");
   return $count_user=mysqli_num_rows($users_online_query);


 }

  ?>