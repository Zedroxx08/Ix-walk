<?php
include_once '../Config/config.php';
include_once '../Config/AntiXss.php';
include_once "../Config/connexpdo.inc.php";
$conn = connexpdo("Myparams");
global $messages;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $conn) {
    $nom      = htmlspecialchars(trim($_POST['NomInsc']));
    $prenom   = htmlspecialchars(trim($_POST['PrenomInsc']));
    $email    = filter_var(trim($_POST['EmailInsc']), FILTER_VALIDATE_EMAIL);
    $mdp = $_POST['PasswordInsc'];
    $numero   = htmlspecialchars(trim($_POST['NumInsc']));
    $pays     = htmlspecialchars(trim($_POST['PaysInsc']));
    $adresse  = htmlspecialchars(trim($_POST['AdresseInsc']));

    if (!$email || strlen($mdp) < 8) {
        $_SESSION['info'] = secu($messages['EmailMdpPasValideInsc']);
        $_SESSION['connexion'] = false;
        header('Location: formulaire.php');
        exit();
    }
    $mdpcrypter = password_hash($mdp, PASSWORD_DEFAULT);
    try {
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