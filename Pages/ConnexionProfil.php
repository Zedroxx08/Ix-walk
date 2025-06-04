<?php
include_once '../Config/config.php';
include_once '../Config/AntiXss.php';
include_once "../Config/connexpdo.inc.php";
$conn = connexpdo("Myparams");
global $messages;
if (isset($_GET['mail'], $_GET['password'])) {
    $email = $_GET['mail'];
    $password = $_GET['password'];

    try{
        $stmt = $conn->prepare("SELECT * FROM users WHERE mail = :email");
        $stmt->execute(['email' => $email]);
        $utilisateur = $stmt->fetch();

        if ($utilisateur && password_verify($password, $utilisateur['password'])) {
            $_SESSION['id'] = $utilisateur['id'];
            $_SESSION['nom'] = $utilisateur['nom'];
            $_SESSION['prenom'] = $utilisateur['prenom'];
            $_SESSION['mail'] = $utilisateur['mail'];
            $_SESSION['num'] = $utilisateur['num'];
            $_SESSION['pays'] = $utilisateur['pays'];
            $_SESSION['adresse'] = $utilisateur['adresse'];
            $_SESSION['connexion'] = true;
            session_regenerate_id(true);
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