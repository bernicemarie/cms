
<?php  include "include/db.php"; ?>
<?php  include "include/header_image.php"; ?>
<?php 
if (isset($_POST['adresse'])) {
    $adresse=escapecontact($_POST['adresse']);
    if (!checkadresse($adresse)) {
        echo'<script>
        alert("Votre identifiant n\'est pas valide dans notre goundo.com, réessayez-encore");
        </script>';
    }
    else {
        header("Location: reset.php");
    }     
    }
 ?>
<!-- Navigation -->
<?php  include "include/navigation.php"; ?>
<!-- Page Content -->
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Mot de Pass oublié?</h2>
                                <p>Vous pouvez reinitialiser votre mot de pass ici!</p>
                                <div class="panel-body">
                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="adresse" placeholder="Votre identifiant dans goundo" class="form-control"  type="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Réinitialiser votre mot de pass" type="submit">
                                        </div>
                                        <h2>Entrez un identifiant qui est valide dans goundo.com</h2>
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

