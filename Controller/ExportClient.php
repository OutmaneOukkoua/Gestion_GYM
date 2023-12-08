
<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Clients.xls");

require "../Model/M_Connexion.php";
try {
    $cnx = new Connexion();
    $cnx->connexion();

    $stmt = Connexion::$cnx->query("SELECT * FROM  Client");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows) > 0) {
        echo "<table>";
        echo "<tr><th>Id de Client</th><th>Prenom de Client</th>
        <th>Nom de Client</th><th>date inscription </th>
        </td></tr>";
        foreach ($rows as $row) {
            echo "<tr><th>".$row["Id_Client"].
            "</th><th>".$row["Prenom_Client"].
            "</th><th>".$row["Nom_Client"].
            "</th><th>".$row["Date_inscription"].
            
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

