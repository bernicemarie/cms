<?php 
function verification($cours){
global $connect;
 $query= "SELECT cat_title FROM categories WHERE cat_title='$cours'";
 $result= mysqli_query($connect,$query);
 if (mysqli_num_rows($result)>0) {
 	return true;
 }
 else{
 	return false;
 }

}

 ?>


 