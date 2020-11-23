<?php 
function isLoggedIn(){

    if(isset($_SESSION['user_role'])){
        return true;
    }
   return false;

   }



function loggedInUserId(){
    global $connect;
        $result= query("SELECT username FROM users WHERE username='".$_SESSION['username']."'");
        $user=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        if ($count>=1) {
            return $user['username'];
        }
            return false;
    
  } ?>