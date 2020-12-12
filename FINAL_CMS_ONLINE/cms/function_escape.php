<?php  use PHPMailer\PHPMailer\PHPMailer; ?>

<?php 
function escapecontact($string){
	global $connect;
$controle=mysqli_real_escape_string($connect,trim($string));
return $controle;
}
 ?>

<!-- displaying message!-->
<?php 
 function set_message($msg){
	$_SESSION['message'] = $msg;
	
	}
	function display_message() {
	
		if(isset($_SESSION['message'])) {
	
			echo $_SESSION['message'];
			unset($_SESSION['message']);
	
		}
	}
?>
<!-- end displaying message!-->

<!--  page redirecting!-->
<?php
function redirect($location){

	return header("Location: $location ");
}
?>
<!-- End page redirecting!-->



<!-- sending contact message!-->
<?php 
function send_message(){
	if (isset($_POST['submit'])) {
		$to= "kamanobenjamin@gmail.com";
		$sujet=escapecontact(wordwrap($_POST['sujet'],100));
		$message=escapecontact($_POST['message']);
		$adresse=escapecontact($_POST['adresse']);
		$copie=escapecontact($_POST['copie']);
		$nom=escapecontact($_POST['nom']);
		require 'vendor/autoload.php';
		require 'vendor/phpmailer/phpmailer/src/Exception.php';
	   require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
		require 'vendor/phpmailer/phpmailer/src/SMTP.php';
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug  = 0;  
	$mail->SMTPAuth   = TRUE;
	$mail->SMTPSecure = "tls";
	$mail->Port       = 587;
	$mail->Host       = "smtp.gmail.com";
	$mail->Username   = "kamanobenjamin87@gmail.com";
	$mail->Password   = "Kamano87";
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->AddAddress($to, "Benjamin Marie KAMANO");
	$mail->SetFrom( $adresse ,$nom);
	//$mail->AddReplyTo($from_name, "reply-to-name");
	$mail->AddCC($adresse, $nom);
	$mail->Subject =  $sujet;
	$content =   $message ;
	$mail->MsgHTML($content); 
	if(!$mail->Send()) {
		set_message("Désolé votre message n'a pas pû être envoyé");
		redirect("mail.php");
	  var_dump($mail);
	} else {
		set_message("Votre message a été envoyé avec succès <br> Bernice Marie le prendra en charge!");
		redirect("mail.php");
	}
	
	}
}
 ?>
<!-- end sending contact message!-->