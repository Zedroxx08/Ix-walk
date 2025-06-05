<?php
include_once '../Config/config.php';
include_once '../Config/AntiXss.php';
include_once "../Config/connexpdo.inc.php";
$conn = connexpdo("Myparams");
global $messages;
//Je fais globalement la même chose que pour supprimer la livraison mais pour un utilisateur et avant je dois supprimer
//Tout c'est commande car cela affecte la table users comme chaussures_livraison a un FK de users
if ($conn && isset($_GET['id_user']) ) {
    $id_user = $_GET['id_user'];
    try{
        $stmt = $conn->prepare("DELETE FROM chaussures_livraison WHERE id_user = :id");
        $stmt->execute([
            'id' => $id_user,
        ]);
        if($stmt->rowCount()) {
            try{
                $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
                $stmt->execute([
                    'id' => $id_user,
                ]);
                if($stmt->rowCount()) {
                    $_SESSION['SupUsers'] = secu($messages['SupUserReussi']);
                }else{
                    $_SESSION['SupUsers'] = secu($messages['ErreurSup']);
                }
            }catch (PDOException $e) {
                $_SESSION['SupUsers'] = secu($messages['ErreurSup']);
            }
        }else{
            $_SESSION['SupUsers'] = secu($messages['ErreurSup']);
        }
    }catch (PDOException $e) {
        $_SESSION['SupUsers'] = secu($messages['ErreurSup']);
    }
}else{
    $_SESSION['SupUsers'] = secu($messages['ErreurSup']);
}
header("Location: admin.php");
exit();