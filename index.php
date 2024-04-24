<?php

// Démarrez la session si elle n'a pas déjà été démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifiez si l'utilisateur veut se déconnecter
if (isset($_GET['logout'])) {
    // Supprimez les variables de session pour l'utilisateur
    unset($_SESSION['email']);
    unset($_SESSION['role']);
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8"></head>
        <link rel="stylesheet"  href="normalize.css">
        <link rel="stylesheet" type="text/css" href="css/index.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <title>Accueil - ShopTaSneakers</title>
    </html>
    </head>
    
    <body>
        <div class="bandehaut">Livraison Gratuite à partir de 50€ d'achats. Retour offert !</div>
        
        <?php include 'php/header.php'; ?>

        <div class="bloc1">
            <div id="accueil">
                <center>
                <img src="img/photo_accueil_prop2.png" id="photo_accueil">
                </center>
            </div>
            <section class="produits">
                <div>
                    <b><p id="texte_menu"> Les tendances du moments </p></b>
                </div>
                <div class="tableau_centrer">
                    <table>
                        <tr>
                            <td>
                                <a href="produits.php?cat=Homme" class="chaussure">
                                    <img src="img/produit1.jpg" alt="produit 1">
                                    <h3>Air force one</h3>
                                </a>
                            </td>
                            <td>
                                <a href="produits.php?cat=Homme" class="chaussure">
                                    <img src="img/chaussure_classique.png" alt="produit 1">
                                    <h3>classique</h3>
                                </a>
                            </td>
                            <td>
                                <a href="produits.php?cat=Femme" class="chaussure">
                                    <img src="img/chaussure_runningf.png" alt="produit 1">
                                    <h3>nike running femme</h3>
                                </a>
                            </td>
                            <td>
                                <a href="produits.php?cat=Enfant" class="chaussure">
                                    <img src="img/claquette.png" alt="produit 1">
                                    <h3>claquette</h3>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
        </div>
    </body>    
    <?php include 'php/footer.php'; ?>
    </body>
</html>
