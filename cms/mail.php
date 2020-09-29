 <?php  include "include/db.php"; ?>
 <?php  include "include/header.php"; ?>
  <?php 
  session_start();
if (isset($_POST['envoyer'])) {
    $to= "kamanobenjamin@gmail.com";
    $sujet=wordwrap($_POST['sujet'],70);
    $message=$_POST['message'];
    $header="From".$_POST['adresse'];
    mail($to,$sujet,$message,$header);
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
                    <h2 class="text-center">Restons en contact!</h2>
                </div>
                <form action="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="adresse" class="form-control" placeholder="Votre adresse Electronique">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="sujet" name="sujet" class="form-control" placeholder="Votre sujet">
                            </div>
                        </div>

                    </div>
                      <div class="form-group">
                        <textarea name="message" class="form-control" rows="5" cols="5" placeholder="Entrez votre message" id="body" maxlength="30"></textarea>
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
                    <a href="index.php" class="btn btn-default">Annuler</a>
                </form>
            </div>
        </div>
    </div>
    
</div>
</section>


        <hr>



<?php include "include/footer.php";?>
