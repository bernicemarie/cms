<?php  include "include/db.php"; ?>
<?php  include "include/header.php"; ?>
    
   
 <?php 
 session_start();
 if (isset($_POST['envoyer'])) {
 $username=$_POST['username'];
 $password=$_POST['password'];
 $username=mysqli_real_escape_string($connect,$username);
 $password=mysqli_real_escape_string($connect, $password);
 $query= "SELECT * FROM users WHERE username='$username'";
 $result=mysqli_query($connect,$query);
 if (!$result) {
 	die('Erreur de connexion,contactez votre administrateur'.mysqli_error($connect));
 }
 while ($row=mysqli_fetch_array($result)) {
 	$db_user_id=$row['user_id'];
 	$db_username=$row['username'];
 	$db_user_lastname=$row['user_lastname'];
 	$db_user_firstname=$row['user_firstname'];
 	$db_password=$row['user_password'];
 	$db_role=$row['user_role'];
 }
   //Password verification!
 if (password_verify($password,$db_password)) {
 	   $_SESSION['user_lastname']=$db_user_lastname;
 	   $_SESSION['username']=$db_username;
       $_SESSION['user_firstname']=$db_user_firstname;
       $_SESSION['user_role']=$db_role; 
 	header("Location: ../cms/admin/index_admin");   
 }
 else {
 	header("Location: index.php");
  }
  }
 ?>
<!-- Navigation -->
<?php  include "include/navigation.php"; ?>
<!-- Page Content -->
<div class="container">

	<div class="form-gap"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">


							<h3><i class="fa fa-user fa-4x"></i></h3>
							<h2 class="text-center">Connectez-Vous</h2>
							<div class="panel-body">


								<form id="login-form" role="form" autocomplete="off" class="form" method="post">

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

											<input name="username" type="text" class="form-control" placeholder="Entrez votre nom d'utilisateur">
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
											<input name="password" type="password" class="form-control" placeholder="Entez votre mot de Pass">
										</div>
									</div>

									<div class="form-group">

										<input name="envoyer" class="btn btn-lg btn-primary btn-block" value="Connectez-Vous" type="submit">
									</div>


								</form>

							</div><!-- Body-->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<?php include "include/footer.php";?>

</div> <!-- /.container -->
