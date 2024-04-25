<?php
// Démarrez la session si elle n'a pas déjà été démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'php/bdd.php';

// Vérifiez si le formulaire de contact a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $dateNaissance = $_POST['DateDeNaissance'];

    // Récupérer les informations du client
    $sql = "SELECT * FROM clients WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $result = $stmt->get_result();
    $client = $result->fetch_assoc();

    // Vérifiez si les informations du formulaire correspondent à celles du client
    if ($nom === $client['nom'] && $prenom === $client['prenom'] && $email === $client['email'] && $dateNaissance === $client['date_naissance']) {
        // Obtenir la date actuelle
        $dateDuContact = date('Y-m-d');

        // Insérer les informations du formulaire dans la table 'formulaire'
        $sql = "INSERT INTO formulaire (date_contact, nom, prenom, email, genre, date_naissance, fonction, sujet, contenu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $dateDuContact, $nom, $prenom, $email, $_POST['genre'], $dateNaissance, $_POST['fonction'], $_POST['Sujet'], $_POST['Contenu']);
        $stmt->execute();
    } else {
        echo "Les informations du formulaire ne correspondent pas à celles du client.";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet"  href="normalize.css">
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>Contact - ShopTaSneakers</title>
</head>
<body>
    <div class="bandehaut">Livraison Gratuite à partir de 50€ d'achats. Retour offert !</div>
    <?php include 'php/header.php'; ?>
        
    <div class="bloc1">
        <h2 class="titreformulaire">Demande de Contact</h2>
        
        <form action="" method="post" id="contactForm">
            <label for="nom">Nom :</label>    
            <input type="text" name="nom" placeholder="Entrez votre Nom"> <br>
            <small id="nom_small"></small><br>
            
            <label for="prenom">Prénom :</label>    
            <input type="text" name="prenom" placeholder="Entrez votre Prenom"> <br>
            <small id="prenom_small"></small><br>

            
            <label for="email">Email :</label>    
            <input type="text" name="email" placeholder="monmail@monsite.org"> <br>
            <small id="email_small"></small><br>
            
            <label for="genre">Genre :</label>
            <input type="radio" name="genre" value="Homme"> Homme
            <input type="radio" name="genre" value="Femme"> Femme <br>
            <small id="genre_small"></small><br>
            
            <label for="DateDeNaissance">Date de Naissance :</label>
            <input type="date" name="DateDeNaissance" id="DateDeNaissance"> <br>
            <small id="dateNaissance_small"></small><br>
            
            <label for="fonction">Fonction :</label>
            <select id="fonction" name="fonction">
                <option value="" selected disabled>Choisissez une fonction</option>
                <optgroup label="Métiers de l'informatique">
                    <option value="developpeur">Développeur</option>
                    <option value="analyste">Analyste système</option>
                    <option value="administrateur">Administrateur réseau</option>
                </optgroup>
                <optgroup label="Métiers de la santé">
                    <option value="infirmier">Infirmier</option>
                    <option value="medecin">Médecin</option>
                    <option value="pharmacien">Pharmacien</option>
                </optgroup>
                <optgroup label="Métiers de l'éducation">
                    <option value="professeur">Professeur</option>
                    <option value="conseiller">Conseiller pédagogique</option>
                    <option value="bibliothecaire">Bibliothécaire</option>
                </optgroup>  
            </select> <br>
            
            <label for="Sujet">Sujet :</label>
            <input type="text" name="Sujet" placeholder="Entrez le sujet de votre mail"> <br>
            <small id="sujet_small"></small><br>
            
            <label for="Contenu">Contenu :</label>    
            <textarea name="Contenu" id="Contenu" placeholder="Taper ici votre mail" rows="4" cols="50"></textarea><br>
            <small id="contenu_small"></small><br>
            
            <input type="submit" value="Envoyer" class="Envoyer">
        </form>
    </div>
    
    <?php include 'php/footer.php'; ?>
    <script src="js/form.js"></script>
</body>
</html>
