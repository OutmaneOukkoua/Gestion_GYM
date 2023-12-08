<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <!-- Title Page-->
    <title>Accueil</title>
    <!-- Fontfaces CSS-->
    <link href="../style/css/font-face.css" rel="stylesheet" media="all">
    <link href="../style/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../style/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../style/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="../style/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <!-- Vendor CSS-->
    <link href="../style/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../style/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="../style/css/theme.css" rel="stylesheet" media="all">

    <script >
    var Active = document.getElementById("ALL").innerText -  document.getElementById("No_Active").innerText;
    var No_Active =  document.getElementById("No_Active").innerText;
    
</script>
</head>

<body>
       
 <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        
                        <h3 >جمعية الرجل القوي</h3>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                    <li class="active has-sub">
                            <a class="js-arrow" href="Accueil" >
                                <i class="fas fa-home"></i>Accueil</a>
                           
                        </li>
                        <li>
                            <a href="Client">
                                <i class="fas fa-group"></i>Client</a>
                        </li>
                        <li >
                            <a href="Paiement">
                                <i class="fas fa-dollar"></i>Paiement</a>
                        </li>
                        <li >
                            <a href="Archive">
                                <i class="fa fa-archive"></i>Archive</a>
                         </li>   
            
                    </ul>
                </div>
            </nav>
    </header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="../style/images/icon/ICON11.png" alt="R" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li  class="active has-sub">
                            <a class="js-arrow" href="Accueil" >
                                <i class="fas fa-home"></i>Accueil</a>
                           
                        </li>
                        <li >
                            <a href="Client">
                                <i class="fas fa-group"></i>Client</a>
                        </li>
                       
                        <li >
                            <a href="Paiement">
                                <i class="fas fa-dollar"></i>Paiement</a>
                        </li>
                        <li >
                            <a href="Archive">
                                <i class="fa fa-archive"></i>Archive</a>
                            
                                </li>   
                                
                    </ul>
                </nav>
            </div>
        </aside>
<!-- END MENU SIDEBAR-->

 <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                        <div class="form-header" >
                       
                                 <div class="col-md-12">
                            <h1 class="title-4">Bienvenue à nouveau 
                                <span><?php echo $_SESSION["Admin"][0]."!" ?></span>
                            </h1>
                        </div>
                        </div>
                            <div class="header-button">

                            <div class="noti-wrap">
                                   
                            </div>
                            
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Se déconnecter</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../style/images/icon/imgg.jpg" alt="gym" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION["Admin"][0] ?></a>
                                                    </h5>
                                                    <span class="email">Créer par Outmane Oukkoua</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                            
                                                    <form action="" method="post">
                                                <button type="submit" name="btnDaconnecte" style="width: 320px; height: 50px;" >
                                                    <i class="zmdi zmdi-power"></i> Se déconnecter
                                                    </button>
                                                    </form>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <style>
                .account-dropdown__footer button:hover {
                    background-color: #0080FF;
                }
            </style>
        

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            
                        </div>
            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                            <h2 class="number" id="ALL"><?php echo $nbClients ;?></h2>
                                <span class="desc">TOUS LES CLIENTS </span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                            <h2 class="number" id="No_Active"><?php echo $nbClientsNo ;?></h2>
                                <span class="desc"> CLIENTS HORS LIGNE</span>
                                <div class="icon">
                                                <i class="zmdi fa-frown-o"></i>
                                            </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                            <h2 class="number"><?= number_format($ThisMonth,2)." MAD";?></h2>
                                <span class="desc">CE MOIS-CI</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                            <h2 class="number"><?= number_format($Total,2)." MAD";?></h2>
                                <span class="desc">Gains totaux cette année</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

             <!-- STATISTIC CHART-->
             <section class="statistic-chart">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">Statistiques</h3>
                        </div>  
                    </div>
                    <div class="row">
                        
                        <div class="col-md-6 col-lg-6">
                            <!-- TOP CAMPAIGN-->
                            <div class="top-campaign">
                                <h3 class="title-3 m-b-30">Meilleurs clients</h3>
                                <div class="table-responsive">
                                    <table class="table table-top-campaign">
                                        <tbody>
                                       <?php $i = 1;
                                       while($donnees =$req->fetch())
                                            { ?>
                                            <tr>
                                                <td><?php echo $i.".".$donnees["Nom_Client"]." ".$donnees["Prenom_Client"]; ?></td>
                                                <td><?= number_format( $donnees["Prix"],2)." MAD"; $i= $i+1;?></td>
                                            </tr>
                                           <?php   }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END TOP CAMPAIGN-->
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <!-- CHART PERCENT-->
                            <div class="chart-percent-2">
                                <h3 class="title-3 m-b-30">Clients par %</h3>
                                <div class="chart-wrap">
                                    <canvas id="percent-chart2"></canvas>
                                    <div id="chartjs-tooltip">
                                        <table></table>
                                    </div>
                                </div>
                                <div class="chart-info">
                                    <div class="chart-note">
                                        <span class="dot dot--blue"></span>
                                        <span>Client actif</span>
                                    </div>
                                    <div class="chart-note">
                                        <span class="dot dot--red"></span>
                                        <span>Client non actif</span>
                                    </div>
                                </div>
                            </div>
                          
                    </div>
                    </div>
                </div>
            </div>
        </div>




    <!-- Jquery JS-->
    <script src="../style/vendor/jquery-3.2.1.min.js"></script>
    <script src="../style/vendor/animsition/animsition.min.js"></script>
    <script src="../style/vendor/chartjs/Chart.bundle.min.js"></script>
    <!-- Main JS-->
    <script src="../style/js/Main.js"></script>



</body>
</html>