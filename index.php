<?php
include_once 'Config/config.php'; //Inclue le fichier config
include_once "Config/AntiXss.php";
global $lang,$messages;//Déclare/Défini les valeurs de lang et messages car c'est des variables global
//Reset les informations affichages quand on change de page
$_SESSION['infoConn'] = NULL;
$_SESSION['info'] = NULL;
$_SESSION['achat'] = NULL;
$_SESSION['SupUsers'] = NULL;
$_SESSION['Sup'] = NULL;
?>
<!doctype html>
<html lang="<?php echo secu($lang);?>"><!--Défini la page en fonction de la lang selection qui se trouve dans le cookies-->
<head>
    <title><?php echo secu($messages['P1'])?></title><!--Titre de ma page-->
    <meta charset="utf-8"><!--Methode d'encodage utf-8-->
    <link rel="stylesheet" href="Css/styles.css"><!--Lien vers mon css-->
    <script src="Javascript/script.js" defer></script><!--Import le script javascript et defer est un attribut qui permet de faire charger la page meme si le javascript ne veut aps être charger-->
</head>
<body>
<header id="header">
    <img src="Images/logo_grand.png" id="logo" alt="Logo"><!--Logo Header-->
    <h1 id="NomSite">Ix-Walk</h1><!--Nom site-->
    <nav><!--Nav header-->
        <ul>
            <li>
                <a href="index.php"><?php echo secu($messages['P1'])?></a>
            </li>
            <li>
                <a href="Pages/produits.php"><?php echo secu($messages['P2'])?></a>
            </li>
            <li>
                <a href="Pages/formulaire.php"><?php echo secu($messages['P3'])?></a>
            </li>
        </ul>
    </nav>
</header>
<main id="main">
    <div class="hero"><!--Section Hero-->
        <img src="Images/Montagne.jpg" alt="<?php echo secu($messages['alt1'])?>" id="images1">
        <img src="Images/NuageWalkShoes.jpg" alt="<?php echo secu($messages['alt2'])?>" id="images2">
        <div class="slogan">
            <h1>Walk Together</h1>
        </div>
    </div>
    <div class="APropos"><!--Section A propos-->
        <div class="texte">
            <h1><?php echo secu($messages['Ap'])?></h1>
            <p><?php echo secu($messages['DescAPropos']) ?></p>
        </div>
        <div class="containerAp"><!--Box qui contient mes informations tels que les valeurs-->
            <div class="box1">
                <p><?php echo secu($messages['text1'])?></p>
            </div>
            <h1 id="t1"><?php echo secu($messages['info1'])?></h1>

            <div class="box2">
                <p><?php echo secu($messages['text2'])?></p>
            </div>
            <h1 id="t2"><?php echo secu($messages['info2'])?></h1>

            <div class="box3">
                <p><?php echo secu($messages['text3'])?></p>
            </div>
            <h1 id="t3"><?php echo secu($messages['info3'])?></h1>

            <div class="box4">
                <p><?php echo secu($messages['text4'])?></p>
            </div>
            <h1 id="t4"><?php echo secu($messages['info4'])?></h1>

            <div class="box5">
                <p><?php echo secu($messages['text5'])?></p>
            </div>
            <h1 id="t5"><?php echo secu($messages['info5'])?></h1>

            <div class="box6">
                <p><?php echo secu($messages['text6'])?></p>
            </div>
            <h1 id="t6"><?php echo secu($messages['info6'])?></h1>
        </div>
    </div>
    <h1 id="titreChiffre"><?php echo secu($messages['Numbers'])?></h1><!--Section Statistique-->
    <div class="chiffre">
        <img src="Images/courir.png" alt="<?php echo secu($messages['alt3'])?>" id="img1">
        <div class="Avan1">
            <h1><?php echo secu($messages['Av1'])?></h1>
            <p><?php echo secu($messages['desc1']) ?></p>
        </div>
        <img src="Images/feuille.png" alt="<?php echo secu($messages['alt4'])?>" id="img2">
        <div class="Avan2">
            <h1><?php echo secu($messages['Av2'])?></h1>
            <p><?php echo secu($messages['desc2'])?></p>
        </div>
        <img src="Images/euro.png" alt="<?php echo secu($messages['alt5'])?>" id="img3">
        <div class="Avan3">
            <h1><?php echo secu($messages['Av3'])?></h1>
            <p><?php echo secu($messages['desc3']) ?></p>
        </div>
    </div>
    <h1 id="contact">Contact</h1>
    <div class="contact"><!--Section contact-->
        <div class="image">
            <img src="Images/ForetNeige.jpeg" alt="<?php echo secu($messages["alt13"])?>">
        </div>
        <div class="info">
            <div class="Maison">
                <img src="Images/maison.png" alt="<?php echo secu($messages["alt14"])?>"><a href="https://g.co/kgs/8sED5Yd" target="_blank"><?php echo secu($messages["rue"])?> Saint-Roch</a>
            </div>
            <div class="Telephone">
                <img src="Images/telephone.png" alt="<?php echo secu($messages["alt15"])?>"><a href="tel:+32497330573" target="_blank"><?php echo secu($messages["num"])?> : +32497330573</a>
            </div>
            <div class="Email">
                <img src="Images/email.png" alt="<?php echo secu($messages["alt16"])?>"><a href="mailto:matheo.gilles.student@elmarche.be" target="_blank"><?php echo secu($messages["email"])?></a>
            </div>
        </div>
        <div class="gmap">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2552.367507007372!2d5.346115142080268!3d50.22903883045982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c04a811862caa9%3A0x1f66fcf39543b759!2sRue%20Saint-Roch%2C%206900%20Marche-en-Famenne!5e0!3m2!1sfr!2sbe!4v1745612381147!5m2!1sfr!2sbe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <h1 id="partenaire"><?php echo secu($messages['Np'])?></h1><!--Section Sponsor-->
    <div class="partenaire">
        <div class="box1">
            <a href="https://www.nike.com/" target="_blank">
                Nike<br>
                <img src="Images/nike.png" alt="Logo Nike">
            </a>
        </div>
        <div class="box2">
            <a href="https://www.adidas.com/" target="_blank">
                Adidas<br>
                <img src="Images/adidas.png" alt="Logo Adidas">
            </a>
        </div>
        <div class="box3">
            <a href="https://www.newbalance.com/" target="_blank">
                NewBalance<br>
                <img src="Images/NewBalance.png" alt="Logo Newbalance">
            </a>
        </div>
        <div class="box4">
            <a href="https://www.courir.be/fr_BE/home" target="_blank">
                Courir<br>
                <img src="Images/CourirLogo.png" alt="Logo Courir">
            </a>
        </div>
        <div class="box5">
            <a href="https://fr.zalando.be/" target="_blank">
                Zalando<br>
                <img src="Images/ZalandoLogo.png" alt="Logo Zalando">
            </a>
        </div>
        <div class="box6">
            <a href="https://fr.sarenza.be/" target="_blank">
                Sarenza<br>
                <img src="Images/Sarenza.png" alt="Logo Sarenza">
            </a>
        </div>
        <div class="box7">
            <a href="https://wethenew.com/" target="_blank">
                Wethenew<br>
                <img src="Images/wethenew.png" alt="Logo Wethenew">
            </a>
        </div>
        <div class="box8">
            <a href="https://saryna.be/" target="_blank">
                Saryna<br>
                <img src="Images/saryna.png" alt="Logo Saryna">
            </a>
        </div>
        <div class="box9">
            <a href="https://www.spartoo.com/" target="_blank">
                Spartoo<br>
                <img src="Images/spartoo.png" alt="Logo Spartoo">
            </a>
        </div>
        <div class="box10">
            <a href="https://www.shoes.fr/" target="_blank">
                Shoes<br>
                <img src="Images/shoesfr.png" alt="Logo Shoes">
            </a>
        </div>
        <div class="box11">
            <a href="https://shop.maniet.be/fr" target="_blank">
                Maniet<br>
                <img src="Images/maniet.png" alt="Logo Maniet">
            </a>
        </div>
        <div class="box12">
            <a href="https://www.chaussuresonline.com/" target="_blank">
                Chaussureonline<br>
                <img src="Images/chaussuresonlineLogo.png" alt="Logo Chaussureonline">
            </a>
        </div>
    </div>
