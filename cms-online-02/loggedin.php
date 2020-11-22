
<?php 
function query($query){
	global $connect;
	return mysqli_query($connect, $query);
}
function isLoggedIn(){

    if(isset($_SESSION['user_role'])){
        return true;
    }
   return false;
}
  function loggedInUserId(){
  	if (isLoggedIn()) {
  		$result= query("SELECT * FROM users WHERE username='".$_SESSION['username']."'");
  		$user=mysqli_fetch_array($result);
  		$count=mysqli_num_rows($result);
  		if ($count>=1) {
  			return $user['user_id'];
  		}
  			return false;
  	}
  }
function userLikedThisPost($post_id){
  $result=query("SELECT * FROM likes WHERE user_id=".loggedInUserId(). "AND post_id={$post_id}");
  if ($result) {
      return mysqli_num_rows($result)>=1 ? true : false;
  }
    
   }
   function getPostlikes($post_id){
     $result=query("SELECT * FROM likes WHERE post_id=$post_id");
      echo mysqli_num_rows($result);

   }
 ?>