<?php 
function verification($username,$mail){
global $connect;
 $query= "SELECT username FROM users WHERE username='$username' OR user_email='$mail' ";
 $result= mysqli_query($connect,$query);
 if (mysqli_num_rows($result)>0) {
 	return true;
 }
 else{
 	return false;
 }

}

 ?>


 