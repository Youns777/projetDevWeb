<?php
// Démarrez la session si elle n'a pas déjà été démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Connexion à la base de données
$servername = "localhost";
$username = "phpmyadmin";
$password = "cytech0001";
$dbname = "shoptasneaker";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$mailClient = $_SESSION['email'] ?? '';

// Vérifiez si le formulaire de suppression a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idPanier'])) {
    $idPanier = $_POST['idPanier'];

    // Supprimer le produit du panier
    $sql = "DELETE FROM panier WHERE id_panier = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idPanier);
    $stmt->execute();

    // Rediriger l'utilisateur vers la page du panier
    header('Location: panier.php');
    exit;
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
                                    <input type="submit" value="Supprimer du panier">
                                </form>
                            </td>
                            <?php
                        }
                    } else {
                        echo 'Votre panier est vide';
                    }
                            
                    ?>
                </tr>
            </table>
        <?php else: ?>
            <p> >>> Vous devez vous connecter pour accéder à votre panier. <<< </p>
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