<?php
require "../Model/M_Connexion.php";


class Home extends Connexion 
{
 public function F1(){
    $conn = mysqli_connect("localhost", "root", "", "Gestion_Gym");
    $sqlnbClient = "call sp_TotalClients();";
    $resultnbClients = mysqli_query($conn, $sqlnbClient);
    if ($resultnbClients && mysqli_num_rows($resultnbClients) > 0) {
    $row = mysqli_fetch_assoc($resultnbClients);
    $nbClients = $row['nbC'];
    } else {
        $nbClients = 0;
    };
    return $nbClients;
    }
    public function F2()
    {
        $conn = mysqli_connect("localhost", "root", "", "Gestion_Gym");
        $sqlNoActive = "call sp_ClientNoActive();";
        $NoActive = mysqli_query($conn, $sqlNoActive);
        if ($NoActive && mysqli_num_rows($NoActive) > 0) {
        $rows = mysqli_fetch_assoc($NoActive);
        $NoActive = $rows['NoActive'];
        } else {
        $NoActive = 0;
        };
        return $NoActive;
        
    }
    public function F3(){
        $conn = mysqli_connect("localhost", "root", "", "Gestion_Gym");
        $sqlTotalMoney = "call sp_MoneyOfYear();";
        $resultTotal = mysqli_query($conn, $sqlTotalMoney);
        if ($resultTotal && mysqli_num_rows($resultTotal) > 0) {
        $row = mysqli_fetch_assoc($resultTotal);
        $Total = $row['Total'];
        } else {
        $Total = 0;
        };
        return $Total;
    }
    public function F4(){
        $conn = mysqli_connect("localhost", "root", "", "Gestion_Gym");
         $sqlThisMonth = "call sp_ThisMonth();";
         $resulta = mysqli_query($conn, $sqlThisMonth);
        if ($resulta && mysqli_num_rows($resulta) > 0) {
        $row = mysqli_fetch_assoc($resulta);
        $ThisMonth = $row['ThisMonth'];
        }
        if ($ThisMonth === null) {
         $ThisMonth = 0;
        };
        return $ThisMonth;
         }
    public function F5()
         {
             $rows = [];
             try {
                 $this->connexion();
                 $rows = Connexion::$cnx->query("select * from vw_top10");
                 $this->Deconnexion();
             } catch (Exception $ex) {
             }
             return $rows;
         }
         

}
?>