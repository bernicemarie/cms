 <?php  include "include/db.php"; ?>
 <?php  include "include/header.php"; ?>
  <?php 
if (isset($_POST['envoyer'])) {
    $nom=$_POST['nom'];
    $to= 'kamanobenjamin@gmail.com';
    $prenom=$_POST['prenom'];
    $mail=$_POST['mail'];
    $telephone=$_POST['telephone'];
    $message=$_POST['message'];
}
 ?>

    <!-- Navigation -->
    
    <?php  include "include/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
            </h1>
                     <div class="section-container" id="contact-section-container">
    <div class="container contact-form-container">
        <div class="row">
            <div class="col-xs-12 col-md-offset-2 col-md-8">
                <div class="section-container-spacer">
                    <h2 class="text-center">Contact!</h2>
                </div>
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="nom" class="form-control" placeholder="Votre nom">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="prenom" class="form-control" placeholder="Votre Prenom">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="mail" class="form-control" placeholder="Adresse Electronique">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="telephone" class="form-control" placeholder="Votre numero de téléphone">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" value="option1">Je veux une copie
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox2" value="option2">Je suis humain
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">Envoyer</button>
                    <a href="" class="btn btn-default">Annuler</a>
                </form>
            </div>
        </div>
    </div>
    
</div>
</section>


        <hr>



<?php include "include/footer.php";?>
