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
    <title>Paiement</title>
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

    <script>

        function Detail(id){
            var x = new XMLHttpRequest()
            x.open('GET', '../Controller/C_Paiement.php?info=' + id, true)
            x.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('informations').innerHTML = this.responseText;
                }
            }
            x.send();
        }

    </script>
    <script>
    function validateForm() {
        
        var debut = document.forms["myForm"]["D_Paiement"].value;
        var fin = document.forms["myForm"]["D_FinPaiement"].value;
        var prix = document.forms["myForm"]["Prix"].value;
        
        if (debut == "" || fin == "" || prix == "") {
    var errorMessage = document.createElement("p");
    errorMessage.innerHTML = "Veuillez remplir tous les champs obligatoires.";
    errorMessage.style.color = "red";
    document.getElementById("error-message").appendChild(errorMessage);
    
    setTimeout(function() {
        errorMessage.remove();
    }, 3000);
    
    return false;
}
    }
</script>
    
<script>
    function Recherche(ip) {
            let val = ip.value;
            var x = new XMLHttpRequest();
            x.open("GET", "../Controller/C_Paiement.php?recherche=" + val, true);
            x.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("infomations").innerHTML = this.responseText;
                }
            };
            x.send();
        }

    function get(parentTr) {
    const value_list = [];
    input_fields = document.getElementsByClassName("inputs");
    indice = 0;
    input_fields[0].value=parentTr.children[0].textContent;
    input_fields[1].value=parentTr.children[1].textContent;
    input_fields[2].value=parentTr.children[2].textContent;
    n = input_fields[3].value=parentTr.children[5].textContent;
    n2 = input_fields[4].value=parentTr.children[5].textContent;

    let dateN2 = new Date(n2);
    dateN2.setMonth(dateN2.getMonth() + 1);
    input_fields[4].value = dateN2.toISOString().slice(0,10);
    input_fields[3].setAttribute('min',n);
    input_fields[4].setAttribute('min',n2);
}

    
     setTimeout(function() {
            document.getElementById('message').style.display = 'none';
        }, 3000);
</script>


