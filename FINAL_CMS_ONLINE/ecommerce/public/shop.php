<?php require_once("../resource/config.php")?>
<?php include(TEMPLATE_FRONT . DS . "header.php")?>

<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
        <h1>Faites vos achâts en toute sécurité</h1>

    </header>

    <hr>

    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Latest Features</h3>
        </div>
    </div>
    <!-- /.row -->

    <!-- Page Features -->
    <?php 
          get_product_in_shop();
          ?>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php")?>