
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index_admin.php">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               <li><a href="">utilisateurs en ligne : <span class="usersonline"></span>  </a><li> 
               <li><a href="../index.php">RETOUR</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                    <?php 
                    if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                    }
                    ?> 
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../admin/profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                         
                          
                        <li>
                            <a href="../admin/logout.php"><i class="fa fa-fw fa-power-off"></i>Quitter</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index_admin.php"><i class="fa fa-fw fa-dashboard"></i> Tableau de Bord</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="posts?source=add_post">Ajouter un Post</a>
                            </li>
                            <li>
                                <a href="./posts.php">Voir les Posts</a>
                            </li>
                            
                        </ul>
                    </li>
                     <?php 
                        if (isset($_SESSION['user_role']) && $_SESSION['user_role']=='admin') {
                        echo ' <li>
                        <a href="categories.php"><i class="fa fa-fw fa-wrench"></i>Categories</a>
                    </li>
                     
                      ';
                        }
                      ?>
                    
                     
                    <li>
                        <a href=""><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                     
                     
                     
                    <li class="#">
                        <a href="comments.php"><i class="fa fa-fw fa-file"></i>Comments</a>
                    </li>
                    <?php 
                        if (isset($_SESSION['user_role']) && $_SESSION['user_role']=='admin') {
                        echo' <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-arrows-v"></i>Utilisateurs<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users" class="collapse">
                            <li>
                                <a href="users?source=add_user">Ajouter</a>
                            </li>
                            <li>
                                <a href="users.php">List Users</a>
                            </li>
                            <li>
                                <a href="online_users.php">Utilisateurs en ligne</a>
                            </li>
                        </ul>
                    </li>';

                        }?>
                   
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i>Profiles</a>
                    </li>
                    <li>
                        <a href="info.php"><i class="fa fa-fw fa-dashboard"></i>A Propos</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-dashboard"></i>Quitter</a>
                    </li>
                    

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
