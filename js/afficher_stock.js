// Sélectionnez tous les boutons "Voir stock"
var buttons = document.querySelectorAll('.voirstocktaille');

// Ajoutez un gestionnaire d'événement de clic à chaque bouton
buttons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Récupérez l'ID du produit
        var productId = this.id.split('-')[2];

        // Récupérez le menu déroulant correspondant
        var select = document.getElementById('taille-' + productId);

        // Récupérez l'élément de stock correspondant
        var stockElement = document.getElementById('stock-' + productId);

        // Mettez à jour l'élément de stock avec le stock de l'option sélectionnée
        updateStock(select, stockElement, button);
    });
});

// Sélectionnez tous les menus déroulants de taille
var selects = document.querySelectorAll('select[name="taille"]');

// Ajoutez un gestionnaire d'événement de changement à chaque menu déroulant
selects.forEach(function(select) {
    select.addEventListener('change', function() {
        // Récupérez l'ID du produit
        var productId = this.id.split('-')[1];

        // Récupérez le bouton "Voir stock" correspondant
        var button = document.getElementById('voir-stock-' + productId);

        // Récupérez l'élément de stock correspondant
        var stockElement = document.getElementById('stock-' + productId);

        // Mettez à jour l'élément de stock avec le stock de l'option sélectionnée
        if (button.textContent === 'Cacher stock par taille') {
            updateStock(select, stockElement, button);
        }
    });
});

function updateStock(select, stockElement, button) {
    // Récupérez l'option sélectionnée
    var option = select.options[select.selectedIndex];

    // Récupérez le stock de l'option sélectionnée
    var stock = option.getAttribute('data-stock');

    // Mettez à jour l'élément de stock avec le stock de l'option sélectionnée
    if (button.textContent === 'Voir stock par taille') {
        stockElement.textContent = 'Stock: ' + stock;
        button.textContent = 'Cacher stock par taille';
    } else {
        stockElement.textContent = '';
        button.textContent = 'Voir stock par taille';
    }
}