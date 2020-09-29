<?php 
ob_start();
  $connect= mysqli_connect('localhost','root','','cms');
  if (!$connect) {
  	   die('<h1>Erreur de connection à la Base de données</h1>');
  }
   


 ?>