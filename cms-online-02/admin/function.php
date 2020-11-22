<?php 
function confirmQuery($result)
global $connect;
if (!$result) {
	die('Errrrorrrrr'.mysqli_error($connect));
}

 ?>