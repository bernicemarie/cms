<?php  include "include/db.php"; ?>
<?php  include "include/header_image.php"; ?>
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
                            <h2 class="text-center">Contactez-moi</h2>
                            <h2 class="text-center" style="color:purple"><?php  display_message();?> </h2>
                        </div>
                        <form action="" method="post">
                            <?php  send_message();?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nom" class="form-control"
                                            placeholder="Votre nom complet" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="adresse" class="form-control"
                                            placeholder="Votre adresse Electronique" required>


                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="sujet" name="sujet" class="form-control" placeholder="Votre sujet"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" placeholder="Entrez votre message"
                                            id="body" maxlength="500" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 text-center">
                                <label class="checkbox-inline" style="color:purple">
                                    <input type="checkbox" id="inlineCheckbox1" name="copie">Je veux une copie

                                </label>
                                <button name="submit" type="submit" class="btn btn-primary">Envoyer</button>

                                <a href="index.php" class="btn btn-danger">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Footer -->
    <script type="text/javascript" src="../cms/admin/js/texteditor.js"></script>