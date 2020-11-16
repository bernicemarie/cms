<?php 
function escapecontact($string){
	global $connect;
$controle=mysqli_real_escape_string($connect,trim($string));
return $controle;
}
 ?>
