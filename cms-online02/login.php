<?php  include "include/db.php"; ?>
<?php  include "include/header_image.php"; ?>
    
   
 <?php 
 session_start();
 if (isset($_POST['envoyer'])) {
 $user_email=$_POST['user_email'];
 $password=$_POST['password'];
 $user_email=mysqli_real_escape_string($connect,$user_email);
 $password=mysqli_real_escape_string($connect, $password);
 $query= "SELECT * FROM users WHERE user_email='$user_email'";
 $result=mysqli_query($connect,$query);
 if (!$result) {
 	die('Erreur de connexion,contactez votre administrateur '.mysqli_error($connect));
 }
 while ($row=mysqli_fetch_array($result)) {
 	$db_user_id=$row['user_id'];
 	$db_username=$row['username'];
 	$db_user_lastname=$row['user_lastname'];
 	$db_user_firstname=$row['user_firstname'];
 	$db_password=$row['user_password'];
 	$db_role=$row['user_role'];
 	$db_user_email=$row['user_email'];
 	$db_status=$row['user_status'];
 }
   //Password verification!
 if (password_verify($password,$db_password)) {
 	   $_SESSION['user_lastname']=$db_user_lastname;
 	   $_SESSION['username']=$db_username;
       $_SESSION['user_firstname']=$db_user_firstname;
       $_SESSION['user_role']=$db_role; 
       $_SESSION['user_email']=$db_user_email; 
       $_SESSION['user_status']=$db_status; 
       if ($_SESSION['user_role']=='admin') {
       	header("Location: ../cms/admin/index_admin");   
       }
 	 else if ($_SESSION['user_role']=='user') {
 	 	header("Location: ../cms/admin/index_user");   
 	 }
 }
 else {
 	header("Location: error.php?message = Informations non conformes");
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

											<input name="user_email" type="email" class="form-control" placeholder="Entrez votre identifiant électronique" required>
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
											<input name="password" type="password" class="form-control" placeholder="Entez votre mot de Pass" required>
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

	

	<?php include "include/footer.php";?>

</div> <!-- /.container -->
