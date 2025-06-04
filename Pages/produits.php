<?php
include_once '../Config/config.php';
include_once "../Config/connexpdo.inc.php";
include_once "../Config/AntiXss.php";
$_SESSION['infoConn'] = NULL;
$_SESSION['info'] = NULL;
$_SESSION['SupUsers'] = NULL;
$_SESSION['Sup'] = NULL;
$conn = connexpdo("Myparams");
global $lang,$messages;
try{
    $stmt = $conn->prepare("SELECT * FROM chaussures");
    $stmt->execute();
    $chaussures = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    $data = "Erreur lors de la récupération des données.";
}
if(isset($_SESSION['achat'])){
    $achat = $_SESSION['achat'];
}elseif(!isset($_SESSION['id'])){
    $achat = secu($messages['PasConnect']);
}
?>
<!doctype html>
<html lang="<?php echo $lang?>">
<head>
    <title><?php echo secu($messages['P2'])?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../Css/styles.css">
    <script src="../Javascript/scriptAffiche.js" defer></script>

</head>
<body>
<header id="header">
    <img src="../Images/logo_grand.png" id="logo" alt="Logo">
    <h1 id="NomSite">Ix-Walk</h1>
    <nav>
        <ul>
            <li>
                <a href="../index.php"><?php echo secu($messages['P1'])?></a>
            </li>
            <li>
                <a href="produits.php"><?php echo secu($messages['P2'])?></a>
            </li>
            <li>
                <a href="formulaire.php"><?php echo secu($messages['P3'])?></a>
            </li>
        </ul>
    </nav>
