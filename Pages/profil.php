<?php
include_once '../Config/config.php';
include_once '../Config/AntiXss.php';
include_once '../Config/connexpdo.inc.php';
$_SESSION['achat'] = NULL;
$conn = connexpdo("Myparams");
$nom = secu($_SESSION['nom']);
$prenom = secu($_SESSION['prenom']);
$nomcomplet = $nom." ".$prenom;
$nomurl = rawurlencode($nomcomplet);
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
    <ul>
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
        $total = 0;
        try {
            $stmt = $conn->prepare("SELECT c.nom_chaussure, c.taille, c.prix , cl.id AS livraison FROM chaussures_livraison cl, chaussures c WHERE cl.id_chaussure = c.id AND cl.id_user = :id_user AND cl.a_livrer = true");
            $stmt->execute(['id_user' => $id_user]);
            $commandes = $stmt->fetchAll();
            if ($commandes) {
                foreach ($commandes as $commande) {
                    $nom = $commande['nom_chaussure'];
                    $taille = $commande['taille'];
                    $prix = (int) $commande['prix'];
                    $id_chaussure = $commande['livraison'];
                    $total += $prix;

                    echo "<li>" . secu($nom) . " - ". secu($messages['Taille']). " : " . secu($taille) . " - " . secu($prix) . " €<a href='supprimer.php?id_chaussures=" . $id_chaussure . "'>" . secu($messages['Supprimer']) . "</a></li>";
                }
                echo "<li><strong>Total : " . secu($total) . " €</strong></li>";
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
            <img src="../Images/instagram.png" alt="<?php echo secu($messages['alt9']); ?>">
            <img src="../Images/youtube.png" alt="<?php echo secu($messages['alt10']); ?>">
            <img src="../Images/snapchat.png" alt="<?php echo secu($messages['alt11']); ?>">
            <img src="../Images/facebook.png" alt="<?php echo secu($messages['alt12']); ?>">
        </div>
        <div class="copyright">
            <p>© copyright</p>
        </div>
    </div>
</footer>
</body>
</html>