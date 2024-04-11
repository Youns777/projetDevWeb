document.addEventListener('DOMContentLoaded', function() {
    // Au chargement de la page, masquer le formulaire de connexion
    document.querySelector('.form_inscription').style.display = 'none';

    var titreFormulaire = document.querySelector('.titreformulaire');
    
    // Ajouter un écouteur d'événements sur le lien de connexion
    document.querySelector('.button_connexion').addEventListener('click', function(event) {
        event.preventDefault(); // Empêcher le comportement par défaut du lien
        
        // Masquer le formulaire d'inscription
        document.querySelector('.form_inscription').style.display = 'none';
        // Afficher le formulaire de connexion
        document.querySelector('.form_connexion').style.display = 'block';

        titreFormulaire.textContent = "Vous revoilà !";

    });
    
    // Ajouter un écouteur d'événements sur le lien d'inscription
    document.querySelector('.button_inscription').addEventListener('click', function(event) {
        event.preventDefault(); // Empêcher le comportement par défaut du lien
        
        // Masquer le formulaire de connexion
        document.querySelector('.form_connexion').style.display = 'none';
        // Afficher le formulaire d'inscription
        document.querySelector('.form_inscription').style.display = 'block';

        titreFormulaire.textContent = "Bienvenue au royaume de la sneakers !";
    });
});