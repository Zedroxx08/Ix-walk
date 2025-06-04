<?php
include_once '../Config/config.php';
include_once '../Config/AntiXss.php';
include_once "../Config/connexpdo.inc.php";
global $messages;
$conn = connexpdo("Myparams");
if ($conn && isset($_GET['id']) && isset($_SESSION['id'])) {
    $id_chaussure = $_GET['id'];
    $id_user = $_SESSION['id'];

    try {
        $stmt = $conn->prepare("INSERT INTO chaussures_livraison (id_chaussure, id_user) VALUES (:id_chaussure, :id_user)");
        $stmt->execute([
            'id_chaussure' => $id_chaussure,
            'id_user' => $id_user
        ]);
        $_SESSION['achat'] = secu($messages['AchatReussi']);
    } catch (PDOException $e) {
        $_SESSION['achat'] = secu($messages['ErreurAchat']);
    }
}
header("Location: produits.php");
exit();