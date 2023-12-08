<?php
require '../Model/M_Archive.php';
session_start();
if (isset($_POST["btnDaconnecte"])) {
    session_unset();
    session_destroy();
    header("location:./Login");
}
if (!isset($_SESSION["Admin"]))
    header("location:./Login");


$client = new ClientAR();
$messege = "";

if (isset($_POST["Reply"])) {
    $client->Id_Client = $_POST["Id_ReplyClient"];
    $n = $client->Reply();
    if ($n == 1){
        $messege = "Probleme !!!";
        $color = "red";
    }
    else {
        $messege = "Ramener avec succées";
    $color = "green";
}
}


if (isset($_GET['info'])) {
    $info = $_GET['info'];
    
    $Paiements = $client->GetPaiementByClientArchive($info);
    
    foreach ($Paiements as $key) {
        $date_fin = strtotime($key[2]);
        $today = strtotime(date('Y-m-d'));
        $class = ($date_fin <= $today) ? 'text-danger' : 'text-success';
        echo    "<tr>
                    <td><span class='block-email'>".$key[0]."</td>  
                    <td><span class='block-email'>".$key[1]."</td>  
                    <td class='" . $class . "'>".$key[2]."</td> 
                    <td>".$key[3]." DH"."</td> 
                </tr>";
    }
}






if (isset($_GET['recherche'])) {
    $info = $_GET['recherche'];
    if ($info == "") {
        $Clients = $client->GetAll();
    } else {
        $Clients = $client->Find($info);

    }

    foreach ($Clients as $cl) {
                                          
        echo "<tr class='tr-shadow' onclick='get(this)'>
        <td >$cl[0]</td>
       
        <td class='desc'>$cl[1]</a disabled></td>
        <td class='desc'>$cl[2]</a disabled></td> 
        <td > <span class='block-email'>$cl[3]</span></td> 
        <td > <span class='block-email'>$cl[4]</span></td>
        
        <td > 
        <div class='table-data-feature'>                                         
        
       <a href='#Reply' class='item' data-toggle='modal' data-placement='top' title='Reply'>
        <i class='fa fa-rotate-left '></i>
         </a>
        <a  href='#showModal' class='item' data-toggle='modal' onclick='Detail($cl[0])' data-placement='top'  title='show'>
        <i class='fa fa-eye'></i>
        </a>
       </div>
       </td>
        </tr>
        <tr class='spacer'></tr>";
        }
        }

if (!isset($_GET['info']) && !isset($_GET['recherche'])){
    $Clients = $client->GetAll();
    require "../View/Archive.php";
}

?>