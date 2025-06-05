<?php
global $messages;
include_once '../Config/config.php';
include_once '../Config/AntiXss.php';
include_once "../Config/connexpdo.inc.php";
$conn = connexpdo("Myparams"); //Utilse la fonction connexpdo avec l'argument Myparams
if ($conn && isset($_GET['id']) && isset($_SESSION['id'])) {//Vérifie si on est bien connecter à la db
    $id_chaussure = $_GET['id']; //Récupère id_chaussures grâce au lien cliquer dans produits.php
    $id_user = $_SESSION['id'];//Récupère id user grâce à la session

    try { //Essaye d'ajouter les valeurs id_chaussures et id_user dans la table chaussure_livraison si réussite affiche message de réussite sinon message erreur.
        $stmt = $conn->prepare("INSERT INTO chaussures_livraison (id_chaussure, id_user) VALUES (:id_chaussure, :id_user)");
        $stmt->execute([//Execute avec les paramètres donner
            'id_chaussure' => $id_chaussure,
            'id_user' => $id_user
        ]);
        $_SESSION['achat'] = secu($messages['AchatReussi']);
    } catch (PDOException $e) {
        $_SESSION['achat'] = secu($messages['ErreurAchat']);
    }
}
header("Location: produits.php");//Envoie sur la page produits
exit();//Conseiller après un header