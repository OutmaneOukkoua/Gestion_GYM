
<?php
require "../Model/M_paiment.php";

session_start();
if (isset($_POST["btnDaconnecte"])) {
    session_unset();
    session_destroy();
    header("location:./Login");
}
if (!isset($_SESSION["Admin"]))
    header("location:./Login");


$Paiement = new Paiement();
$messege = "";

    
    if (isset($_POST["add"])) {
        $Paiement->Date_DebutPaiement = $_POST["D_Paiement"];
        $Paiement->Date_FinPaiement = $_POST["D_FinPaiement"];
        $Paiement->Prix_Paiement = $_POST["Prix"];
        $Paiement->Id_Client = $_POST["idclient"];
    
        if (!empty($Paiement->Date_DebutPaiement) && !empty($Paiement->Date_FinPaiement) && !empty($Paiement->Prix_Paiement)) {
            $n = $Paiement->Add();
            if ($n !== false) {
                $messege = "Ajouté avec succès";
                $color = "green";
    
            } else {
                $messege = "Probleme !!!";
                $color = "red";
            }
        } else {
            $messege = "Veuillez remplir tous les champs obligatoires";
            $color = "red";
        }
    }
    

      



if (isset($_GET['info'])) {
    $info = $_GET['info'];
    
    $Paiements = $Paiement->GetPaiementByClient($info);
    
    foreach ($Paiements as $key) {
        $date_fin = strtotime($key[3]);
        $today = strtotime(date('Y-m-d'));
        $class = ($date_fin <= $today) ? 'text-danger' : 'text-success';
        echo    "<tr>
                    <td><span class='block-email'>".$key[1]."</td>  
                    <td><span class='block-email'>".$key[2]."</td>  
                    <td class='" . $class . "'>".$key[3]."</td> 
                    <td>".$key[4]." DH"."</td> 
                </tr>";
    }
} 




if (isset($_GET['recherche'])) {
    $info = $_GET['recherche'];
    if ($info == "") {
        $Paiements = $Paiement->GetAll();
    } else {
        $Paiements = $Paiement->Find($info);

    }

    foreach ($Paiements as $key) {
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

if (!isset($_GET['info']) && !isset($_GET['recherche'])){
        $Paiements = $Paiement->GetAll();
        require "../View/Paiement.php";
}




?>