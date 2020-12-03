
<?php 
  if (empty($_SESSION['user_compte'])) {
      header("Location:index.php");
  }

  ?>
<div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="admin.php">HEBERGEMENT</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                     
                    <li class="xn-title">Navigation</li>
                    <li class="active">
                        <a href="admin.php"><span class="fa fa-desktop"></span> <span class="xn-text">Tableau de Bord</span></a>                        
                    </li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Logement</span></a>
                        <ul>
                            <li><a href="data_personne?source=add_personne"><span class="fa fa-users"></span> Ajout Personne</a></li>   
                            <li><a href="liste_personnes.php"><span class="fa fa-users"></span>Liste Personne</a></li>   
                        </ul>
                    </li>
                     <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Utilisateur</span></a>
                        <ul>
                            <li><a href="users?source=add_users"><span class="fa fa-users"></span> Ajout Utilisateur</a></li>   
                            <li><a href="users?source=profile_users"><span class="fa fa-users"></span>Profile</a></li>   
                            <li><a href="liste_users.php"><span class="fa fa-users"></span>Liste Utilisateur</a></li>   
                        </ul>
                    </li>

                      <li class="">
                        <a href="profile.php"><span class="fa fa-files-o"></span> <span class="xn-text">Profile</span></a>
                        
                    </li>
                     <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Quitter</span></a>
                        <ul>
                            <li><a href="logout.php"><span class="fa fa-users"></span>Quitter la session???</a></li>   
                              
                        </ul>
                    </li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>