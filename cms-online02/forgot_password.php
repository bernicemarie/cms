<?php use PHPMailer\PHPMailer\PHPMailer; ?>
<?php  include "include/db.php"; ?>
<?php  include "include/header_image.php"; ?>
<?php 
require 'vendor/autoload.php';
require 'classes/config.php';
if (isset($_POST['adresse'])) {
    $adresse=$_POST['adresse'];
    $length=20;
    $token=bin2hex(openssl_random_pseudo_bytes($length));
    if (checkadresse($adresse)) {
        if ($stmt=mysqli_prepare($connect,"UPDATE users SET token='$token' WHERE user_email=?")) {
            mysqli_stmt_bind_param($stmt,"s",$adresse);
            mysqli_stmt_execute($stmt);
           mysqli_stmt_close($stmt);
                    /**
                     *
                     * configure PHPMailer
                     *
                     *
                     */
                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = Config::SMTP_HOST;
                    $mail->Username = Config::SMTP_USER;
                    $mail->Password = Config::SMTP_PASSWORD;
                    $mail->Port = Config::SMTP_PORT;
                    $mail->SMTPSecure = 'tls';
                    $mail->SMTPAuth = true;
                    $mail->isHTML(true);
                    $mail->CharSet = 'UTF-8';
                    $mail->setFrom('kamanobenjamin@gmail.com', 'Benjamin');
                    $mail->addAddress($adresse);

                    $mail->Subject = 'Réinitialisation du mot de pass';

                    $mail->Body = '<p>Merci de cliquer sur ce lien pour la modification du mot de pass

                    <a href="http://localhost/training/cms/reset.php?email='.$adresse.'&token='.$token.' ">http://localhost/training/cms/reset.php?email='.$adresse.'&token='.$token.'</a>
                    </p>';
                    if($mail->send()){
                        $emailSent = true;
                         
                    } else{

                        $emailSent = false;

                    }

        }
          
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

                           <?php if (!isset($emailSent)):?>
                        
                            
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Mot de Pass oublié?</h2>
                                <p>Vous pouvez reinitialiser votre mot de pass ici!</p>
                                <div class="panel-body">
                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="adresse" placeholder="Votre adresse électronique" class="form-control"  type="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Réinitialiser votre mot de pass" type="submit">
                                            <h2>Entrez une adresse valide</h2>
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>

                                </div><!-- Body-->
                                   <?php else:?>
                                    <h2>Message envoyé, vérifiez votre boîte aux lettres!</h2>
                                <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php include "include/footer.php";?>

</div> <!-- /.container -->

