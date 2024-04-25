<?php
// Démarrez la session si elle n'a pas déjà été démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoptasneaker";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$mailClient = $_SESSION['email'] ?? '';

// Récupérer l'ID du client
$sql = "SELECT id_client FROM clients WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mailClient);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $idClient = $row['id_client'];
} else {
    $idClient = NULL;
}

// Pour chaque produit dans le panier
$sql = "SELECT * FROM panier WHERE id_client = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idClient);
$stmt->execute();
$result = $stmt->get_result();

$erreur = false; // Ajouter une variable pour suivre si une erreur s'est produite
$messageErreur = ""; // Ajouter une variable pour stocker le message d'erreur

while ($row = $result->fetch_assoc()) {
    $idChaussure = $row['id_chaussure'];
    $quantite = $row['quantite'];
    $taille = $row['Taille'];

    // Vérifiez si id_chaussure est NULL
    if ($idChaussure === NULL) {
        echo "Erreur : id_chaussure est NULL pour le produit dans le panier";
        continue;
    }

    // Vérifiez si la quantité du produit dans le panier est inférieure ou égale au stock du produit
    $sql = "SELECT stock, nom FROM chaussures WHERE id_chaussure = ? AND Taille = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $idChaussure, $taille);
    $stmt->execute();
    $result = $stmt->get_result();
    $chaussure = $result->fetch_assoc();
    $stock = $chaussure['stock'];
    $nomChaussure = $chaussure['nom'];

    if ($quantite > $stock) {
        $erreur = true; // Mettre à jour la variable d'erreur
        $messageErreur = "Erreur : la quantité de la chaussure '$nomChaussure' taille $taille dans le panier est supérieure au stock du produit. Le stock est de " . $stock;
        break;
    }
}

// Vérifiez si le formulaire de suppression a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idPanier'])) {
    $idPanier = $_POST['idPanier'];

    // Supprimer le produit du panier
    $sql = "DELETE FROM panier WHERE id_panier = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idPanier);
    $stmt->execute();

    // Rediriger l'utilisateur vers la page du panier
    header("Location: panier.php");
    exit;
}

// Vérifiez si le formulaire de validation de commande a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['validerCommande'])) {
    if ($erreur) {
        echo $messageErreur;
    } else {
    // Créer une nouvelle commande
    $sql = "INSERT INTO commandes (id_client, date_commande) VALUES (?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idClient);
    $stmt->execute();

    // Récupérer l'ID de la commande
    $idCommande = $conn->insert_id;

    // Pour chaque produit dans le panier
    $sql = "SELECT * FROM panier WHERE id_client = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idClient);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $idChaussure = $row['id_chaussure'];
        $quantite = $row['quantite'];
        $taille = $row['Taille'];
    
        // Vérifiez si id_chaussure est NULL
        if ($idChaussure === NULL) {
            echo "Erreur : id_chaussure est NULL pour le produit dans le panier";
            continue;
        }
    
        // Créer une nouvelle ligne de commande
        $sql = "INSERT INTO ligne_commandes (id_commande, id_chaussure, quantite, taille) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiii", $idCommande, $idChaussure, $quantite, $taille);
        $stmt->execute();
    
        // Mettre à jour le stock du produit
        $sql = "UPDATE chaussures SET stock = stock - ? WHERE id_chaussure = ? AND Taille = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $quantite, $idChaussure, $taille);
        $stmt->execute();
    }

    // Supprimer tous les produits du panier du client
    $sql = "DELETE FROM panier WHERE id_client = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idClient);
    $stmt->execute();

    // Rediriger l'utilisateur vers la page de récapitulatif de commande
    header('Location: recapitulatif.php?idCommande=' . $idCommande);
    exit;
}
}



//Recuperer le nom de la categorie
$categorie = $_GET['cat'] ?? '';


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/panier.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>Panier - ShopTaSneakers</title>
</head>

<body>
    <div class="bandehaut">
        Livraison Gratuite à partir de 50€ d'achats. Retour offert !
    </div>

    <?php include 'php/header.php'; ?>

    <div class="bloc1">
    <h2>Votre Panier :</h2>
    <section class="panier">
        <?php if (isset($_SESSION['email'])): ?>
            <table>
                <tr>
                    <?php
                    $sql = "SELECT * FROM clients c
                    INNER JOIN panier p ON p.id_client = c.id_client
                    INNER JOIN chaussures ch ON p.id_chaussure = ch.id_chaussure
                    WHERE c.email = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $mailClient);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $idProduit = $row['id_chaussure'];
                            $nomProduit = $row['nom'];
                            $taille = $row['Taille'];
                            $quantite = $row['quantite'];
                            $prix = $row['prix'];
                            $image = $row['image'];
                            
                            $idClient = $row['id_client'];
                            $idPanier = $row['id_panier'];
                            ?>
                            <td class="chaussure">
                                <img src="<?php echo $image; ?>" alt="produit">
                                <h3><a href="infobox.php?cat=<?php echo $categorie; ?>&nom=<?php echo $nomProduit; ?>"><?php echo $nomProduit; ?></a></h3>
                                Taille : <?php echo $taille; ?><br>
                                Quantité : <?php echo $quantite; ?><br>
                                Prix : <?php echo $prix; ?>€<br>
                                <form action="panier.php" method="post">
                                    <input type="hidden" name="idPanier" value="<?php echo $idPanier; ?>">
                                    <input type="submit" name="supprimerDuPanier" value="Supprimer du panier">
                                </form>
                            </td>
                            <?php
                        }
                    }
                            
                    ?>
                </tr>
            </table>
        <?php else: ?>
            <p> >>> Vous devez vous connecter pour accéder à votre panier. <<< </p>
        <?php endif; ?>
        <?php if (isset($_SESSION['email'])): ?>
            <?php
                // Vérifiez si le panier est vide
                $sql = "SELECT COUNT(*) as count FROM panier WHERE id_client = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $idClient);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $panierCount = $row['count'];

                if ($panierCount > 0): ?>
                    <?php if (!$erreur): ?>
                        <form action="panier.php" method="post">
                            <input type="submit" name="validerCommande" value="Valider commande">
                        </form>
                    <?php else: ?>
                        <p><?php echo $messageErreur; ?></p>
                    <?php endif; ?>
                <?php else: ?>
                    <p>Votre panier est vide. Ajoutez des produits avant de valider la commande.</p>
                <?php endif; ?>
                <a href="recapitulatif.php" class="button">Voir mes commandes</a>
        <?php endif; ?>

    
    </section>
    </div>

    <?php include 'php/footer.php'; ?>
</body>
</html>

<?php
// Fermer la connexion à la base de données
$conn->close();
?>