<?php
require "../Model/M_Connexion.php";
require "../Model/IMethodeCRUD.php";


class Paiement extends Connexion implements IMethodeCRUD
{
    public $Date_DebutPaiement;
    public $Date_FinPaiement;
    public $Prix_Paiement;
    public $Id_Client;
    
    
    function __construct()
    {
    }



    public function Add()
{
    try {
        $this->connexion();
        $n = Connexion::$cnx->prepare("call sp_AddPaiement(?,?,?,?)");
        $n->execute(array($this->Date_DebutPaiement,$this->Date_FinPaiement,$this->Prix_Paiement,$this->Id_Client));
        $this->Deconnexion();
        return $n;
    } catch (PDOException $e) {
        if ($e->getCode() == "23000" || $e->getCode() == "45000") {
            return false;
        } else {
            throw $e;
        }
    }
}

    public function Update()
    {
      
    }


    public function Delete()
    {
     
    }

    public function Reply()
    {
     
    }

    public function GetAll()
    {
        $rows = [];
        try {
            $this->connexion();
            $rows = Connexion::$cnx->query("call Sp_GetPaiement()")->fetchAll(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $rows;
    }




    
    public function Find($val)
    {
        $rows = [];
        try {
            $this->connexion();
            $rows = Connexion::$cnx->query("call Sp_RecherechePaiement(\"$val\")")->fetchAll(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $rows;
    }






    public function GetPaiementByClient($id)
    {
        $rows = [];
        try {
            $this->connexion();
            $rows = Connexion::$cnx->query("call Sp_PaiementById($id)")->fetchAll(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $rows;
    }
}
?>