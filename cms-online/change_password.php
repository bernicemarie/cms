<?php 
function checkadresse($mail){
global $connect;
 $query= "SELECT username FROM users WHERE user_email='$mail' ";
 $result= mysqli_query($connect,$query);
 if (mysqli_num_rows($result)>0) {
 	return true;
 }
 else{
 	return false;
 }

}

 ?>


 