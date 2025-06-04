<?php
include_once '../Config/config.php';
include_once '../Config/AntiXss.php';
include_once '../Config/connexpdo.inc.php';
$_SESSION['achat'] = NULL;
$conn = connexpdo("Myparams");
global $lang, $messages;
if(isset($_SESSION['connexion'])){
    if($_SESSION['connexion'] === false){
        header('Location: formulaire.php');
        exit();
    }elseif($_SESSION['mail'] !== "matheo.gilles.student@elmarche.be"){
        header('Location: profil.php');
        exit();
    }
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
<main id="admin">
    <h1><?php echo secu($messages['Admin'])?></h1>
    <?php
    if(isset($_SESSION['SupUsers'])){
        echo "<h1>" . secu($_SESSION['SupUsers']) . "</h1>";
    }
    ?>
    <ul>
    <?php
    $emailAdmin = $_SESSION['mail'];
    try {
        $stmt = $conn->prepare("SELECT id,nom,prenom,mail FROM users WHERE mail != :mail");
        $stmt->execute(['mail' => $emailAdmin]);
        $users = $stmt->fetchAll();
        if ($users) {
            foreach ($users as $user) {
                $id = $user['id'];
                $nom = $user['nom'];
                $prenom = $user['prenom'];
                $mail = $user['mail'];

                echo "<li>" . secu($id) . " - " . secu($nom) . " - " . secu($prenom) . " - " . secu($mail) ."<a href='supprimeradmin.php?id_user=" . $id . "'>". secu($messages['Supprimer']) ."</a></li>";
            }
        } else {
            echo "<li>". secu($messages['UserPasTrouver']) ."</li>";
        }
    } catch (PDOException $e) {
        echo "<li>". secu($messages['RecupUser']) ."</li>";
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