</head>
<body >
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <h3>جمعية الرجل القوي</h3>
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
                    <li>
                    <a href="Accueil">
                                <i class="fas fa-home"></i>Accueil</a>
                    </li>
                    <li>
                        <a href="Client">
                            <i class="fas fa-group"></i>Client</a>
                    </li>
                    <li class="active has-sub">
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
                <img src="../style/images/icon/ICON11.png" alt="KASBAR" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li>
                        <a href="Accueil">
                            <i class="fas fa-home"></i>Accueil</a>

                    </li>
                    <li>
                        <a href="Client">
                            <i class="fas fa-group"></i>Client</a>
                    </li>
                    <li class="active has-sub">
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
                        <form class="form-header" action="" method="POST">
                        <input class="au-input au-input--xl" type="text" name="search" id="paiement" placeholder="Recherche par Prenom &amp; Nom..." onkeyup="Recherche(this)" />
                            <button class="au-btn--submit" type="submit" disabled>
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
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
                                            <button type="submit" name="btnDaconnecte"  style="width: 320px; height: 50px;"  >
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

        <!-- HEADER DESKTOP-->
        <style>
            .account-dropdown__footer button:hover {
                background-color: #0080FF;
            }
        </style>
        <!-- MAIN CONTENT-->
        <div class="main-content">
                <div class="section__content section__content--p10">
                    <div class="container-fluid">
                            <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <h3 class="title-7 m-b-20">Gestion des Paiements</h3>
                                    </div>
                                    <div class="table-data__tool-right">
                                        
                                    <div class="col-md-6">
                                    <a href="ExportPaiement.php" class="btn btn-success"><span><i class="fa fa-file-excel-o"></i> Exporter</span></a>
                                    </div>
                                    
                                    </div>
                                </div>

                                <div class="table-responsive m-b-40">

                                <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <span id="message" class="alert" style="color: <?php echo $color; ?>;"><?php echo $messege ?></span>
                                    </tr>
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Date paiement</th>
                                        <th>Date début</th>
                                        <th class="date-fin">Date fin</th>
                                        <th>Prix</th>
                                        <th colspan="2"><center>Action</center></th>
                                    </tr>
                                </thead>

                                <tbody id="infomations">
                                    <?php    
                                    $rows_per_page = 8;
                                    $total_Paiements = count($Paiements);
                                    $total_pages = ceil($total_Paiements / $rows_per_page);
                                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $start_row = ($current_page - 1) * $rows_per_page;
                                    $end_row = $start_row + $rows_per_page - 1;

        

                                    if (!isset($_GET['info'])) {
                                        for ($i = $start_row; $i <= $end_row && $i < $total_Paiements; $i++) {
                                            $key = $Paiements[$i];
                                            if ($key[0] != "VIDE"){
                                                $date_fin = strtotime($key[5]);
                                                $today = strtotime(date('Y-m-d'));
                                                $class = ($date_fin <= $today) ? 'text-danger' : 'text-success';
                                                echo "<tr onclick='get(this)''>
                                                <td style='display:none'>" . $key[0] . "</td> 
                                                <td class='text-primary'>" . $key[1] . "</td> 
                                                <td class='text-primary'>" . $key[2] . "</td>
                                                <td > <span class='block-email'>"  . $key[3] . "</span> </td> 
                                                <td><span class='block-email'>" . $key[4] . "</span> </td>
                                                <td class='" . $class . "'>" . $key[5] . "</td>
                                                <td>" . $key[6] ." DH". "</td>
                                                <td >
                                                                                        
                                                <div class='table-data-feature'> 
                                                <button type='button' class='btn btn-outline-primary btn-rounded btn-sm' data-toggle='modal' data-target='#largeModal'>Payer</button>
                                                <span>&nbsp;&nbsp;&nbsp;&nbsp</span>
                                                                                
                                                <a  href='#showModal' class='item' data-toggle='modal' onclick='Detail($key[0])' data-placement='top'  title='afficher'>
                                                <i class='fa fa-eye'></i>
                                                </a>   </div> 
                                                                                
                                                </td>
                                                </tr>";
                                            } 
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table><br>
  
                            <?php
                                echo "<nav aria-label='Pagination'>";
                                echo "<ul class='pagination justify-content-center'>";
                                if ($current_page > 1) {
                                    echo "<li class='page-item'><a class='page-link' href='?page=".($current_page-1)."'><i class='bi bi-chevron-left'></i> Précédent</a></li>";
                                }
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $current_page) {
                                        echo "<li class='page-item active'><a class='page-link'>$i</a></li>";
                                    } else {
                                        echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                                    }
                                }
                                if ($current_page < $total_pages) {
                                    echo "<li class='page-item'><a class='page-link' href='?page=".($current_page+1)."'>Suivant <i class='bi bi-chevron-right'></i></a></li>";
                                }
                                echo "</ul>";
                                echo "</nav>";
                                
                                    
                                    ?>
                        

                        </div> 
                    </div>
                </div>
            </div>
                </div>



              





            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <form action="" method="post" name="myForm" onsubmit="return validateForm()">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">Ajouter Paiement</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <input type="hidden" id="street" name="idclient" class="form-control inputs" placeholder="" class="form-control" readonly>
                                    <div><span id="error-message" style="color: red;"></span></div>           

                                <div class="col-8">
                                    <label for="street" id="street" class="form-control-label">Nom</label>

                                    <input type="text" id="street" placeholder="Nom" class="form-control inputs"  name="Nom" disabled >
                                </div>
                                <div class="col-8">
                                    <label for="street" class=" form-control-label">Prenom</label>
                                    <input type="text" id="street" placeholder="Prenom" class="form-control inputs" class="form-control" name="Prenom" disabled>
                                </div>
                                <div class="col-8">
                                    <label for="check_in_date" class=" form-control-label ">Date début </label>
                                    <input type="date" name="D_Paiement" id="check_in_date" class="form-control inputs" >
                                </div>
                                <div class="col-8">
                                    <label for="check_out_date" class=" form-control-label">Date fin </label>
                                    <input type="date" name="D_FinPaiement" id="check_out_date" class="form-control inputs" >
                                    <span id="error-message-date" style="color: red;"></span>
                                </div>
                                <div class="col-4">
                                    <label for="street" class="form-control-label" >Prix</label>
                                    <input type="Number" class="form-control" name="Prix" min="1" id="street">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="add" class="btn btn-success">Ajouter</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.querySelector('#check_out_date').addEventListener('change', function() {
        var debutPaiement = new Date(document.querySelector('#check_in_date').value);
        var finPaiement = new Date(this.value);
        if (finPaiement < debutPaiement) {
            //document.querySelector('#check_out_date').value = '';
            document.querySelector('#error-message-date').innerText = 'La date de fin de paiement ne peut pas être antérieure à la date de début de paiement';
        } else {
            document.querySelector('#error-message-date').innerText = '';
        }
    });
</script>
<script>
const dateInput = document.getElementById("check_in_date");
const today = new Date();
const formattedDate = today.toISOString().substr(0, 10);
dateInput.value = formattedDate;
let endDate = new Date(today.getTime() + (30 * 24 * 60 * 60 * 1000));
let endDateString = endDate.toISOString().substr(0, 10);
document.getElementById("check_out_date").value = endDateString;
const checkInDate = document.getElementById("check_in_date");
const checkOutDate = document.getElementById("check_out_date");
checkInDate.addEventListener("change", () => {
  const startDate = new Date(checkInDate.value);
  startDate.setDate(startDate.getDate() + 30);
  const endDate = startDate.toISOString().slice(0, 10);
  checkOutDate.value = endDate;
});
</script>

    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="largeModalShow" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalShow">Tous les Paiements</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p name="nomclient"></p>
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <th>Date Paiement</th>
                                    <th>Date début</th>
                                    <th>Date fin</th>
                                    <th>Prix </th>
                                </thead>
                                <tbody id="informations">

                                </tbody>
                            </table>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="../style/vendor/jquery-3.2.1.min.js"></script>
    <script src="../style/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="../style/vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <!-- Main JS-->
    <script src="../style/js/Main.js"></script>



</body>
</html>