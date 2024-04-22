/* document.addEventListener('DOMContentLoaded', function() {
    // Au chargement de la page, masquer tous les stocks
    var stocks = document.querySelectorAll('.stock');
    stocks.forEach(function(stock) {
        stock.style.display = 'none';
    });

    var buttonStock = document.querySelector('.stock_button');
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
 */

document.addEventListener('DOMContentLoaded', function() {
    // Récupérer le bouton d'affichage du stock
    var afficherStockButton = document.getElementsByClassName('stock_button');
    
    // Ajouter un gestionnaire d'événements au bouton
    afficherStockButton.addEventListener('click', function() {
        // Récupérer la taille sélectionnée par l'utilisateur
        var selectTaille = document.getElementsByName('select_taille');
        var tailleSelectionnee = selectTaille.value;
        
        // Envoyer la taille sélectionnée au serveur pour récupérer le stock
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'traitement.php?taille=' + encodeURIComponent(tailleSelectionnee), true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Mettre à jour l'interface avec le stock récupéré
                var stockContainer = document.getElementById('stockContainer');
                stockContainer.innerHTML = xhr.responseText;
            } else {
                console.error('La requête AJAX a échoué');
            }
        };
        xhr.send();
    });
});
