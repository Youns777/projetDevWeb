// Créez un effet de zoom sur les images de chaussures :

// Sélectionnez toutes les images zoomables
var images = document.querySelectorAll('.chaussure img, .produit img, .produit > img');

// Pour chaque image
for (var i = 0; i < images.length; i++) {
  // Ajoutez un gestionnaire d'événements mouseover
  images[i].addEventListener('mouseover', function(event) {
    // Réinitialisez le z-index de toutes les images
    for (var j = 0; j < images.length; j++) {
      images[j].style.zIndex = 'auto';
    }

    // Augmentez la taille de l'image
    event.target.style.transform = 'scale(1.2)';
    // Mettez l'image au premier plan
    event.target.style.zIndex = '1000';
  });

  // Ajoutez un gestionnaire d'événements mouseout
  images[i].addEventListener('mouseout', function(event) {
    // Réduisez la taille de l'image à sa taille d'origine
    event.target.style.transform = 'scale(1)';
    // Réinitialisez le z-index
    event.target.style.zIndex = 'auto';
  });
}

/*Ouvre une fenêtre modale avec l'image zoomée :
- Cliquez sur une image pour ouvrir une fenêtre modale avec l'image zoomée.
- Cliquez hors de la fenêtre modale pour la fermer.*/

// Pour chaque image
for (var i = 0; i < images.length; i++) {
  // Ajoutez un gestionnaire d'événements click
  images[i].addEventListener('click', function(event) {
    // Créez une nouvelle div
    var zoomedImageDiv = document.createElement('div');
    zoomedImageDiv.style.position = 'fixed';
    zoomedImageDiv.style.left = '0';
    zoomedImageDiv.style.top = '0';
    zoomedImageDiv.style.width = '100%';
    zoomedImageDiv.style.height = '100%';
    zoomedImageDiv.style.backgroundColor = 'rgba(0, 0, 0, 0.8)';
    zoomedImageDiv.style.display = 'flex';
    zoomedImageDiv.style.justifyContent = 'center';
    zoomedImageDiv.style.alignItems = 'center';

    // Créez une nouvelle image
    var zoomedImage = document.createElement('img');
    zoomedImage.src = event.target.src;
    zoomedImage.style.transform = 'scale(2)';

    // Ajoutez l'image à la div
    zoomedImageDiv.appendChild(zoomedImage);

    // Créez un nouveau bouton de sortie
    var exitButton = document.createElement('button');
    exitButton.textContent = 'X';
    exitButton.style.position = 'absolute';
    exitButton.style.top = '20px';
    exitButton.style.right = '20px';
    exitButton.style.fontSize = '1.5em';
    exitButton.style.backgroundColor = 'transparent';
    exitButton.style.border = 'none';
    exitButton.style.color = 'white';

    // Lorsque le bouton de sortie est cliqué, supprimez la div de l'image zoomée de la page
    exitButton.addEventListener('click', function() {
      document.body.removeChild(zoomedImageDiv);
    });

    // Ajoutez le bouton de sortie à la div
    zoomedImageDiv.appendChild(exitButton);

    // Ajoutez la div à l'élément body de la page
    document.body.appendChild(zoomedImageDiv);
  });
}