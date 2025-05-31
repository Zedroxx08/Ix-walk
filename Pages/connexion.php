<?php
include '../Config/config.php';
global $lang,$messages;
?>
<!doctype html>
<html lang="<?php echo $lang?>">
<head>
    <title><?php echo $messages['P1']?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/styles.css">
    <script src="../Javascript/script.js" defer></script>
</head>
<body>
<header id="header">
    <img src="../Images/logo_grand.png" id="logo" alt="Logo">
    <h1 id="NomSite">Ix-Walk</h1>
    <nav>
        <ul>
            <li>
                <a href="../index.php"><?php echo $messages['P1']?></a>
            </li>
            <li>
                <a href="produits.php"><?php echo $messages['P2']?></a>
            </li>
            <li>
                <a href="formulaire.php"><?php echo $messages['P3']?></a>
            </li>
        </ul>
    </nav>
</header>
<main id="formulaire" class="Connexion">
    <h1><?php echo $messages['PageConn']; ?></h1>
    <div class="containerForm">
        <form method="get" action="" id="Connecter">
            <label for="mail"><?php echo $messages['mail']; ?> :</label><br/>
            <input type="email" id="mail" placeholder="<?php echo $messages['votre'] . $messages['mail']; ?>" autocomplete="off" required><br/>
            <label for="password"><?php echo $messages['mdp']; ?> :</label><br/>
            <input type="password" id="password" placeholder="<?php echo $messages['votre'] . $messages['mdp']; ?>" autocomplete="off" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}" required><br/>
            <input type="submit" id="submit" value="<?php echo $messages['connect']; ?>"><br/>
            <p><?php echo $messages['NotAccount']; ?><a href="formulaire.php"><?php echo $messages['Sub']; ?></a></p>
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
                    <a href="../index.php"><?php echo $messages['P1']?></a>
                </li>
                <li>
                    <a href="produits.php"><?php echo $messages['P2']?></a>
                </li>
                <li>
                    <a href="formulaire.php"><?php echo $messages['P3']?></a>
                </li>
            </ul>
        </nav>
        <div class="icone">
            <img src="../Images/instagram.png" alt="<?php echo $messages['alt9']?>">
            <img src="../Images/youtube.png" alt="<?php echo $messages['alt10']?>">
            <img src="../Images/snapchat.png" alt="<?php echo $messages['alt11']?>">
            <img src="../Images/facebook.png" alt="<?php echo $messages['alt12']?>">
        </div>
        <div class="copyright">
            <p>© copyright</p>
        </div>
    </div>
</footer>
</body>
</html>