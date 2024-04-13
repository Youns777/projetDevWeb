<?php

// Démarrer la session
session_start();

// Définir le tableau des catégories avec les produits et leurs informations

$csvFile = fopen('php\csv\produits.csv', 'r');
$categories = [];

// Skip the first line (header)
fgetcsv($csvFile);

while (($row = fgetcsv($csvFile, 1000, ",")) !== FALSE) {
    $categories[$row[0]][] = [
        'Produit' => $row[1],
        'Prix' => $row[2],
        'Image' => $row[3],
        'Stock' => $row[4]
    ];
}

fclose($csvFile);



// Stocker le tableau des catégories dans la variable de session
$_SESSION['categories'] = $categories;

// Simplifier l'écriture des menus en utilisant le tableau des catégories
function afficherMenu() {
    if (isset($_SESSION['categories'])) {
        $categories = $_SESSION['categories'];
        echo '<tr>';
        foreach ($categories as $categorie => $produits) {
            echo '<td><a href="produits.php?cat=' . $categorie . '" class="boutonMenu">' . ucfirst($categorie) . '</a></td>';
        }
        echo '</tr>';
    }
}

?>
