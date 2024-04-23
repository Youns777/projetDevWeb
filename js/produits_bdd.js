document.addEventListener('DOMContentLoaded', function() {
    // Récupérer tous les éléments avec la classe "stock"
    var stocks = document.querySelectorAll('.stock');

    // Parcourir tous les éléments avec la classe "stock" et les masquer
    stocks.forEach(function(stock) {
        stock.style.display = 'none';
    });

    var buttonStock = document.querySelector('.afficher_stock');
    var stock_visible = false; // Pour garder une trace de l'état actuel du stock

    // Ajouter un écouteur d'événements sur le bouton stock
    buttonStock.addEventListener('click', function(event) {
        event.preventDefault(); // Empêcher le comportement par défaut du lien
        
        // Si le stock est visible, le cacher
        if (stock_visible) {
            stocks.forEach(function(stock) {
                stock.style.display = 'none';
            });
            buttonStock.textContent = "Afficher stock";
            stock_visible = false;
        } else {
            // Sinon, afficher le stock
            stocks.forEach(function(stock) {
                stock.style.display = 'block';
            });
            buttonStock.textContent = "Cacher stock";
            stock_visible = true;
        }
    });
});

/* document.addEventListener('DOMContentLoaded', function() {
    // Récupérer tous les éléments avec la classe "stock"
    var stocks = document.querySelectorAll('.stock');

    // Parcourir tous les éléments avec la classe "stock" et les masquer
    stocks.forEach(function(stock) {
        stock.style.display = 'none';
    });

    // Récupérer le bouton "stock_button"
    var buttonStock = document.querySelector('.stock_button');
    var stock_visible = false; // Garder une trace de l'état actuel du stock

    // Ajouter un gestionnaire d'événements au changement de la taille sélectionnée
    var selectTaille = document.querySelector('select[name="select_taille"]');
    selectTaille.addEventListener('change', function() {
        // Récupérer la taille sélectionnée par l'utilisateur
        var tailleSelectionnee = selectTaille.value;

        // Appeler une fonction pour récupérer le stock côté serveur
        recupererStock(tailleSelectionnee);
    });

    // Fonction pour récupérer le stock côté serveur
    function recupererStock(tailleSelectionnee) {
        // Créer une requête AJAX pour récupérer le stock correspondant à la taille sélectionnée

        // Assurez-vous de récupérer la catégorie actuelle ici
        var categorieActuelle = "Homme"; // Vous pouvez la changer dynamiquement en fonction de la catégorie sélectionnée
        var url = 'http://localhost/projetDevWeb/php/produits_bdd.php?cat=' + encodeURIComponent(categorieActuelle) + '&tailleSelectionnee=' + encodeURIComponent(tailleSelectionnee);

        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Gérer la réponse ici si nécessaire
                console.log(xhr.responseText);
            } else {
                console.error('La requête AJAX a échoué');
            }
        };

        // Envoyer la requête
        xhr.send();
    }

    // Ajouter un gestionnaire d'événements pour le bouton "stock_button"
    buttonStock.addEventListener('click', function(event) {
        event.preventDefault(); // Empêcher le comportement par défaut du lien

        // Afficher ou masquer les éléments "stock" en fonction de leur état actuel
        stocks.forEach(function(stock) {
            if (stock_visible) {
                stock.style.display = 'none';
                buttonStock.textContent = "Afficher stock";
            } else {
                stock.style.display = 'block';
                buttonStock.textContent = "Cacher stock";
            }
        });

        // Inverser l'état de visibilité du stock
        stock_visible = !stock_visible;
    });
});
 */ 