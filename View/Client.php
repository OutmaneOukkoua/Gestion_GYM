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
    <title>Client</title>

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
     
   
     function Recherche(ip) {
            let val = ip.value;
            var x = new XMLHttpRequest();
            x.open("GET", "../Controller/C_Client.php?info=" + val, true);
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
  for (const value of parentTr.children) {
    value_list.push(value.textContent);
  }
  for (const input of input_fields) {
    input.value = value_list[indice]; 
    indice++;
  }
  input_fields[input_fields.length - 1].value =
                value_list[value_list.length - value_list.length];
            input_fields[input_fields.length - 2].value =
                value_list[value_list.length - value_list.length];
}

        
    setTimeout(function() {
            document.getElementById('message').style.display = 'none';
        }, 2000);
</script>

<script>
    function validateFormUpdate() {
        var nom = document.forms["myFormUpdate"]["Nom"].value;
        var prenom = document.forms["myFormUpdate"]["Prenom"].value;
        
        
        if (nom == "" || prenom == "") {
    var errorMessage = document.createElement("p");
    errorMessage.innerHTML = "Veuillez remplir tous les champs obligatoires.";
    errorMessage.style.color = "red";
    document.getElementById("error-message-update").appendChild(errorMessage);
    
    setTimeout(function() {
        errorMessage.remove();
    }, 3000);
    
    return false;
}
    }
