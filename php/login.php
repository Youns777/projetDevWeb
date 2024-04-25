<?php

// Démarrez la session si elle n'a pas déjà été démarrée
session_start();


//Connexion à la base de données
$servername = "localhost";
$username = "phpmyadmin";
$password = "cytech0001";
$dbname = "shoptasneaker";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Récupérer les données du formulaire
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$email = $_POST['email'] ?? '';
$adresse = $_POST['adresse'] ?? '';
$dateNaissance = $_POST['Date_Naissance'] ?? '';
$password = $_POST['password'] ?? '';

//Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit_inscription'])) {
        //Vérifier si les champs sont remplis
        if ($nom === '' || $prenom === '' || $email === '' || $adresse === '' || $dateNaissance === '' || $password === '') {
            echo 'Veuillez remplir tous les champs';
        } else {
            //Vérifier si l'email est valide
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo 'Email invalide';
            } else {
                //Vérifier si l'email existe déjà
                $sql = "SELECT * FROM clients WHERE email = '$email'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo 'Email déjà utilisé';
                } else {
                    //Ajouter l'utilisateur à la base de données
                    $sql = "INSERT INTO clients (nom, prenom, email, mot_de_passe, adresse, date_naissance, role) VALUES (?, ?, ?, ?, ?, ?, 0)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssss", $nom, $prenom, $email, $password, $adresse, $dateNaissance);
                    if ($stmt->execute()) {
                        echo 'Utilisateur ajouté avec succès';
                    } else {
                        echo 'Erreur: ' . $stmt->error;
                    }
                }
            }
        }
    } elseif (isset($_POST['submit_connexion'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Vérifier si les champs sont remplis
            if ($email === '' || $password === '') {
                echo 'Veuillez remplir tous les champs';
            } else {
                //Vérifier si l'email existe
                $sql = "SELECT * FROM clients WHERE email = '$email'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    //Vérifier si le mot de passe est correct
                    $row = $result->fetch_assoc();
                    if ($row['mot_de_passe'] === $password) {
                        $_SESSION['email'] = $email;
                        $_SESSION['role'] = $row['role'];
                        echo 'Connexion réussie';
                        // Rediriger l'utilisateur vers la page d'accueil
                        header('Location: index.php');
                    } else {
                        echo 'Mot de passe incorrect';
                    }
                } else {
                    echo 'Email non trouvé';
                }
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
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
        <?php include 'php/header.php'; ?>
        <?php if (isset($_SESSION['email'])): ?>
        <p>Bonjour, <?= $_SESSION['email'] ?></p>
        <form action="index.php?logout=true" method="post">
            <input type="submit" value="Déconnexion">
        </form>
        <?php else: ?>
        <div class="bloc1">
            <h2 class="titreformulaire">Bienvenue au royaume de la sneakers !</h2>
            <div class="container">
                <div class="form_inscription">   
                    <form action="" method="post" id="inscription_form">
                        <label for="nom" > Nom : </label>    
                        <input type="text" name="nom" placeholder="Entrez votre Nom"/> <br>
                        <small id="nom_small"></small><br>

                        <label for="Prenom" > Prénom : </label>    
                        <input type="text" name="prenom" placeholder="Entrez votre Prenom"/> <br>
                        <small id="prenom_small"></small><br>

                        <label for="email" > Email : </label>    
                        <input type="text" name="email" placeholder="monmail@monsite.org"/> <br>
                        <small id="email_small"></small><br>

                        <label for="Adresse" > Adresse : </label>    
                        <input type="text" name="adresse" placeholder="Entrez votre adresse"/> <br>
                        <small id="adresse_small"></small><br>

                        <label for="Date_Naissance" > Date de Naissance : </label>
                        <input type="date" name="Date_Naissance"/> <br>
                        <small id="dateNaissance_small"></small><br>

                        <label for="Mot_passe" name="password">Mot de passe : </label>
                        <input type="password" name="password" placeholder="******"/> <br>
                        <small id="password_small"></small><br>


                        <input type="submit" name="submit_inscription" value="Inscription" class="Inscription"/>
                    </form>
                </div>
                <div class="form_connexion">
                    <form action="" method="post" class="form2">
                        <label for="email" > Email : </label>    
                        <input type="email" name="email" placeholder="monmail@monsite.org"/> <br>
                        <small id="email_small"></small><br>

                        <label for="Mot_passe" name="password">Mot de passe : </label>
                        <input type="password" name="password" placeholder="******"/> <br>
                        <small id="password_small"></small><br>


                        <input type="submit" name="submit_connexion" value="Connexion" class="Connexion"/>
                    </form>
                </div>
                <div class="footer_form">
                        <a href="" class="button_inscription">Inscription</a>
                        <a href="" class="button_connexion">Connexion</a>
                </div>
            </div>
        </div>
        <script src="js/login_verif.js"></script>
        <?php endif; ?>
    </body>
    

    <?php include 'php/footer.php'; ?>
</html>
    
