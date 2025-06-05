<?php
// Fonction qui permet de se connecter a la db grace au paramètre Myparams qui va aller checher les paramètres de la db comme ip ou port etc
function connexpdo($param)
{
    include_once($param.".inc.php");
    $dns = "pgsql:host=" . HOST . ";port=".PORT.";dbname=" . DBNAME . ";options='--search_path=" . SCHEMA . ",public --client_encoding=UTF8'";
    $user = USER;
    $pwd = PWD;
    try{
        $conn = new PDO($dns, $user, $pwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        Echo "Echec de la connexion \n", $e->getMessage(), "\n";
        return false;
    }
}