</script>
<script>
    function validateForm() {
        var nom = document.forms["myForm"]["Nom"].value;
        var prenom = document.forms["myForm"]["Prenom"].value;
        var debut = document.forms["myForm"]["DebutPaiement"].value;
        var fin = document.forms["myForm"]["FinPaiement"].value;
        var prix = document.forms["myForm"]["Prix"].value;
        
        if (nom == "" || prenom == "" || debut == "" || fin == "" || prix == "") {
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
    document.querySelector('#check_out_date').addEventListener('change', function() {
        var debutPaiement = new Date(document.querySelector('#check_in_date').value);
        var finPaiement = new Date(this.value);
        if (finPaiement < debutPaiement) {
            // document.querySelector('#check_out_date').value = '';
            document.querySelector('#error-message-date').innerText = 'La date de fin de paiement ne peut pas être antérieure à la date de début de paiement';
        } else {
            document.querySelector('#error-message-date').innerText = '';
        }
    });
</script>

</head>
<body>
       
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
                        <li class="active has-sub">
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
                        <li class="active has-sub">
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
                            <form class="form-header" action="" method="POST">
                                <input type="text" id="client" class="au-input au-input--xl" name="client" placeholder="Recherche par Prenom &amp; Nom..." onkeyup="Recherche(this)">
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
            <!-- HEADER DESKTOP-->
            <div class="main-content">
                <div class="section__content section__content--p1">
                    <div class="container-fluid">
                            <div class="row">
                            <div class="col-md-12"><br>
                                <!-- DATA TABLE -->
                                
                                <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <h3 class="title-7 m-b-20">Gestion des Clients</h3>
                                    </div>
                                    <div class="table-data__tool-right">
                                    <a href="ExportClient.php" class="btn btn-success"><span><i class="fa fa-file-excel-o"></i> Exporter</span></a>

                                    <button class="au-btn au-btn-icon au-btn--blue au-btn--small" data-toggle="modal" data-target="#largeModal">
                                            <i class="zmdi zmdi-plus "></i>Ajouter Client</button>
                                        
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                        <tr> <span id="message" class="alert" style="color: <?php echo $color; ?>;"><?php echo $messege ?></span>

                                            <tr>
                                                <th>#</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Date inscription</th>
                                                <th>Statut</th>
                                                <th colspan="2"><center>Action</center></th>
                                            </tr>
                                        </thead>
                                                <tbody id="infomations">
                                <?php
                                $rows_per_page = 8;
                                $total_clients = count($Clients);
                                $total_pages = ceil($total_clients / $rows_per_page);
                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $start_row = ($current_page - 1) * $rows_per_page;
                                $end_row = $start_row + $rows_per_page - 1;

                                if (!isset($_GET['info'])) {
                                    for ($i = $start_row; $i <= $end_row && $i < $total_clients; $i++) {
                                        $cl = $Clients[$i];
                                        if ($cl[4] >  date("Y-m-d")){
                                            $Satatut = '  <td>
                                            <span class="status--process">Actif</span>
                                        </td>';}
                                          else{
                                              $Satatut = '<td>
                                              <span class="status--denied">Non Actif</span>
                                          </td>';
                                          };
                                        if ($cl[0] != "VIDE") {
                                          
                                            echo "<tr class='tr-shadow' onclick='get(this)'>
                                        <td >$cl[0]</td>
                                       
                                        <td class='desc'>$cl[1]</a disabled></td>
                                        <td class='desc'>$cl[2]</a disabled></td> 
                                        <td > <span class='block-email'>$cl[3]</span></td> 
                                         ". $Satatut ."
                                        
                                        <td > 
                                        <div class='table-data-feature'>                                         
                                        <a  href='#mediumModal' class='item' data-toggle='modal' data-placement='top'  title='Modifier'>
                                         <i class='zmdi zmdi-edit'></i>
                                       </a>
                                       <a href='#smallmodal' class='item' data-toggle='modal' data-placement='top' title='Supprimer'>
                                       <i class='zmdi zmdi-delete'></i>
                                     </a>
                                       </div>
                                        </tr>
                                        <tr class='spacer'></tr>";
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
    

    <!-- modal AJoute///////////////////////////////////////////////////////////////////: -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                                <form action="" method="post" name="myForm" onsubmit="return validateForm()">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="largeModalLabel">Ajouter Client</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                            
                                 <div><span id="error-message" style="color: red;"></span></div>           
                                <div class="col-8">
                                <label for="street" class=" form-control-label">Nom</label>
                                <input type="text" name="Nom" id="street" placeholder="Nom" class="form-control" pattern="^[A-Za-z]+$" title="Veuillez saisir uniquement des caractères alphabétiques">
                            </div>
                            <div class="col-8">
                                <label for="street" class=" form-control-label">Prenom</label>
                                <input type="text" name="Prenom" id="street" placeholder="Prenom" class="form-control" pattern="^[A-Za-z]+$" title="Veuillez saisir uniquement des caractères alphabétiques">
                            </div>
                                                        <div class="col-8">
                                <label for="check_in_date" class=" form-control-label">Date début </label>
                                <input type="date" name="DebutPaiement" id="check_in_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col-8">
                                <label for="check_out_date" class=" form-control-label">Date fin </label>
                                <input type="date" name="FinPaiement" id="check_out_date" class="form-control" min="<?php echo date('Y-m-d'); ?>">
                                <span id="error-message-date" style="color: red;"></span>
                            </div>
                                    <div class="col-8">
                                    <label for="street" class=" form-control-label">Prix </label>
                                    <input type="Number" class="form-control" name="Prix" id="street" min="1" >
                                    </div>
                               
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="add" class="btn btn-success">Confirme</button>
                                

                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <script>
    document.querySelector('#check_out_date').addEventListener('change', function() {
        var debutPaiement = new Date(document.querySelector('#check_in_date').value);
        var finPaiement = new Date(this.value);
        if (finPaiement < debutPaiement) {
            // document.querySelector('#check_out_date').value = '';
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
                
    <!-- modal Modifier //////////////////////////////////////////////////////////////////// -->
			<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Modifier Client</h5>
                        <form action="" method="post" name="myFormUpdate" onsubmit="return validateFormUpdate()">

							    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							    </button>
						    </div>
                            <div class="modal-body">
                            
                                <input type="hidden" id="Id_Client" name="Id_Client" class="inputs">
                                
                                <div><span id="error-message-update" style="color: red;"></span></div>           

                                <div class="col-8">
                                        <label for="street" class=" form-control-label">Nom</label>
                                        <input type="text" name="Nom" id="street" placeholder="Nom" class="inputs form-control" pattern="[A-Za-z]+" title="Veuillez saisir uniquement des caractères alphabétiques">
                                    </div>
                                <div class="col-8">
                                    <label for="street" class=" form-control-label">Prenom</label>
                                    <input type="text" name="Prenom" id="street" placeholder="Prenom" class="inputs form-control" pattern="[A-Za-z]+" title="Veuillez saisir uniquement des caractères alphabétiques">
                                    </div>
                                
                            </div>
                            <input  type="hidden"  class="inputs">
						
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="submit" name="Update" class="btn btn-warning ">Modifier</button>
						</div>
                        </form>
					</div>
				</div>
			</div>
 <!-- modal small -->
 <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="smallmodalLabel">Supprimer Client</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
                        <form action="" method="POST" id="form">
                           
                            <input type="hidden" id="Id_Client" name="Id_DeleteClient" class="inputs">
                           
						<div class="modal-body">
							<p>
							Vous êtes sûr de le déplacer vers l'archive ?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							<button type="submit" name="delete" class="btn btn-danger">Confirm</button>
						</div>
                        <form>
					</div>
				</div>
			</div>
        
</body>


    
            

    <!-- Jquery JS-->
    <script src="../style/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../style/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="../style/vendor/animsition/animsition.min.js"></script>
    <!-- Main JS-->
    <script src="../style/js/Main.js"></script>
   
</body>
</html>