</header>
<main id="produit">
    <?php
    if(isset($achat)){
        echo "<h1>" . $achat . "</h1>";
    }
    elseif (isset($data)){
        echo "<h1>" . $data . "</h1>";
    }
    ?>
    <div class="Nouveautes">
        <div class="Titre">
            <h1><?php  echo secu($messages['News'])?></h1>
        </div>
        <div class="element">
            <img src="../Images/ShoesGreenNeon.jpg" alt="<?php echo secu($chaussures[0]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[0]['id']) ?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[0]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[0]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[0]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[0]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="element">
            <img src="../Images/ShoesNeon.jpeg" alt="<?php echo secu($chaussures[1]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[1]['id']) ?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[1]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[1]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[1]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[1]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="element">
            <img src="../Images/ShoesNeon2.jpeg" alt="<?php echo secu($chaussures[2]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[2]['id']) ?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[2]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[2]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[2]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[2]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="element">
            <img src="../Images/ShoesNeon3.jpeg" alt="<?php echo secu($chaussures[3]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[3]['id']) ?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[3]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[3]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[3]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[3]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="Texte">
            <p>Texte qui decrit les nouvautés</p>
        </div>
    </div>
    <div class="LePlusVendu">
        <div class="Titre">
            <h1><?php  echo secu($messages['MostSell'])?></h1>
        </div>
        <div class="element">
            <img src="../Images/ShoesGirl.jpg" alt="<?php echo secu($chaussures[4]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[4]['id']) ?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[4]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[4]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[4]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[4]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="element">
            <img src="../Images/ShoesGirl2.jpg" alt="<?php echo secu($chaussures[5]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[5]['id']) ?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[5]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[5]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[5]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[5]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="element">
            <img src="../Images/ShoesGirl3.png" alt="<?php echo secu($chaussures[6]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[6]['id']) ?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[6]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[6]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[6]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[6]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="element">
            <img src="../Images/ShoesGirl4.png" alt="<?php echo secu($chaussures[7]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[7]['id']) ?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[7]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[7]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[7]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[7]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="Texte">
            <p>Texte qui décrit les articles les plus vendu</p>
        </div>
    </div>
    <div class="Autres">
        <div class="Titre">
            <h1><?php  echo secu($messages['Other'])?></h1>
        </div>
        <div class="element">
            <img src="../Images/ShoesGirl5.jpeg" alt="<?php echo secu($chaussures[8]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[8]['id'])?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[8]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[8]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[8]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[8]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="element">
            <img src="../Images/ShoesGirl6.jpeg" alt="<?php echo secu($chaussures[9]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[9]['id'])?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[9]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[9]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[9]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[9]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="element">
            <img src="../Images/ShoesMen1.jpeg" alt="<?php echo secu($chaussures[10]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[10]['id'])?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[10]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[10]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[10]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[10]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="Cacher">
            <img src="../Images/ShoesMen2.jpeg" alt="<?php echo secu($chaussures[11]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[11]['id'])?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[11]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[11]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[11]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[11]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="Cacher">
            <img src="../Images/ShoesMen3.jpeg" alt="<?php echo secu($chaussures[12]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[12]['id'])?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[12]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[12]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[12]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[12]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="Cacher">
            <img src="../Images/ShoesMen4.jpeg" alt="<?php echo secu($chaussures[13]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[13]['id'])?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[13]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[13]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[13]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[13]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="Cacher">
            <img src="../Images/ShoesBaby1.jpeg" alt="<?php echo secu($chaussures[14]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[14]['id'])?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[14]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[14]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[14]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[14]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="Cacher">
            <img src="../Images/ShoesBaby2.jpeg" alt="<?php echo secu($chaussures[15]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[15]['id'])?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[15]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[15]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[15]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[15]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="Cacher">
            <img src="../Images/ShoesBaby3.jpeg" alt="<?php echo secu($chaussures[16]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[16]['id'])?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[16]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[16]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[16]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[16]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="Cacher">
            <img src="../Images/ShoesBaby4.jpeg" alt="<?php echo secu($chaussures[17]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[17]['id'])?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[17]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[17]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[17]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[17]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="Cacher">
            <img src="../Images/ShoesBaby5.jpeg" alt="<?php echo secu($chaussures[18]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[18]['id'])?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[18]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[18]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[18]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[18]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
        <div class="Cacher">
            <img src="../Images/ShoesBaby6.jpeg" alt="<?php echo secu($chaussures[19]['nom_chaussure'])?>">
            <div class="Achat">
                <a href="acheter.php?id=<?php echo secu($chaussures[19]['id']) ?>"><?php echo secu($messages['acheter'])?></a>
                <ul>
                    <li><p><?php echo secu($messages['NbPaire']) . " : " . secu($chaussures[19]['id'])?></p></li>
                    <li><p><?php echo secu($messages['Paire'])  . " : " . secu($chaussures[19]['nom_chaussure'])?></p></li>
                    <li><p><?php echo secu($messages['Taille'])  . " : " . secu($chaussures[19]['taille'])?></p></li>
                    <li><p><?php echo secu($messages['prix']) . " : " . secu($chaussures[19]['prix']) . "€"?></p></li>
                </ul>
            </div>
        </div>
    </div>
    <p id="afficheplus"><?php echo secu($messages['affplus'])?></p>
    <p id="affichemoins"><?php echo secu($messages['affmoins'])?></p>
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
                    <a href="../index.php"><?php echo secu($messages['P1'])?></a>
                </li>
                <li>
                    <a href="produits.php"><?php echo secu($messages['P2'])?></a>
                </li>
                <li>
                    <a href="formulaire.php"><?php echo secu($messages['P3'])?></a>
                </li>
            </ul>
        </nav>
        <div class="icone">
            <img src="../Images/instagram.png" alt="<?php echo secu($messages['alt9'])?>">
            <img src="../Images/youtube.png" alt="<?php echo secu($messages['alt10'])?>">
            <img src="../Images/snapchat.png" alt="<?php echo secu($messages['alt11'])?>">
            <img src="../Images/facebook.png" alt="<?php echo secu($messages['alt12'])?>">
        </div>
        <div class="copyright">
            <p>© copyright</p>
        </div>
    </div>
</footer>
</body>
</html>