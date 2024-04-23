<!--
un autre script nommé « bdd.php » contenant les fonctions sécurisées (avec récupération sur erreur) suivantes :
- Connexion : pour se connecter à la base et renvoyant vrai ou faux si erreur
- Deconnexion : pour se déconnecter de la base
- Une fonction par récupération de données nécessaires à votre site et renvoyant un tableau des données récupérées ou NULL si la requêtes a
  échoué.
-->
<?php
 
try {
    $bdd = new PDO('mysql:localhost=phpmyadmin;dbname=ShopTaSneakers;charset=utf8', 'root', '');      // Connexion à la base de donnée mysql sur phpmyadmin
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

if(isset($_POST['forminscription'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['adresse']) && !empty($_POST['password'])) {
        // Validation de l'email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Vérifier si l'email existe déjà
            $reqmail = $bdd->prepare("SELECT * FROM clients WHERE email = ?");
            $reqmail->execute(array($email));
            $mailexist = $reqmail->rowCount();
            if($mailexist == 0) {
                $insert = $bdd->prepare("INSERT INTO clients(nom, prenom, email, adresse, password) VALUES(?, ?, ?, ?, ?)");
                $insert->execute(array($nom, $prenom, $email, $adresse, $password));
                $msg = "Votre compte a été créé !";
            } else {
                $msg = "Adresse email déjà utilisée !";
            }
        } else {
            $msg = "Votre adresse email n'est pas valide !";
        }
    } else {
        $msg = "Tous les champs doivent être complétés !";
    }
}
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8"></head>
        <link rel="stylesheet"  href="normalize.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <script src="js/login.js"></script>
        <title>login - ShopTaSneakers</title>
    </head>
    
    <body>
        <div class="bandehaut">Livraison Gratuite à partir de 50€ d'achats. Retour offert !</div>
        <header>
            <div class="titre-logo">
                <a href="index.html"><img src="img/logo.png" class="logo"></a>       
                <h1>ShopTaSneakers</h1>
            </div>
            <a href="index.php"><img src="img/cart.png" class="cart"></a>

            <a href="index.html">
                <img src="img/login.png" class="login">
            </a>
            <br>

            <table id="menu">
                <tr>
                    <?php afficherMenu();?>
                </tr>
            </table>
        </header>
        
        <div class="bloc1">
            <h2 class="titreformulaire">Bienvenue au royaume de la sneakers !</h2>
            <div class="container">
                <div class="form_inscription">   
                    <form action="" method="post" id="inscription_form">
                        <label for="nom">Nom :</label>    
                        <input type="text" name="nom" value="<?php if(isset($nom)) {echo $nom;}?>" placeholder="Entrez votre Nom"/><br>
                        <small id="nom_small"></small><br>

                        <label for="prenom">Prénom :</label>    
                        <input type="text" name="prenom" value="<?php if(isset($prenom)) {echo $prenom;}?>" placeholder="Entrez votre Prénom"/><br>
                        <small id="prenom_small"></small><br>

                        <label for="email">Email :</label>    
                        <input type="text" name="email" value="<?php if(isset($email)) {echo $email;}?>" placeholder="monmail@monsite.org"/><br>
                        <small id="email_small"></small><br>

                        <label for="adresse">Adresse :</label>    
                        <input type="text" name="adresse" value="<?php if(isset($adresse)) {echo $adresse;}?>" placeholder="Entrez votre adresse"/><br>
                        <small id="adresse_small"></small><br>

                        <label for="Date_Naissance">Date de Naissance :</label>
                        <input type="date" name="Date de Naissance"/><br>
                        <small id="dateNaissance_small"></small><br>

                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" placeholder="******"/><br>
                        <small id="password_small"></small><br>


                        <input type="submit" value="Inscription" name="forminscription" class="Inscription"/>
                    </form>
                </div>
                <div class="form_connexion">
                    <form action="" method="post" class="form2">
                        <label for="email">Email :</label>    
                        <input type="email" name="email" placeholder="monmail@monsite.org"/><br>
                        <small id="email_small"></small><br>

                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" placeholder="******"/><br>
                        <small id="password_small"></small><br>


                        <input type="submit" value="Connexion"  class="Connexion"/>
                    </form>
                </div>
                <div class="footer_form">
                        <a href="" class="button_inscription">Inscription</a>
                        <a href="" class="button_connexion">Connexion</a>
                </div>
            </div>
        </div>
        <script src="js/login_verif.js"></script>

    </body>
    

    <footer>
       <p>Copyright &copy; Société ShopTaSneakers<br>Webmaster CY Tech</p>
        <a href="#"><img src="img/youtube.png" alt="YouTube"></a>
        <a href="#"><img src="img/linkedin.png" alt="LinkedIn"></a>
        <a href="#"><img src="img/twitter.png" alt="Twitter"></a>
        <a href="#"><img src="img/instagram.png" alt="Instagram"></a>
    </footer>
</html>
