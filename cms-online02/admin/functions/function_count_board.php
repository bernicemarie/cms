 <?php 
function boardcount($table){
global $connect;
$query= "SELECT * FROM ".$table;
 $result=mysqli_query($connect,$query);
     $count=mysqli_num_rows($result);
return $count;
}
  ?>

  <?php 
  
function graphcount($table,$col1,$col2){
	global $connect;
 $query_user= "SELECT * FROM $table WHERE $col1='$col2'";
;
  $result_user=mysqli_query($connect,$query_user);
                $user_count=mysqli_num_rows($result_user);
                return $user_count;
}

               
   ?>