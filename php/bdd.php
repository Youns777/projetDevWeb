<!-- 
un autre script nommé « bdd.php » contenant les fonctions sécurisées (avec récupération sur erreur) suivantes :
- Connexion : pour se connecter à la base et renvoyant vrai ou faux si erreur
- Deconnexion : pour se déconnecter de la base
- Une fonction par récupération de données nécessaires à votre site et renvoyant un tableau des données récupérées ou NULL si la requêtes a
  échoué. 
-->
<?php

try {
    $bdd = new PDO('mysql:localhost=phpmyadmin;dbname=ShopTaSneakers;charset=utf8', 'phpmyadmin', 'cytech0001');      // Connexion à la base de donnée mysql sur phpmyadmin
} 
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage()); // Si erreur, on affiche un message et on arrête tout
}

session_start();

$rqt = $bdd->query("SELECT DISTINCT section FROM Chaussures");  // on enregistre la requete qui va permettre de récupérer les catégories Homme,Femme et Enfant
$categories = $rqt->fetchAll();    // on met le resultat de la requete dans une variable catégorie, sa va donc etre un tab avec Homme,Femme et Enfant

$_SESSION['categories'] = $categories;

function afficherMenu() {   // Simplifier l'écriture des menus en utilisant le tableau des catégories, je reprends la fonction menu de younes avec une ptite modif
    if (isset($_SESSION['categories'])) {
        echo '<tr>';
        foreach ($_SESSION['categories'] as $categorie) {
            echo '<td><a href="produits.php?cat=' . $categorie['section'] . '" class="boutonMenu">' . ucfirst($categorie['section']) . '</a></td>';
        }
        echo '</tr>';
    }
}

/* $bdd = NULL;  // déconnexion a trouver ou la mettre 
 */
?>