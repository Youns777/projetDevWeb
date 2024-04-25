<?php
// Démarrez la session si elle n'a pas déjà été démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'php/bdd.php';

?>


<!DOCTYPE html>
<html>
<head>
    <title>Récapitulatif des commandes</title>
    <link rel="stylesheet" type="text/css" href="css/recapitulatif.css">
</head>
<body>
    <div class="bandehaut">Livraison Gratuite à partir de 50€ d'achats. Retour offert !</div>
    <?php include 'php/header.php'; ?>

    <main>
        <h1>Récapitulatif des commandes</h1>

        <?php

        
        //Récupérer l'ID du client
        $mailClient = $_SESSION['email'];
        $sql = "SELECT id_client FROM clients WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $mailClient);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $idClient = $row['id_client'];


        // Récupérer toutes les commandes du client
        $sql = "SELECT * FROM commandes WHERE id_client = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idClient);
        $stmt->execute();
        $commandes = $stmt->get_result();

        
        // Pour chaque commande
    $numeroCommande = 1;
    while ($commande = $commandes->fetch_assoc()) {
        $idCommande = $commande['id_commande'];

        echo '<div class="table-container">';
        echo '<div class="commande-info">';
        echo "<h2>Commande n°" . $numeroCommande . " (ID de commande : " . $commande['id_commande'] . ")</h2>";
        echo "<p>Date de commande : " . $commande['date_commande'] . "</p>";
        echo '</div>';
        echo '<div class="table-wrapper">';
        echo "<table class='table-commande'>";

        // Récupérer les lignes de commande
        $sql = "SELECT * FROM ligne_commandes WHERE id_commande = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idCommande);
        $stmt->execute();
        $lignesCommande = $stmt->get_result();

        // Calculer le total de la commande
        $total = 0;
        echo "<table class='table-commande'>";
        echo "<tr><th>Nom du produit</th><th>Taille</th><th>Quantité</th><th>Prix unitaire</th></tr>";
        while ($ligne = $lignesCommande->fetch_assoc()) {
            $idChaussure = $ligne['id_chaussure'];
            $quantite = $ligne['quantite'];

            // Récupérer le nom, la taille et le prix de la chaussure
            $sql = "SELECT nom, taille, prix FROM chaussures WHERE id_chaussure = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $idChaussure);
            $stmt->execute();
            $result = $stmt->get_result();
            $chaussure = $result->fetch_assoc();
            $nom = $chaussure['nom'];
            $taille = $chaussure['taille'];
            $prix = $chaussure['prix'];

            // Ajouter le prix de la ligne de commande au total
            $total += $prix * $quantite;

            // Afficher les détails du produit
            echo "<tr>";
            echo "<td>" . $nom . "</td>";
            echo "<td>" . $taille . "</td>";
            echo "<td>" . $quantite . "</td>";
            echo "<td>" . $prix . "</td>";
            echo "</tr>";
        }
        echo "<tr><td colspan='3'>Total</td><td>" . $total . "</td></tr>";
        echo "</table>";
        echo "</div>";

        $numeroCommande++;
    }
    echo "</table>";
    echo '</div>';
    echo '</div>';
        ?>
    </main>

    <?php include 'php/footer.php'; ?>
</body>
</html>