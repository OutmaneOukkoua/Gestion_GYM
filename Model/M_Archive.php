<?php
require "../Model/M_Connexion.php";
require "../Model/IMethodeCRUD.php";

class ClientAR extends Connexion 
{
    Public $Id_Client ;
    
    function __construct()
    {
    }
    public function GetAll()
    {
        $rows = [];
        try {
            $this->connexion();
            $rows = Connexion::$cnx->query("call sp_AllClientArchive();")->fetchAll(PDO::FETCH_NUM);
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
            $rows = Connexion::$cnx->query("call sp_FindClientArchive(\"$val\")")->fetchAll(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $rows;
    }
    public function GetPaiementByClientArchive($id)
    {
        $rows = [];
        try {
            $this->connexion();
            $rows = Connexion::$cnx->query("call Sp_PaiementByIdArchive($id)")->fetchAll(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $rows;
    }
    public function Reply()
    {
        $n = null;
        try {
            $this->connexion();
            $n = Connexion::$cnx->prepare("call SP_ReplyClient(?)");
            $n->execute(array($this->Id_Client));
            $this->Deconnexion();
        } catch (Exception $ex) {
        }
        return $n;
    }

}
