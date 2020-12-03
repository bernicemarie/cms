<?php 
function verification($usercompte){
global $connect;
 $query= "SELECT compte FROM users WHERE compte='$usercompte'";
 $result= mysqli_query($connect,$query);
 if (mysqli_num_rows($result)>0) {
 	return true;
 }
 else{
 	return false;
 }

}

 ?>


 