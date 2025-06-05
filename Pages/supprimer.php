<?php
include_once '../Config/config.php';
include_once '../Config/AntiXss.php';
include_once "../Config/connexpdo.inc.php";
$conn = connexpdo("Myparams");
global $messages;
if ($conn && isset($_GET['id_chaussures'])) {//Vérifie si id a une valeur
    $id_livraison = $_GET['id_chaussures'];
    try{//Essaye de supprimer la commande ou id est égale à l'id donné(livraison) j'aurai pu être plus précis en donnant id user ou chaussures mais juste id livraison suffisait
        $stmt = $conn->prepare("DELETE FROM chaussures_livraison WHERE id = :id");
        $stmt->execute([
            'id' => $id_livraison,
        ]);

        if($stmt->rowCount()) {//Rowcount avec un delete fontionne de la manière suivante si la ligne est supprimer renvoie 1 sinon 0 donc True ou False
            $_SESSION['Sup'] = secu($messages['SupReussi']);
        }else{
            $_SESSION['Sup'] = secu($messages['ErreurSup']);
        }
    }catch (PDOException $e) {
        $_SESSION['Sup'] = secu($messages['ErreurSup']);
    }
}else{
    $_SESSION['Sup'] = secu($messages['ErreurSup']);
}
header("Location: profil.php");
exit();