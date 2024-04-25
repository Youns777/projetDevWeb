<?php
// Démarrez la session si elle n'a pas déjà été démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'php/bdd.php';

// Récupérer la catégorie à afficher à partir de l'URL
$categorie = $_GET['cat'] ?? '';

// Vérifiez si le formulaire d'ajout au panier a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'])) {
    $nomProduit = $_POST['nom'];
    $mail = $_SESSION['email'];

    // Récupérer l'ID du client
    $sql = "SELECT id_client FROM clients WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $mail);
    $stmt->execute();
if ($stmt->error) {
    die("Erreur lors de l'exécution de la requête : " . $stmt->error);
}
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $idClient = $row['id_client'];

    // Récupérer la quantité et la taille du produit
    $quantite = $_POST['quantite'];
    $taille = $_POST['taille'];

    // Récupérer l'ID du produit
    $sql = "SELECT id_chaussure FROM chaussures WHERE nom = ? AND section = ? AND taille = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nomProduit, $categorie, $taille);
    $stmt->execute();
if ($stmt->error) {
    die("Erreur lors de l'exécution de la requête : " . $stmt->error);
}
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $idProduit = $row['id_chaussure'];


    // Ajouter le produit au panier
    // Vérifiez si le produit est déjà dans le panier
$sql = "SELECT * FROM panier WHERE id_client = ? AND id_chaussure = ? AND Taille = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $idClient, $idProduit, $taille);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Le produit est déjà dans le panier, augmenter la quantité
    $row = $result->fetch_assoc();
    $quantiteExistante = $row['quantite'];
    $nouvelleQuantite = $quantiteExistante + $quantite;

    $sql = "UPDATE panier SET quantite = ? WHERE id_client = ? AND id_chaussure = ? AND Taille = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $nouvelleQuantite, $idClient, $idProduit, $taille);
    $stmt->execute();
    if ($stmt->error) {
        die("Erreur lors de l'exécution de la requête : " . $stmt->error);
    }
} else {
    // Le produit n'est pas dans le panier, l'ajouter
    $sql = "INSERT INTO panier (id_client, id_chaussure, quantite, Taille) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $idClient, $idProduit, $quantite, $taille);
    $stmt->execute();
    if ($stmt->error) {
        die("Erreur lors de l'exécution de la requête : " . $stmt->error);
    }
}
}




// Récupérer les produits de la catégorie
$sql = "SELECT * FROM chaussures WHERE section = '$categorie' GROUP BY nom";
$result = $conn->query($sql);

$produits = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $idChaussure = $row['id_chaussure'];
        if (!isset($produits[$idChaussure])) {
            $produits[$idChaussure] = [
                'ID' => $row['id_chaussure'],
                'Produit' => $row['nom'],
                'Prix' => $row['prix'],
                'Image' => $row['image'],
                'Stock' => [],
                'Couleur' => $row['Couleur'],
                'Type' => $row['Type'],
                'Description' => $row['description'],
                'Matiere' => $row['matiere']
            ];
        }
        $produits[$idChaussure]['Stock'][$row['taille']] = $row['stock'];
    }
}

// Récupérer les prix de tous les produits de la catégorie
$prixProduits = array_column($produits, 'Prix');

// Définir minPrix et maxPrix aux prix minimum et maximum des produits si non spécifiés
$minPrix = (!empty($prixProduits) && (isset($_GET['minPrix']) && $_GET['minPrix'] !== '')) ? $_GET['minPrix'] : (!empty($prixProduits) ? min($prixProduits) : 0);
$maxPrix = (!empty($prixProduits) && (isset($_GET['maxPrix']) && $_GET['maxPrix'] !== '')) ? $_GET['maxPrix'] : (!empty($prixProduits) ? max($prixProduits) : 0);

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


// Pour chaque produit dans produits, si un modèle est présent plusieurs fois mais avec des tailles différentes, on ne garde qu'un seul modèle et
// on ajoute les tailles et stocks des autres modèles au modèle sous la forme [["taille1", "stocjk]]
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
            <table>
                <tr>
                    <?php
                    // Boucle pour chaque produit
                    $count = 0;
                    foreach ($produits as $produit):
                    ?>
                        <td class="chaussure">
                            <img src="<?php echo $produit['Image']; ?>" alt="produit">
                            <h3 class="titre_produit"><a href="infobox.php?cat=<?php echo $categorie; ?>&nom=<?php echo $produit['Produit'] ; ?>"><?php echo $produit['Produit']; ?></a></h3>
                            <?php echo $produit['Prix']; ?>€<br>
                            Taille :
                            <form action='produits.php?cat=<?php echo $categorie; ?>' method="post">
                            <input type="hidden" name="nom" value="<?php echo $produit['Produit']; ?>">
                            
                            <button type="button" class="voirstocktaille" id="voir-stock-<?php echo $produit['ID']; ?>" <?php echo isset($_SESSION['email']) ? '' : 'disabled'; ?>>Voir stock par taille</button>
                            <br>
                            <select name="taille" id="taille-<?php echo $produit['ID']; ?>">
                            <?php
                                // Récupérer les tailles disponibles pour le produit
                                $nomProduit = $produit['Produit'];
                                $sql_taille = "SELECT Taille, stock FROM chaussures WHERE nom='$nomProduit' AND section='$categorie'";
                                $result_taille = $conn->query($sql_taille);

                                if ($conn->error) {
                                    die("Erreur lors de l'exécution de la requête : " . $conn->error);
                                }

                                if($result_taille->num_rows > 0) {
                                    while ($rowT = $result_taille->fetch_assoc()) {
                                        if (!isset($rowT['Taille'])) {
                                            die("La clé 'Taille' n'existe pas dans le résultat de la requête");
                                        }

                                        $taille = $rowT['Taille'];
                                        $stock = $rowT['stock'];

                                        echo '<option value="'. $taille .'" data-stock="'.$stock.'">'. $taille .'</option>';                                    }
                                }
                                ?>
                            </select><br>
                            <span id="stock-<?php echo $produit['ID']; ?>"></span><br>
                            Quantité :
                            <select name="quantite" class="quantite">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <button type="submit" class="ajouter-panier" <?php echo isset($_SESSION['email']) ? '' : 'disabled'; ?>>Ajouter au panier</button>
                            </form>
                            <div class="stock">
                                <p class="line_stock"> Stock :
                                    <?php
                                    // Récupérer le stock pour chaque taille
                                    $stock = 0;
                                    $sql_taille = "SELECT Taille, stock FROM chaussures WHERE nom='$nomProduit' AND section='$categorie'";
                                    $result_taille = $conn->query($sql_taille);
                                    if($result_taille->num_rows > 0) {
                                        while ($rowT = $result_taille->fetch_assoc()) {
                                            $stock += $rowT['stock'];
                                        }
                                    }
                                    echo $stock;
                                            
                                    ?> </p>
                            </div>
                            <!--
                            
                            -->
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
        <script src="js/afficher_stock.js"></script>
    </body>
</html>

<?php
// Fermer la connexion à la base de données
$conn->close();
?>
