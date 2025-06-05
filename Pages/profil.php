<?php
include_once '../Config/config.php';
include_once '../Config/AntiXss.php';
include_once '../Config/connexpdo.inc.php';
$_SESSION['achat'] = NULL;
$conn = connexpdo("Myparams");
global $lang,$messages;
if(isset($_SESSION['connexion'])){
    if($_SESSION['connexion'] === false){
        header('Location: formulaire.php');
        exit();
    }
}
if($_SESSION['mail'] === "matheo.gilles.student@elmarche.be"){
    header('Location: admin.php');
    exit();
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
<main id="profil">
    <h1><?php echo secu($messages['Bonjour'] . ' ' . $_SESSION['nom'] . ' ' . $_SESSION['prenom'])?></h1>
    <ul><!-- Va afficher plusieur info de l'utilisateur grâce à la session -->
        <li><?php echo secu($_SESSION['mail'])?></li>
        <li><?php echo secu($_SESSION['num'])?></li>
        <li><?php echo secu($_SESSION['pays'])?></li>
        <li><?php echo secu($_SESSION['adresse'])?></li>
    </ul>
    <h1><?php echo secu($messages['Commande'])?></h1>
    <?php
    if(isset($_SESSION['Sup'])){
        echo "<h1>" . secu($_SESSION['Sup']) . "</h1>";
    }
    ?>
    <ul>
        <?php
        include_once '../Config/config.php';
        $id_user = $_SESSION['id'];
        $total = 0;//Total prix
        try {//Essaye de récup les info de la chaussure et id de la livraison en fonction de l'id chaussures et de l'id user
            $stmt = $conn->prepare("SELECT c.nom_chaussure, c.taille, c.prix , cl.id AS livraison FROM chaussures_livraison cl, chaussures c WHERE cl.id_chaussure = c.id AND cl.id_user = :id_user AND cl.a_livrer = true");
            $stmt->execute(['id_user' => $id_user]);
            $commandes = $stmt->fetchAll();
            if ($commandes) {//vérifie si l'utilisateur a fait des commandes si oui affiche c'est commande sinon affiche aucune commande trouvé
                foreach ($commandes as $commande) {//récupère les infos nécessaires et augmente le total pour savoir combien est le total de la commande
                    $nom = $commande['nom_chaussure'];
                    $taille = $commande['taille'];
                    $prix = (int) $commande['prix'];
                    $id_chaussure = $commande['livraison'];
                    $total += $prix;
                    //Va donner id de la livraison dans le lien pour la supprimer de la commande(voir supprimer.php)
                    echo "<li>" . secu($nom) . " - ". secu($messages['Taille']). " : " . secu($taille) . " - " . secu($prix) . " €<a href='supprimer.php?id_chaussures=" . $id_chaussure . "'>" . secu($messages['Supprimer']) . "</a></li>";
                }
                echo "<li><strong>Total : " . secu($total) . " €</strong></li>";
                //Lien vers un achat sumup, l'achat est fictif c'est-à-dire qu'il sert de visuel et si vous voulez vous pouvez acheter le montant que vous voulez se sera reconnu comme don(communication)
                echo "<li><a href='https://pay.sumup.com/b2c/QFPJOL8M' target='_blank'>". secu($messages["Payer"]) ."</a></li>";
            } else {
                echo "<li>". secu($messages['CommandePasTrouve']) ."</li>";
            }
        } catch (PDOException $e) {
            echo "<li>". secu($messages['RecupCommande']) ."</li>";
        }
        ?>
    </ul>
    <a href="logout.php"><?php echo secu($messages['Deconnexion'])?></a>
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