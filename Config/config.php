<?php
// Fixe les paramètres du cookie de la session (durée: 30 jours, chemin access : tout le site, secure : mettre false car pas https, httponly : mettre true pour empecher js d'accèder au cookie,samesite : Contrôle l'envoi du cookie entre sites(j'ai pris le plus conseiller Lax)
session_set_cookie_params([
    'lifetime' => 86400 * 30,
    'path' => '/',
    'secure' => false,
    'httponly' => true,
    'samesite' => 'Lax',
]);
//Démarre la session
session_start();
//Définie le chemin absolu pour chaque page
define('LG_PATH', realpath(dirname(__FILE__).'/../Lang'));

if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'fr'])) {//Vérifie si lang existe et que lang est soit en ou fr
    $lang = $_GET['lang'];
    setcookie('lang', $lang, time() + (86400 * 30), "/");//Défini le cookie qui durée 30 jours et accessible sur tout le site web
} elseif (isset($_COOKIE['lang']) && in_array($_COOKIE['lang'], ['en', 'fr'])) {//Vérifie si le cookie lang existe et que ce soit en ou fr
    $lang = $_COOKIE['lang'];
} else {//Si aucun paramètres donc lien ou cookie n'est valide la lang est française par défault
    $lang = 'fr';
}
if (file_exists(LG_PATH . "/" . $lang . ".php")) {//vérifie si le chemin au quel on veut aller existe si oui on va cherche array messages dans la variable lang sinon le site est en français
    include LG_PATH . "/" . $lang . ".php";
} else {
    include LG_PATH . "/fr.php";
}