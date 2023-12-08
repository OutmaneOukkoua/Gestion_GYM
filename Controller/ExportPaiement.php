
<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Clients.xls");

require "../Model/M_Connexion.php";
try {
    $cnx = new Connexion();
    $cnx->connexion();

    $stmt = Connexion::$cnx->query("select  p.Num_Paiement,c.Prenom_Client,c.Nom_Client,p.Date_Paiement,p.Date_DebutPaiement,p.Date_FinPaiement,p.Prix_Paiement from client c
    inner join paiement p using(Id_Client)");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) > 0) {
        echo "<table>";
        echo "<tr><th>Numero Paiement</th><th>Prenom de Client</th><th>Nom de Client</th><th>Date de Paiement</th>
        <th>Date Debut Paiement</th><th>Date Fin Paiement</th><th>Prix de Paiement</th>
        </td></tr>";
        foreach ($rows as $row) {
            echo "<tr><th>".$row["Num_Paiement"].
            "</th><th>".$row["Prenom_Client"].
            "</th><th>".$row["Nom_Client"].
            "</th><th>".$row["Date_Paiement"].
            "</th><th>".$row["Date_DebutPaiement"].
            "</th><th>".$row["Date_FinPaiement"].
            "</th><th>".$row["Prix_Paiement"].
            

            
            "</th></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$cnx->Deconnexion();
?>

