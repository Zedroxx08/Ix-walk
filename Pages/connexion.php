<?php
include_once '../Config/config.php';
include_once '../Config/AntiXss.php';
global $lang,$messages;
$_SESSION['info'] = NULL;
if(isset($_SESSION['connexion'])){
    if($_SESSION['connexion'] === true){//Envoie vers le profil si l'utilisateur est connecter mais qu'il veut aller manuelement sur la page inscription
        header('Location: profil.php');
    }
}
if (isset($_SESSION['infoConn'])){
    $info = $_SESSION['infoConn'];
}else{
    $info = "";
}
?>
<!doctype html>
<html lang="<?php echo secu($lang); ?>">
<head>
    <title><?php echo secu($messages['P3']); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/styles.css">
</head>
<body>
<header id="header">
    <img src="../Images/logo_grand.png" id="logo" alt="Logo">
    <h1 id="NomSite">Ix-Walk</h1>
    <nav>
        <ul>
            <li>
                <a href="../index.php"><?php echo secu($messages['P1']); ?></a>
            </li>
            <li>
                <a href="produits.php"><?php echo secu($messages['P2']); ?></a>
            </li>
            <li>
                <a href="formulaire.php"><?php echo secu($messages['P3']); ?></a>
            </li>
        </ul>
    </nav>
</header>
<main id="formulaire" class="Connexion">
    <h1><?php echo secu($messages['PageConn']); ?></h1>
    <p><?php echo secu($info)?></p>
    <div class="containerForm">
        <form method="post" action="ConnexionProfil.php" id="Connecter">
            <label for="mail"><?php echo secu($messages['mail']); ?> :</label><br/>
            <input type="email" id="mail" name="mail" placeholder="<?php echo secu($messages['votre'] . $messages['mail']); ?>" autocomplete="off" required><br/>
            <label for="password"><?php echo secu($messages['mdp']); ?> :</label><br/>
            <input type="password" id="password" name="password" placeholder="<?php echo secu($messages['votre'] . $messages['mdp']); ?>" autocomplete="off" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}" required><br/>
            <input type="submit" id="submit" value="<?php echo secu($messages['connect']); ?>"><br/>
            <p><?php echo secu($messages['NotAccount']); ?><a href="formulaire.php"><?php echo secu($messages['Sub']); ?></a></p>
        </form>
    </div>
</main>

<footer id="footer">
    <div class="up"><a href="#">UP</a></div>
    <div class="containerFooter">
        <div class="logo">
            <img src="../Images/logo_grand.png" alt="Logo">
        </div>
        <nav>
            <ul>
                <li>
                    <a href="../index.php"><?php echo secu($messages['P1']); ?></a>
                </li>
                <li>
                    <a href="produits.php"><?php echo secu($messages['P2']); ?></a>
                </li>
                <li>
                    <a href="formulaire.php"><?php echo secu($messages['P3']); ?></a>
                </li>
            </ul>
        </nav>
        <div class="icone">
            <a href="https://www.instagram.com/gilles.matheo08/" target="_blank"><img src="../Images/instagram.png" alt="<?php echo secu($messages['alt9'])?>"></a>
            <a href="https://www.youtube.com/@Zedroxx08/" target="_blank"><img src="../Images/youtube.png" alt="<?php echo secu($messages['alt10'])?>"></a>
            <a href="https://www.snapchat.com/add/matheogilles/" target="_blank"><img src="../Images/snapchat.png" alt="<?php echo secu($messages['alt11'])?>"></a>
            <a href="https://www.facebook.com/Gilles.Matheo08/" target="_blank"><img src="../Images/facebook.png" alt="<?php echo secu($messages['alt12'])?>"></a>
        </div>
        <div class="copyright">
            <p>© copyright</p>
        </div>
    </div>
</footer>
</body>
</html>