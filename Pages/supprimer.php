<?php
include_once '../Config/config.php';
include_once '../Config/AntiXss.php';
include "../Config/connexpdo.inc.php";
$conn = connexpdo("Myparams");
global $messages;
if ($conn && isset($_GET['id_chaussures'])) {
    $id_livraison = $_GET['id_chaussures'];
    try{
        $stmt = $conn->prepare("DELETE FROM chaussures_livraison WHERE id = :id");
        $stmt->execute([
            'id' => $id_livraison,
        ]);

        if($stmt->rowCount()) {
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