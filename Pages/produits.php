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