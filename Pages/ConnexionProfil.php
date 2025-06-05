<?php
include_once '../Config/config.php';
include_once '../Config/AntiXss.php';
include_once "../Config/connexpdo.inc.php";
$conn = connexpdo("Myparams");
global $messages;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn && isset($_POST['mail'], $_POST['password'])) {
    $email = filter_var(trim($_POST['mail']),FILTER_VALIDATE_EMAIL);
    $password = htmlspecialchars($_POST['password']);
    if (!$email ||strlen($password) < 8) {
        $_SESSION['infoConn'] = secu($messages['EmailMdpPasValideConn']);
        header('Location: connexion.php');
        exit();
    }
    try{//Essaye de récup toutes les données où email est égale à email entré
        $stmt = $conn->prepare("SELECT * FROM users WHERE mail = :email");
        $stmt->execute(['email' => $email]);
        $utilisateur = $stmt->fetch();

        if ($utilisateur && password_verify($password, $utilisateur['password'])) {//Si il y a quelque chose dans utilisateur va vérifie le mot de passe et créer tout sorte info utile pour les sessions
            $_SESSION['id'] = $utilisateur['id'];
            $_SESSION['nom'] = $utilisateur['nom'];
            $_SESSION['prenom'] = $utilisateur['prenom'];
            $_SESSION['mail'] = $utilisateur['mail'];
            $_SESSION['num'] = $utilisateur['num'];
            $_SESSION['pays'] = $utilisateur['pays'];
            $_SESSION['adresse'] = $utilisateur['adresse'];
            $_SESSION['connexion'] = true;
            session_regenerate_id(true);//régénère un nouvel id (cookie session cote client)
            header("Location: profil.php");
            exit();
        } else {
            $_SESSION['infoConn'] = secu($messages['EmailMdpPasValideConn']);
            header("Location: connexion.php");
            exit();
        }
    }catch(PDOException $e){
        $_SESSION['infoConn'] = secu($messages['ErreurConn']);
        header("Location: connexion.php");
        exit();
    }
} else {
    $_SESSION['infoConn'] = secu($messages['MauvaiseConn']);
    header("Location: connexion.php");
    exit();
}