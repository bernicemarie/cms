<?php require_once("../resource/config.php")?>
<?php include(TEMPLATE_FRONT . DS . "header.php")?>
<h1 class=text-center style="color: red"> <?php display_message();?></h1>


<!-- Page Content -->
<div class="container">


    <!-- /.row -->

    <div class="row">

        <h1>Checkout</h1>

        <form action="">
            <table class="table table-striped">

                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Sub-total</th>

                </tr>

                <?php cart();?>
            </table>
        </form>



        <!--  ***********CART TOTALS*************-->

        <div class="col-xs-4 pull-right ">
            <h2>Cart Totals</h2>

            <table class="table table-bordered" cellspacing="0">

                <tr class="cart-subtotal">
                    <th>Items:</th>
                    <td><span class="amount">4</span></td>
                </tr>
                <tr class="shipping">
                    <th>Shipping and Handling</th>
                    <td>Free Shipping</td>
                </tr>

                <tr class="order-total">
                    <th>Order Total</th>
                    <td><strong><span class="amount">$3444</span></strong> </td>
                </tr>


                </tbody>

            </table>

        </div><!-- CART TOTALS-->


    </div>
    <!--Main Content-->


    <hr>

    <!-- Footer -->
    <?php include(TEMPLATE_FRONT . DS . "footer.php")?>