<?php
// Inclure le fichier varSession.inc.php
include 'php/varSession.inc.php';

// Récupérer la catégorie à afficher à partir de l'URL
$categorie = $_GET['cat'] ?? '';

// Récupérer les produits de la catégorie
$produits = $_SESSION['categories'][$categorie] ?? [];
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
                            <h3><?php echo $produit['Produit']; ?></h3>
                            <?php echo $produit['Prix']; ?>€<br>
                            Taille :
                            <select name="taille">
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
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
        <button class="stock_button"> Afficher stock </button>
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
