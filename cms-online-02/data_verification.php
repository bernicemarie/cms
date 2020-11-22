<?php 
function verification($username,$mail){
global $connect;
 $query= "SELECT user_email FROM users WHERE user_email='$mail' OR username='$username'";
 $result= mysqli_query($connect,$query);
 if (mysqli_num_rows($result)>0) {
 	return true;
 }
 else{
 	return false;
 }

}

 ?>


 