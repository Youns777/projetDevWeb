<?php
// Inclure le fichier varSession.inc.php
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

// Récupérer la catégorie à afficher à partir de l'URL
$categorie = $_GET['cat'] ?? '';

// Récupérer les produits de la catégorie
$produits = $categories[$categorie] ?? [];

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

    <?php include 'php/header.php'; ?>
    
    <aside>
        <h2>Filtres</h2>
            <form action="produits.php" method="get">
                <input type="hidden" name="cat" value="<?php echo $categorie; ?>">
                <h3>Prix</h3>
                
                <label> Prix min : </label><input type="number" name="minPrix" placeholder="Prix min" value="<?php echo $_GET['minPrix'] ?? ''; ?>">
                <label> Prix max : </label><input type="number" name="maxPrix" placeholder="Prix max" value="<?php echo $_GET['maxPrix'] ?? ''; ?>">
                
                <h3>Couleur</h3>
                <?php foreach ($couleursUniques as $couleur): ?>
                    <label><input type="checkbox" name="couleur[]" value="<?php echo $couleur; ?>" <?php echo in_array($couleur, $couleurs) ? 'checked' : ''; ?>> <?php echo ucfirst($couleur); ?></label>
                <?php endforeach; ?>

                <h3>Type</h3>
                <?php foreach ($typesUniques as $type): ?>
                    <label><input type="checkbox" name="type[]" value="<?php echo $type; ?>" <?php echo in_array($type, $types) ? 'checked' : ''; ?>> <?php echo ucfirst($type); ?></label>
                <?php endforeach; ?>

                <input type="submit" value="Appliquer les filtres">
            </form>
            <button class="stock_button"> Afficher stock </button>
    </aside>

    <div class="bloc1">
    <h2>Nos Produits <?php echo ucfirst($categorie); ?> :</h2>
    <section class="produits">
            <table>
                <tr>
                    <?php
                    // Boucle pour chaque produit
                    $count = 0;
                    foreach ($produits as $produit):
                    ?>
                        <td class="chaussure">
                            <img src="<?php echo $produit['Image']; ?>" alt="produit">
                            <h3><a id=lien ; href="infobox.php?cat=<?php echo $categorie; ?>&id=<?php echo $produit['ID']; ?>"><?php echo $produit['Produit']; ?></a></h3>
                            <?php echo $produit['Prix']; ?>€<br>
                            Taille :
                            <select name="taille">
                                <?php
                                
                                $tailles_disponibles = [];  // tab des tailles

                                switch ($categorie) {
                                    case 'Homme':
                                    case 'Femme':
                                        $tailles_disponibles = range(40, 49);
                                        break;
                                    case 'Enfant':
                                        $tailles_disponibles = range(35, 40);
                                        break;
                                    default:
                                        $tailles_disponibles = range(35, 49);
                                        break;
                                }

                                // Générer les options de la liste déroulante
                                foreach ($tailles_disponibles as $taille) {
                                    echo '<option value="' . $taille . '">' . $taille . '</option>';
                                }
                                ?>
                            </select><br>
                            Quantité :
                            <select name="quantite" class="quantite">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <div class="stock">
                                <p class="line_stock"> Stock : <?php echo $produit['Stock']; ?> </p>
                            </div>
                            <button class="ajouter-panier">Ajouter au panier</button>
                        </td>
                        <?php
                        // Si le nombre de produits dans la ligne est un multiple de 4 ou c'est le dernier produit, fermez la ligne et commencez une nouvelle ligne
                        $count++;
                        if ($count % 4 == 0 || $count == count($produits)):
                        ?>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
            </table>
        </section>
    </div>
    <?php include 'php/footer.php'; ?>
        <script src="js/zoom.js"></script>
    </body>
</html>
