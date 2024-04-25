document.addEventListener("DOMContentLoaded", function () {
    const stockButtons = document.querySelectorAll(".afficher_stock");
  
    stockButtons.forEach((button) => {
      button.addEventListener("click", function (event) {
        event.preventDefault(); // Empêche la soumission du formulaire
  
        const parentCell = button.closest("td");
        const stockDisplay = parentCell.querySelector(".stock");
        const tailleSelect = parentCell.querySelector("#tailleSelect");
        
        if(button.textContent === "Cacher Stock"){
            stockDisplay.innerHTML = "";
            button.textContent = "Afficher Stock";
        }
        else{
            // Utilisation d'Ajax pour récupérer les données de stock sans recharger la page
            
            fetch("produits_bdd.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: 
                "taille=" +
                tailleSelect.value +
                "&nom=" +
                parentCell.querySelector("h3").textContent.trim() +
                "&afficher_stock=true",
            })
            .then((response) => response.text())
            .then((stock) => {
                stockDisplay.innerHTML =
                '<p class="line_stock">Stock disponible : ' + stock + "</p>";
                button.textContent = "Cacher Stock";
                
            })
            .catch((error) => console.error("Error:", error));
        }
    });
    });
});