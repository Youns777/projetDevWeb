document.addEventListener('DOMContentLoaded', function() {
    // Au chargement de la page, masquer tous les stocks
    var stocks = document.querySelectorAll('.line_stock');
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
