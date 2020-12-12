<!-- Configuration-->

<?php require_once("../resource/config.php"); ?>


<!-- Header-->
<?php include(TEMPLATE_FRONT .  "/header.php");?>


<!--Navigation -->



<!-- Contact Section -->

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading">Contactez-moi</h2>
            <h3 class="section-subheading text-muted"></h3>
        </div>
    </div>
    <h2 class="text-center" style="color:red">
        <?php  display_message();?>
    </h2>
    <div class="row">
        <div class="col-lg-12">

            <form name="sentMessage" id="contactForm" method="post">

                <?php send_message(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Votre nom *" id="name"
                                required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control"
                                placeholder="Votre adresse élètronique *" required
                                data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="titre" type="text" class="form-control" placeholder="Votre sujet *" required
                                data-validation-required-message="Le sujet.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Votre message *" id="body"
                                required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                        <div id="success"></div>
                        <button name="envoyer" type="submit" class="btn btn-primary">Envoyer</button>
                        <button type="reset" class="btn btn-danger">Annuler</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<!-- /.container -->

<?php include(TEMPLATE_FRONT .  "/footer.php");?>