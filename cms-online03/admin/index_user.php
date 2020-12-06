<?php include("include/header_admin.php"); ?>

    <div id="wrapper">
        <!-- Navigation -->
       <?php include("include/navigation_admin.php");?>;
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bienvenue dans Goundo
                            <small><?php echo strtoupper($_SESSION['username']) ;?></small>
                        </h1>
                           

                    </div>
                </div>
                <!-- /.row -->

        
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'><?php echo  $posts_count=boardcountuser('posts','username',$_SESSION['username']);?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">Voir Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                     <div class='huge'><?php echo  $comments_count=boardcountuser('comments','username',$_SESSION['username']);?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">Voir Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right"> 
                    <div class='huge'> <?php echo  $users_count=boardcount('users');?></div>
                        <div>Utilisateurs</div>
                    </div>
                </div>
            </div>
            <a href="">
                <div class="panel-footer">
                    <span class="pull-left">Voir Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
</div>
                <!-- /.row -->
                <?php 
                
                $post_status_count=graphcountuser('posts','post_status','Actif');

                $post_status_desap_count=graphcountuser('posts','post_status','Inactif');

                $user_admin_count=graphcountuser('users','user_role','admin');

                $user_count=graphcountuser('users','user_role','user');

                 ?>
                 <div class="row">
                    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Données', 'Il y"a'],

          <?php 
             $element_text=['Posts Approuvés','Posts desapprouvés','Comments','Utilisateurs'];
             $element_count=[ $post_status_count,$post_status_desap_count,$comments_count,$user_count];
             for($i=0;$i<4;$i++){
              echo "['$element_text[$i]'".","."$element_count[$i]],";


             }


           ?>
          //['Posts', 1000],
           
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script> 
<div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>



                 </div>




            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



</body>

</html>
