<?php
include_once '../Config/config.php';
include_once '../Config/AntiXss.php';
include_once "../Config/connexpdo.inc.php";
$conn = connexpdo("Myparams");
global $messages;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn) {//Vérifie la methode d'envoi du formulaire
    $nom      = htmlspecialchars(trim($_POST['NomInsc']));//trim supprimer les espace à la fin et au debut.
    $prenom   = htmlspecialchars(trim($_POST['PrenomInsc']));
    $email    = filter_var(trim($_POST['EmailInsc']), FILTER_VALIDATE_EMAIL);//Filter_var permet de mettre en paramètres le type de filtre et la je demande si email est une email valide si oui retourne True sinon False
    $mdp = $_POST['PasswordInsc'];//Je ne crypte pas le mot de passe mtn pour voir la longueur
    $numero   = htmlspecialchars(trim($_POST['NumInsc']));
    $pays     = htmlspecialchars(trim($_POST['PaysInsc']));
    $adresse  = htmlspecialchars(trim($_POST['AdresseInsc']));
    //!email signifie que si c false cela va prendre inverse donc cela reviens à faire true
    if (!$email || strlen($mdp) < 8) {//Si !email ou mot de passe plus petit que 8 caractères renvoie sur la pages inscription
        $_SESSION['info'] = secu($messages['EmailMdpPasValideInsc']);
        $_SESSION['connexion'] = false;
        header('Location: formulaire.php');
        exit();
    }
    $mdpcrypter = password_hash($mdp, PASSWORD_DEFAULT);//Crypte le mot de passe
    try {//Essaye inserer les données dans la db sinon erreur
        $stmt = $conn->prepare("INSERT INTO users (nom, prenom, mail, password, num, pays, adresse)
                               VALUES (:nom, :prenom, :email, :motdepasse, :numero, :pays, :adresse)");
        $stmt->execute([
            'nom'       => $nom,
            'prenom'    => $prenom,
            'email'     => $email,
            'motdepasse'=> $mdpcrypter,
            'numero'    => $numero,
            'pays'      => $pays,
            'adresse'   => $adresse
        ]);
        $_SESSION['infoConn'] = secu($messages['InscReussi']);
        $_SESSION['connexion'] = false;
        header('Location: connexion.php');
        exit();
    } catch (PDOException $e) {
        $_SESSION['info'] = secu($messages['EmailAlrUse']);
        $_SESSION['connexion'] = false;
        header('Location: formulaire.php');
        exit();
    }
} else {
    $_SESSION['connexion'] = false;
    $_SESSION['info'] = secu($messages['ErreurInsc']);
    header('Location: formulaire.php');
    exit();
}