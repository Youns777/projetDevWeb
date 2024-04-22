<?php

include 'bdd.php'; // Inclure le fichier bdd.php pour se connecter à la base, afficher menu et se déconnecter

$categorie = $_GET['cat'] ?? ''; // Récupérer la catégorie à afficher à partir de l'URL, 'cat' est une variable dans l'URL, c'est celle qui vient après produits.php?cat=

// Récupérer les chaussures de la catégorie à partir de la base 

if (!empty($categorie) && isset($_SESSION['categories'])) {     // Vérifier si une catégorie a été spécifiée et si elle existe dans les catégories récupérées
    // Boucler à travers les catégories pour trouver la catégorie demandée
    foreach ($_SESSION['categories'] as $cat) {  // $_SESSION['categories'] est défini dans bbd.php c'est un tab avec les catégories dedans
        if ($cat['section'] == $categorie) {   // $cat['section'] == Homme, Femme ou Enfant
            // Si la catégorie demandée est trouvée, exécuter une requête pour récupérer les produits de cette catégorie, 
            //  complexe un peu mais c'est pour éviter les doublons, sa fait un group by sur le nom de la paire
            $rqt = $bdd->prepare("SELECT c.* FROM Chaussures c INNER JOIN (  
                                                               SELECT MIN(id_chaussure) as id_chaussure, nom
                                                               FROM Chaussures
                                                               WHERE section = :categorie GROUP BY nom)
                                                               AS sub 
                                                               ON c.id_chaussure = sub.id_chaussure");  // prepare la requete avec ':categorie' var à définir,
            $rqt->execute(array(':categorie' => $categorie));  // ici on l'excecute et on lui donne la valeur de la catégorie ou on est Homme, Femme ou Enfant
            $chaussures_unique = $rqt->fetchAll();  // ici ce tableau de chaussure contient aucun doublon mais juste toutes les paires du site 

            $rqt = $bdd->prepare("SELECT * FROM Chaussures WHERE section = :categorie");
            $rqt->execute(array(':categorie' => $categorie));
            $chaussures = $rqt->fetchAll();   // ici on a toutes les chaussures on en aura besoin pour l'affichage des tailles et pour gérer les stock 

            break; // Sortir de la boucle une fois que la catégorie est trouvée
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/produits.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src="../js/produits_bdd.js"></script>
    <title>Homme - ShopTaSneakers</title>
</head>
<body>
    <div class="bandehaut">
        Livraison Gratuite à partir de 50€ d'achats. Retour offert !
    </div>
    <header>    
        <div class="titre-logo">
            <a href="index.html"><img src="../img/logo.png" class="logo"></a>       
            <h1>ShopTaSneakers</h1>
        </div>
        <a href="panier.html"><img src="../img/cart.png" class="cart"></a>
        <a href="login.html"><img src="../img/login.png" class="login"></a>
        <table id="menu">
        <tr>
            <?php afficherMenu(); ?>
        </tr>
        </table>
    </header>
      
    <div class="bloc1">
    <h2>Nos Produits <?php echo $categorie; ?> :</h2>
        <section class="produits">
            <table>
                <tr>
                    <?php
                        $count = 0;

                        // Boucle pour chaque produit
                        foreach ($chaussures_unique as $chaussure):
                           
                            // Récupérer le nom de la chaussure actuelle
                            $nom_chaussure = $chaussure['nom']; 

                            // Initialiser un tableau pour stocker les tailles disponibles pour cette chaussure
                            $tailles_disponibles = array(); 

                            // Parcourir toutes les chaussures pour récupérer les tailles correspondant au nom de la chaussure actuelle
                            foreach ($chaussures as $c) {  // ici on utilise $chaussures qui est le tableau ou on a toutes les chaussures car on veut afficher toutes les tailles pour chacune
                                if ($c['nom'] == $nom_chaussure) {
                                    // Ajouter la taille à la liste des tailles disponibles
                                    $tailles_disponibles[] = $c['taille']; 
                                }
                            }
                    ?>
                        <td class="chaussure">
                            <img src="../<?php echo $chaussure['image']; ?>" alt="produit">
                            <h3><?php echo $chaussure['nom']; ?></h3>
                            <?php echo $chaussure['prix']; ?>€<br>
                            Taille :
                            <select name="select_taille">
                                <?php
                                    // Afficher les tailles disponibles dans la liste déroulante
                                    foreach ($tailles_disponibles as $taille) {
                                        echo '<option value="' . $taille . '">' . $taille . '</option>';
                                    }                                    
                                ?>
                            </select><br>
                            Quantité :
                            <select name="quantite" class="quantite">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option vPrimairealue="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                          
                            <div class="stock">
                                <?php  
                                    if (isset($_GET['select_taille'])) {
                                    // Récupérer la taille envoyée
                                        $taille = $_GET['select_taille'];
                                        
                                        // Effectuer d'autres traitements avec la taille récupérée
                                        
                                        // Par exemple, exécuter une requête SQL pour récupérer le stock correspondant à la taille de la chaussure actuelle
                                        // Remplacez cette partie par votre propre logique de récupération de stock
                                        $rqt = $bdd->prepare("SELECT stock_dispo FROM stock WHERE taille = :taille AND nom = :nom");
                                        $rqt->execute(array(':taille' => $taille, ':nom' => $chaussure['nom']));
                                        $stocks = $rqt->fetchAll(); // Récupérer tous les stocks correspondants à cette taille
                                        
                                        // Afficher le stock disponible
                                        foreach ($stocks as $stock) {
                                            echo '<p class="line_stock">Stock disponible : ' . $stock['stock_dispo'] . '</p>';
                                        }
                                    } 
                                    else {
                                        // Si la taille n'a pas été envoyée, renvoyer un message d'erreur
                                        echo 'Erreur : Taille non spécifiée dans la requête.';
                                    }
                                ?>
                            </div>

                            <button class="ajouter-panier">Ajouter au panier</button>
                        </td>
                        <?php
                        // Si le nombre de produits dans la ligne est un multiple de 4 ou c'est le dernier produit, fermez la ligne et commencez une nouvelle ligne
                        $count++;
                        if ($count % 4 == 0 || $count == count($chaussures)):
                        ?>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </section>
        <button class="stock_button"> Afficher stock </button>
    </div>

    <footer>

        <p>Copyright &copy; Société ShopTaSneakers<br>Webmaster CY Tech</p>
        <div>
            <a href="#"><img src="../img/youtube.png" alt="YouTube"></a>
            <a href="#"><img src="../img/linkedin.png" alt="LinkedIn"></a>
            <a href="#"><img src="../img/twitter.png" alt="Twitter"></a>
            <a href="#"><img src="../img/instagram.png" alt="Instagram"></a>
        </div>
        </footer>
        <script src="../js/zoom.js"></script>
    </body>
</html>
