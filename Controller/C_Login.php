<?php


require "../Model/M_Connexion.php";
$login = "Admin";
$password = "";
$erreurlogin = "";
$erreurpass = "";

if (isset($_POST["Connect"])) {
    $login = $_POST["User"];
    $password = $_POST["Password"];

    if (!empty($login) and !empty($password)) {
        $db = new Connexion();
        $db->connexion();

        $st = Connexion::$cnx->prepare("SELECT * FROM admin WHERE Login = :login");
        $st->bindParam(":login", $login);
        $st->execute();
        $Admin = $st->fetch();

        if ($Admin) {
            if (password_verify($password, $Admin[1])) {
                session_start();
                $_SESSION["Admin"] = $Admin;
                header("Location: Accueil");
            } else {
                $erreurpass = "Mot de passe incorrect";
            }
        } else {
            $erreurlogin = "Utilisateur incorrect";
        }

        $db->Deconnexion();
    }
}

 require "../View/Login.php";

 
// echo password_hash("Jamal1",PASSWORD_DEFAULT)

?>

