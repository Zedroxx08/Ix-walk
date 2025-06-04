<?php
session_set_cookie_params([
    'lifetime' => 86400 * 30,
    'path' => '/',
    'secure' => false,
    'httponly' => true,
    'samesite' => 'Lax',
]);
session_start();
define('LG_PATH', realpath(dirname(__FILE__).'/../Lang'));
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'fr'])) {
    $lang = $_GET['lang'];
    setcookie('lang', $lang, time() + (86400 * 30), "/");
} elseif (isset($_COOKIE['lang']) && in_array($_COOKIE['lang'], ['en', 'fr'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'fr';
}
if (file_exists(LG_PATH . "/" . $lang . ".php")) {
    include LG_PATH . "/" . $lang . ".php";
} else {
    include LG_PATH . "/fr.php";
}