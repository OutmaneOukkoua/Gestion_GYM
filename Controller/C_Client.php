<?php
require "../Model/M_Client.php";
session_start();
if (isset($_POST["btnDaconnecte"])) {
    session_unset();
    session_destroy();
    header("location:./Login");
}
if (!isset($_SESSION["Admin"]))
    header("location:./Login");


$client = new Client();
$messege = "";
if (isset($_POST["add"]) ){
 if(!empty($_POST["Prenom"]) && !empty($_POST["Nom"])
&& !empty($_POST["DebutPaiement"]) && !empty($_POST["FinPaiement"])&& !empty($_POST["Prix"])) {
    $client->Prenom_Client = $_POST["Prenom"];
    $client->Nom_Client = $_POST["Nom"];
    $client->Date_DebutPaiement = $_POST["DebutPaiement"];
    $client->Date_FinPaiement = $_POST["FinPaiement"];
    $client->Prix_Paiement = $_POST["Prix"];
    $n = $client->Add();
    if ($n !== false) {
        $messege = "Ajouté avec succès";
        $color = "green";
    } else {
        $messege = "Probleme !!!";
        $color = "red";
    }
}else{
    $messege = "Remplire Tous Les choix";
        $color = "red";

}
}
if (isset($_POST["Update"])) {
    if(!empty($_POST["Prenom"]) && !empty($_POST["Nom"])){
    $client->Id_Client = $_POST["Id_Client"];
    $client->Nom_Client = $_POST["Nom"];
    $client->Prenom_Client = $_POST["Prenom"];
    $n = $client->Update();
    
    if ($n !== false) {
        $messege = "Modifier avec succès";
        $color = "green";
    } else  {
        $messege =$n ;
        $color = "red";
    }
} else  {
    $messege ="Remplire Tous Les choix" ;
    $color = "red";
}
}
if (isset($_POST["delete"])) {
    $client->Id_Client = $_POST["Id_DeleteClient"];
    $n = $client->Delete();
    if ($n == 1)
        $messege = "Virefy les information";
    else
        $messege = "Supprime avec succées";
    $color = "green";
}


if (isset($_GET['info'])) {
    $info = $_GET['info'];
    if (empty($info)) {
        $Clients = $client->GetAll();
    } else {
        $Clients = $client->Find($info);
    }

    foreach ($Clients as $cl) {
        if ($cl[4] >  date("Y-m-d")){
            $Satatut = '  <td>
            <span class="status--process">Active</span>
        </td>';}
          else{
              $Satatut = '<td>
              <span class="status--denied">No Active</span>
          </td>';
          };
        if ($cl[0] != "VIDE") {
          
            echo "<tr class='tr-shadow' onclick='get(this)'>
        <td >$cl[0]</td>
        <td class='desc'> $cl[1]</td>
        <td class='desc'>$cl[2]</td> 
        <td > <span class='block-email'>$cl[3]</span></td> 
         ". $Satatut ."
        
        <td> 
        <div class='table-data-feature'>                                         
           <a  href='#mediumModal' class='item' data-toggle='modal' data-placement='top'  title='Edit'>
            <i class='zmdi zmdi-edit'></i>
          </a>
          <a href='#smallmodal' class='item' data-toggle='modal' data-placement='top' title='Delete'>
          <i class='zmdi zmdi-delete'></i>
        </a>
          </div></td>
        </tr>
        <tr class='spacer'></tr>";
            }
        }
    }
else{
$Clients = $client->GetAll();
require "../View/Client.php";

}


?>