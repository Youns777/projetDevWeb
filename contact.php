<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="normalize.css">
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
            <label for="DateDuContact">Date du contact :</label>
            <input type="date" name="DateDuContact" id="DateDuContact"> <br>
            
            <label for="nom">Nom :</label>    
            <input type="text" name="nom"  placeholder="Entrez votre Nom"/>
            <span id="nom_icon" class="validation-icon">✓</span>
            <br>
            <small id="nom_small"></small>
            
            <label for="prenom">Prénom :</label>    
            <input type="text" name="prenom" placeholder="Entrez votre Prenom">
            <span id="prenom_icon" class="validation-icon">✓</span>
            <br>
            <small id="prenom_small"></small>

            
            <label for="email">Email :</label>    
            <input type="text" name="email" placeholder="monmail@monsite.org"> 
            <span id="email_icon" class="validation-icon">✓</span>
            <br>
            <small id="email_small"></small>
            
        
            <div class="genre_radio">
                <label for="genre" class="genre" > Genre: </label>
                <input type="radio" name="genre" value="Homme"/> Homme
                <input type="radio" name="genre" value="Femme"/> Femme <br>
                <br><small id="genre_small"></small>
            </div>
            
            <label for="DateDeNaissance">Date de Naissance :</label>
            <input type="date" name="DateDeNaissance" id="DateDeNaissance">
            <span id="dateNaissance_icon" class="validation-icon">✓</span>
            <br>
            <small id="dateNaissance_small"></small>
            
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
            <input type="text" name="Sujet" placeholder="Entrez le sujet de votre mail">
            <span id="sujet_icon" class="validation-icon">✓</span>
            <br>
            <small id="sujet_small"></small>
            
            <label for="Contenu">Contenu :</label>    
            <textarea name="Contenu" id="Contenu" placeholder="Taper ici votre mail" rows="4" cols="50"></textarea>
            <span id="contenu_icon" class="validation-icon">✓</span>
            <br>
            <small id="contenu_small"></small><br>
            
            <input type="submit" value="Envoyer" class="Envoyer">
        </form>
    </div>
    
    <?php include 'php/footer.php'; ?>
    <script src="js/form.js"></script>
</body>
</html>
