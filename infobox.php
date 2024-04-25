<?php
session_start();

include 'php/bdd.php';

// Récupérer la catégorie et l'ID du produit à afficher à partir de l'URL
$categorie = $_GET['cat'] ?? '';
$nomProduit = $_GET['nom'] ?? '';

// Récupérer les produits de la catégorie
$sqlCata = "SELECT * FROM chaussures WHERE section = '$categorie' GROUP BY nom";
$resultProduits = $conn->query($sqlCata);

$produits = [];
if ($resultProduits->num_rows > 0) {
    while ($row = $resultProduits->fetch_assoc()) {
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

// Récupérer les produits de la catégorie
$sqlProduit = "SELECT * FROM chaussures WHERE section = '$categorie' AND nom = '$nomProduit' GROUP BY nom";
$result = $conn->query($sqlProduit);

$produit = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nomChaussure = $row['nom'];
        if (!isset($produit[$nomChaussure])) {
            $produit= [
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
    }
}

// Vérifiez si le formulaire d'ajout au panier a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'])) {
    $nomProduit = $_POST['nom'];
    $taille = $_POST['taille'];
    $quantite = $_POST['quantite'];
    $mailClient = $_SESSION['email'];

    // Récupérer l'ID du client
    $sql = "SELECT id_client FROM clients WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $mailClient);
    $stmt->execute();
    $result = $stmt->get_result();
    $client = $result->fetch_assoc();
    $idClient = $client['id_client'];

    // Récupérer l'ID du produit
    $sql = "SELECT id_chaussure FROM chaussures WHERE nom = ? AND section = ? AND taille = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nomProduit, $categorie, $taille);
    $stmt->execute();
    $result = $stmt->get_result();
    $chaussure = $result->fetch_assoc();
    $idChaussure = $chaussure['id_chaussure'];

    // Ajouter le produit au panier
  // Vérifiez si le produit est déjà dans le panier
$sql = "SELECT * FROM panier WHERE id_client = ? AND id_chaussure = ? AND Taille = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $idClient, $idChaussure, $taille);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Le produit est déjà dans le panier, augmenter la quantité
    $row = $result->fetch_assoc();
    $quantiteExistante = $row['quantite'];
    $nouvelleQuantite = $quantiteExistante + $quantite;

    $sql = "UPDATE panier SET quantite = ? WHERE id_client = ? AND id_chaussure = ? AND Taille = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $nouvelleQuantite, $idClient, $idChaussure, $taille);
    $stmt->execute();
} else {
    // Le produit n'est pas dans le panier, l'ajouter
    $sql = "INSERT INTO panier (id_client, id_chaussure, quantite, Taille) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $idClient, $idChaussure, $quantite, $taille);
    $stmt->execute();
}

    // Rediriger l'utilisateur vers la page du panier
    header('Location: panier.php');
    exit;
}

/*
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
}*/

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
    <form action='infobox.php?cat=<?php echo $categorie; ?>&nom=<?php echo $nomProduit; ?>' method="post">
    <input type="hidden" name="nom" value="<?php echo $produit['Produit']; ?>">
    <select name="taille">
    <?php
        // Récupérer les tailles disponibles pour le produit
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

                echo '<option value="' . $taille . '">' . $taille . ' (Stock: ' . $stock . ')</option>';
            }
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
    <button type="submit" class="ajouter-panier" <?php echo isset($_SESSION['email']) ? '' : 'disabled'; ?>>Ajouter au panier</button>
</form>
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
        // Récupérer les produits de la catégorie
        $sqlRand = "SELECT DISTINCT * FROM chaussures WHERE section='$categorie' GROUP BY nom ORDER BY RAND() LIMIT 5";
        $resultRand = $conn->query($sqlRand);

        $produitsSugg = [];
        if ($resultRand->num_rows > 0) {
            while ($row = $resultRand->fetch_assoc()) {
                $idChaussure = $row['id_chaussure'];
                if (!isset($produitsSugg[$idChaussure])) {
                    $produitsSugg[$idChaussure] = [
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
            }
        }
        
    foreach ($produitsSugg as $prod) {
        ?>
        <div class="produit">
            <a href="infobox.php?cat=<?php echo $categorie; ?>&nom=<?php echo $prod['Produit']; ?>">
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