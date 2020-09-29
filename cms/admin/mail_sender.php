<?php include("include/header_admin.php");
 
?>
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
    <div id="wrapper">
        <!-- Navigation -->
       <?php include("include/navigation_admin.php");?>;
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

            <h1 class="page-header">
                            Bienvenue dans Goundo
                            <small><?php echo $_SESSION['user_firstname'] ."  ". $_SESSION['user_lastname']  ?></small>
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
                        <textarea name="message" class="form-control" rows="30" cols="50" placeholder="Entrez votre message" id="body"></textarea>
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

             
                   
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <link rel="stylesheet"  href="css/styleloader.css">
    <link rel="stylesheet" type="text/css" href="../css/mycss.css">
     <script type="text/javascript" src="js/texteditor.js"></script>
     <script type="text/javascript" src="js/selectAll.js"></script>
     <script type="text/javascript" src="js/edit_cat.js"></script>
    <script type="text/javascript" src="js/del_cat.js"></script>
     <script type="text/javascript" src="js/approuve_post.js"></script>
    <script type="text/javascript" src="js/desapprouve_post.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    

</body>

</html>
