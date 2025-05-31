<?php
include 'Config/config.php';
global $lang,$messages;
include "Config/connexpdo.inc.php";
$conn = connexpdo("Myparams");

?>
<!doctype html>
<html lang="<?php echo $lang;?>">
<head>
    <title><?php echo $messages['P1']?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Css/styles.css">
    <script src="Javascript/script.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <header id="header">
        <img src="Images/logo_grand.png" id="logo" alt="Logo">
        <h1 id="NomSite">Ix-Walk</h1>
        <nav>
            <ul>
                <li>
                    <a href="index.php?lang=en"><?php echo $messages['P1']?></a>
                </li>
                <li>
                    <a href="Pages/produits.php"><?php echo $messages['P2']?></a>
                </li>
                <li>
                    <a href="Pages/formulaire.php"><?php echo $messages['P3']?></a>
                </li>
            </ul>
        </nav>
    </header>
    <main id="main">
        <div class="hero">
            <img src="Images/Montagne.jpg" alt="<?php echo $messages['alt1']?>" id="images1">
            <img src="Images/NuageWalkShoes.jpg" alt="<?php echo $messages['alt2']?>" id="images2">
            <div class="slogan">
                <h1>Walk Together</h1>
            </div>
        </div>
        <div class="APropos">
            <div class="texte">
                <h1><?php echo $messages['Ap']?></h1>
                <p>Description</p>
            </div>
            <div class="containerAp">
                <div class="box1">
                    <p><?php echo $messages['text1']; ?></p>
                </div>
                <h1 id="t1"><?php echo $messages['info1']; ?></h1>

                <div class="box2">
                    <p><?php echo $messages['text2']; ?></p>
                </div>
                <h1 id="t2"><?php echo $messages['info2']; ?></h1>

                <div class="box3">
                    <p><?php echo $messages['text3']; ?></p>
                </div>
                <h1 id="t3"><?php echo $messages['info3']; ?></h1>

                <div class="box4">
                    <p><?php echo $messages['text4']; ?></p>
                </div>
                <h1 id="t4"><?php echo $messages['info4']; ?></h1>

                <div class="box5">
                    <p><?php echo $messages['text5']; ?></p>
                </div>
                <h1 id="t5"><?php echo $messages['info5']; ?></h1>

                <div class="box6">
                    <p><?php echo $messages['text6']; ?></p>
                </div>
                <h1 id="t6"><?php echo $messages['info6']; ?></h1>
            </div>
        </div>
        <h1 id="titreChiffre"><?php echo $messages['Numbers']?></h1>
        <div class="chiffre">
            <img src="Images/courir.png" alt="<?php echo $messages['alt3']?>" id="img1">
            <div class="Avan1">
                <h1><?php echo $messages['Av1']?></h1>
                <p><?php echo $messages['desc1']; ?></p>
            </div>
            <img src="Images/feuille.png" alt="<?php echo $messages['alt4']?>" id="img2">
            <div class="Avan2">
                <h1><?php echo $messages['Av2']?></h1>
                <p><?php echo $messages['desc2']; ?></p>
            </div>
            <img src="Images/euro.png" alt="<?php echo $messages['alt5']?>" id="img3">
            <div class="Avan3">
                <h1><?php echo $messages['Av3']?></h1>
                <p><?php echo $messages['desc3']; ?></p>
            </div>
        </div>
        <h1 id="contact">Contact</h1>
        <div class="contact">
            <div class="image">
                <img src="Images/ForetNeige.jpeg" alt="<?php echo $messages["alt13"]?>">
            </div>
            <div class="info">
                <div class="Maison">
                    <img src="Images/maison.png" alt="<?php echo $messages["alt14"]?>"><a href="https://g.co/kgs/8sED5Yd" target="_blank"><?php echo $messages["rue"]?> Saint-Roch</a>
                </div>
                <div class="Telephone">
                    <img src="Images/telephone.png" alt="<?php echo $messages["alt15"]?>"><a href="tel:+32497330573" target="_blank"><?php echo $messages["num"]?> : +32497330573</a>
                </div>
                <div class="Email">
                    <img src="Images/email.png" alt="<?php echo $messages["alt16"]?>"><a href="mailto:matheo.gilles.student@elmarche.be" target="_blank"><?php echo $messages["email"]?></a>
                </div>
            </div>
            <div class="gmap">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2552.367507007372!2d5.346115142080268!3d50.22903883045982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c04a811862caa9%3A0x1f66fcf39543b759!2sRue%20Saint-Roch%2C%206900%20Marche-en-Famenne!5e0!3m2!1sfr!2sbe!4v1745612381147!5m2!1sfr!2sbe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <h1 id="partenaire"><?php echo $messages['Np']?></h1>
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
                    <img src="Images/chaussuresonline.png" alt="Logo Chaussureonline">
                </a>
            </div>
        </div>
    </main>
    <footer id="footer">
        <div class="DifLang" id="Flag">
            <ul>
                <li>
                    <a href="index.php?lang=fr"><?php echo $messages['fr']?></a>
                    <img src="Images/france.png" alt="<?php echo $messages['alt6']?>">
                </li>
                <li>
                    <a href="index.php?lang=en"><?php echo $messages['en']?></a>
                    <img src="Images/amerique.webp" alt="<?php echo $messages['alt7']?>">
                </li>
            </ul>
            <img src="Images/croix.png" alt="<?php echo $messages['alt8']?>" id="Croix">
        </div>
        <div class="up"><a href="#" target="_top">UP</a></div>
        <div class="containerFooter">
            <div class="logo">
                <img src="Images/logo_grand.png" alt="Logo">
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="index.php"><?php echo $messages['P1']?></a>
                    </li>
                    <li>
                        <a href="Pages/produits.php"><?php echo $messages['P2']?></a>
                    </li>
                    <li>
                        <a href="Pages/formulaire.php"><?php echo $messages['P3']?></a>
                    </li>
                </ul>
            </nav>
            <div class="Lang">
                <img src="Images/<?php
                if ($lang==='fr'){
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
            <div class="icone">
                <img src="Images/instagram.png" alt="<?php echo $messages['alt9']?>">
                <img src="Images/youtube.png" alt="<?php echo $messages['alt10']?>">
                <img src="Images/snapchat.png" alt="<?php echo $messages['alt11']?>">
                <img src="Images/facebook.png" alt="<?php echo $messages['alt12']?>">
            </div>
            <div class="copyright">
                <p>© copyright</p>
            </div>
        </div>
    </footer>
</body>
</html>