</main>
<footer id="footer">
    <div class="DifLang" id="Flag"><!--Endroit appellé par le javascript si click sur le drapeau pour changer de langue-->
        <ul>
            <li>
                <a href="index.php?lang=fr"><?php echo secu($messages['fr'])?></a>
                <img src="Images/france.png" alt="<?php echo secu($messages['alt6'])?>">
            </li>
            <li>
                <a href="index.php?lang=en"><?php echo secu($messages['en'])?></a>
                <img src="Images/amerique.webp" alt="<?php echo secu($messages['alt7'])?>">
            </li>
        </ul>
        <img src="Images/croix.png" alt="<?php echo secu($messages['alt8'])?>" id="Croix">
    </div>
    <div class="up"><a href="#" target="_top">UP</a></div><!--Bouton up-->
    <div class="containerFooter"><!--Logo footer-->
        <div class="logo">
            <img src="Images/logo_grand.png" alt="Logo">
        </div>
        <nav><!--Nav footer-->
            <ul>
                <li>
                    <a href="index.php"><?php echo secu($messages['P1'])?></a>
                </li>
                <li>
                    <a href="Pages/produits.php"><?php echo secu($messages['P2'])?></a>
                </li>
                <li>
                    <a href="Pages/formulaire.php"><?php echo secu($messages['P3'])?></a>
                </li>
            </ul>
        </nav>
        <div class="Lang"><!--Affiche un image différente en fonction de la lang mais ne change pas id pour facilité dans le css et javascript-->
            <img src="Images/<?php
            if ($lang === 'fr'){
                echo "france.png";
            }elseif ($lang === 'en'){
                echo "amerique.webp";
            }?>" alt="<?php
            if ($lang==='fr'){
                echo $messages['alt6'];
            }elseif ($lang === 'en'){
                echo $messages['alt7'];
            }?>" id="France">
        </div>
        <div class="icone"><!--Lien vers mes contacts-->
            <a href="https://www.instagram.com/gilles.matheo08/" target="_blank"><img src="Images/instagram.png" alt="<?php echo secu($messages['alt9'])?>"></a>
            <a href="https://www.youtube.com/@Zedroxx08/" target="_blank"><img src="Images/youtube.png" alt="<?php echo secu($messages['alt10'])?>"></a>
            <a href="https://www.snapchat.com/add/matheogilles/" target="_blank"><img src="Images/snapchat.png" alt="<?php echo secu($messages['alt11'])?>"></a>
            <a href="https://www.facebook.com/Gilles.Matheo08/" target="_blank"><img src="Images/facebook.png" alt="<?php echo secu($messages['alt12'])?>"></a>
        </div>
        <div class="copyright">
            <p>© copyright</p>
        </div>
    </div>
</footer>
</body>
</html>