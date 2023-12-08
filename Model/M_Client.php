<?php
require "../Model/M_Connexion.php";
require "../Model/IMethodeCRUD.php";

class Client extends Connexion implements IMethodeCRUD
{
    Public $Id_Client ;
    Public $Prenom_Client ;
    Public $Nom_Client ;
    Public $Date_DebutPaiement ;
    Public $Date_FinPaiement ;
    Public $Prix_Paiement ;
    function __construct()
    {
    }


    
    public function Add()
    {
        try{
        $n = null;
        
            $this->connexion();
            $n = Connexion::$cnx->prepare("call sp_AddClient(?,?,?,?,?)");
          
            $n->execute(array(
                $this->Prenom_Client,
                $this->Nom_Client,
                $this->Date_DebutPaiement,
                $this->Date_FinPaiement,
                $this->Prix_Paiement
                 ));
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


    public function Reply()
    {
     
    }





    public function Update()
    {
        $n = null;
        try {
            $this->connexion();
            $n = Connexion::$cnx->prepare("call SP_UpdateClient(?,?,?)");
            $n->execute(array($this->Prenom_Client,$this->Nom_Client,$this->Id_Client));
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $n;
    }
    public function GetAll()
    {
        $rows = [];
        try {
            $this->connexion();
            $rows = Connexion::$cnx->query("call sp_AllClient")->fetchAll(PDO::FETCH_NUM);
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
            $rows = Connexion::$cnx->query("call sp_FindClient(\"$val\")")->fetchAll(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $rows;
    }
    public function Delete()
    {
        $n = null;
        try {
            $this->connexion();
            $n = Connexion::$cnx->prepare("call SP_DeleteClient(?)");
            $n->execute(array($this->Id_Client));
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $n;
    }

}
