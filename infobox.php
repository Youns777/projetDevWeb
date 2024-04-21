<?php
session_start();

// Définir le tableau des catégories avec les produits et leurs informations
$csvFile = fopen('php\csv\produits.csv', 'r');
$categories = [];
$produits = [];

// Skip the first line (header)
fgetcsv($csvFile);

while (($row = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
    $produit = [
        'ID' => $row[0],
        'Produit' => $row[2],
        'Prix' => $row[3],
        'Image' => $row[4],
        'Stock' => $row[5],
        'Couleur' => $row[6],
        'Type' => $row[7],
        'Description' => $row[8],
        'Matiere' => $row[9]
    ];
    $categories[$row[1]][] = $produit;
    $produits[$row[0]] = $produit;
}

fclose($csvFile);

// Récupérer la catégorie et l'ID du produit à afficher à partir de l'URL
$categorie = $_GET['cat'] ?? '';
$idProduit = $_GET['id'] ?? '';

// Récupérer le produit à partir de la session
$produit = null;
if (isset($categories[$categorie])) {
    foreach ($categories[$categorie] as $prod) {
        if ($prod['ID'] == $idProduit) {
            $produit = $prod;
            break;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/infobox.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title><?php echo $produit['Produit']; ?> - ShopTaSneakers</title>
</head>

<body>
    <div class="bandehaut">
        Livraison Gratuite à partir de 50€ d'achats. Retour offert !
    </div>

    <?php include 'php/header.php'; ?>

    <div class="produit">
    <img src="<?php echo $produit['Image']; ?>" alt="<?php echo $produit['Produit']; ?>">
    <div class="produit-details">
        <h1><?php echo $produit['Produit']; ?></h1>
        <p><?php echo $produit['Description']; ?></p>
        <p class="prix">Prix : <?php echo $produit['Prix']; ?>€</p>
        <p class="stock <?php echo $produit['Stock'] > 0 ? '' : 'out-of-stock'; ?>">
        <?php echo $produit['Stock'] > 0 ? 'En stock' : 'Épuisé'; ?>
        </p>
        <a id="panier" href="panier.php?id=<?php echo $idProduit; ?>">Ajouter au panier</a>
    </div>
</div>

<div class="info-box">
    <h2>Informations supplémentaires : </h2>
    <p>Couleur : <?php echo $produit['Couleur']; ?></p>
    <p>Type : <?php echo $produit['Type']; ?></p>
    <p>Matière principale : <?php echo $produit['Matiere']; ?></p>
</div>

<div class="produits-suggestion">
    <h2>Produits qui pourraient vous plaire</h2>
    <div class="produits">
    <?php
    $produitsSugg = [];
    while (count($produitsSugg) < 5) {
        $prod = $_SESSION['categories'][$categorie][array_rand($_SESSION['categories'][$categorie])];
        if ($prod['ID'] == $idProduit || in_array($prod, $produitsSugg)) {
            continue;
        }
        $produitsSugg[] = $prod;
    }
    foreach ($produitsSugg as $prod) {
        ?>
        <div class="produit">
            <a href="infobox.php?cat=<?php echo $categorie; ?>&id=<?php echo $prod['ID']; ?>">
                <img src="<?php echo $prod['Image']; ?>" alt="<?php echo $prod['Produit']; ?>">
                <h3><?php echo $prod['Produit']; ?></h3>
                <p><?php echo $prod['Prix']; ?>€</p>
            </a>
    </div>
    <?php } ?>
    </div>
</div>

    <?php include 'php/footer.php'; ?>
    <script src="js/zoom.js"></script>
</body>
</html>