<?php
// Inclure le fichier varSession.inc.php
include 'php/varSession.inc.php';

// Récupérer la catégorie à afficher à partir de l'URL
$categorie = $_GET['cat'] ?? '';

// Récupérer les produits de la catégorie
$produits = $_SESSION['categories'][$categorie] ?? [];

// Récupérer les prix de tous les produits de la catégorie
$prixProduits = array_column($produits, 'Prix');

// Définir minPrix et maxPrix aux prix minimum et maximum des produits si non spécifiés
$minPrix = (isset($_GET['minPrix']) && $_GET['minPrix'] !== '') ? $_GET['minPrix'] : min($prixProduits);
$maxPrix = (isset($_GET['maxPrix']) && $_GET['maxPrix'] !== '') ? $_GET['maxPrix'] : max($prixProduits);

$couleurs = $_GET['couleur'] ?? [];
$types = $_GET['type'] ?? [];


// Récupérer toutes les couleurs et types uniques parmi les produits
$couleursUniques = array_unique(array_column($produits, 'Couleur'));
$typesUniques = array_unique(array_column($produits, 'Type'));

// Filtrer les produits en fonction des filtres
$produits = array_filter($produits, function($produit) use ($minPrix, $maxPrix, $couleurs, $types) {
    return
        ($produit['Prix'] >= $minPrix) &&
        ($produit['Prix'] <= $maxPrix) &&
        (empty($couleurs) || in_array($produit['Couleur'], $couleurs)) &&
        (empty($types) || in_array($produit['Type'], $types));
});
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/produits.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src="js/homme.js"></script>
    <title>Homme - ShopTaSneakers</title>
</head>

<body>
    <div class="bandehaut">
        Livraison Gratuite à partir de 50€ d'achats. Retour offert !
    </div>
    <header>    
        <div class="titre-logo">
            <a href="index.html"><img src="img/logo.png" class="logo"></a>       
            <h1>ShopTaSneakers</h1>
        </div>
        <a href="panier.html"><img src="img/cart.png" class="cart"></a>
        <a href="login.html"><img src="img/login.png" class="login"></a>
        <table id="menu">
        <tr>
            <?php afficherMenu(); ?>
        </tr>
    </table>
    </header>

    <aside>
        <h2>Filtres</h2>
            <form action="produits.php" method="get">
                <input type="hidden" name="cat" value="<?php echo $categorie; ?>">
                <h3>Prix</h3>
                
                <label> Prix min : </label><input type="number" name="minPrix" placeholder="Prix min" value="<?php echo $_GET['minPrix'] ?? ''; ?>">
                <label> Prix max : </label><input type="number" name="maxPrix" placeholder="Prix max" value="<?php echo $_GET['maxPrix'] ?? ''; ?>">
                
                <h3>Couleur</h3>
                <?php foreach ($couleursUniques as $couleur): ?>
                    <label><input type="checkbox" name="couleur[]" value="<?php echo $couleur; ?>" <?php echo in_array($couleur, $couleurs) ? 'checked' : ''; ?>> <?php echo ucfirst($couleur); ?></label><br>
                <?php endforeach; ?>

                <h3>Type</h3>
                <?php foreach ($typesUniques as $type): ?>
                    <label><input type="checkbox" name="type[]" value="<?php echo $type; ?>" <?php echo in_array($type, $types) ? 'checked' : ''; ?>> <?php echo ucfirst($type); ?></label><br>
                <?php endforeach; ?>

                <input type="submit" value="Appliquer les filtres">
            </form>
            <button class="stock_button"> Afficher stock </button>
    </aside>

    <div class="bloc1">
    <h2>Nos Produits <?php echo ucfirst($categorie); ?> :</h2>
    <section class="produits">
    <?php foreach ($produits as $produit): ?>
        <div class="chaussure">
            <img src="<?php echo $produit['Image']; ?>" alt="produit">
            <h3><?php echo $produit['Produit']; ?></h3>
            <?php echo $produit['Prix']; ?>€<br>
            <!-- ... -->
            <div class="stock">
                <p class="line_stock"> Stock : <?php echo $produit['Stock']; ?> </p>
            </div>
            <button class="ajouter-panier">Ajouter au panier</button>
        </div>
    <?php endforeach; ?>
</section>
</div>
    <footer>

        <p>Copyright &copy; Société ShopTaSneakers<br>Webmaster CY Tech</p>
        <div>
            <a href="#"><img src="img/youtube.png" alt="YouTube"></a>
            <a href="#"><img src="img/linkedin.png" alt="LinkedIn"></a>
            <a href="#"><img src="img/twitter.png" alt="Twitter"></a>
            <a href="#"><img src="img/instagram.png" alt="Instagram"></a>
        </div>
        </footer>
        <script src="js/zoom.js"></script>
    </body>
</html>
