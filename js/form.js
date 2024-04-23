// Sélection du formulaire
let form = document.querySelector("#contactForm");

// Sélection des champs du formulaire
let nomInput = document.querySelector('input[name="nom"]');
let prenomInput = document.querySelector('input[name="prenom"]');
let emailInput = document.querySelector('input[name="email"]');
let sujetInput = document.querySelector('input[name="Sujet"]');
let genreInputs = document.querySelectorAll('input[name="genre"]');
let contenuInput = document.querySelector('textarea[name="Contenu"]');
let dateNaissanceInput = document.querySelector('input[name="DateDeNaissance"]');

// Ajout des écouteurs d'événements
nomInput.addEventListener('input', function() {
    validNom(this.value);
});

prenomInput.addEventListener('input', function() {
    validPrenom(this.value);
});

emailInput.addEventListener('input', function() {
    validEmail(this.value);
});

sujetInput.addEventListener('input', function() {
    validSujet(this.value);
});

genreInputs.forEach(function(input) {
    input.addEventListener('input', function() {
        validGenre();
    });
});

contenuInput.addEventListener('input', function() {
    validContenu(this.value);
});

dateNaissanceInput.addEventListener('input', function() {
    validDateNaissance(this.value);
});

// Fonction de validation du nom
const validNom = function(inputNom) {
    let nomRegExp = new RegExp('^[A-Z][a-zA-Zéèê \-]+$', 'i');
    let small = document.querySelector('#nom_small');
    let icon = document.querySelector('#nom_icon');
    
    if (inputNom.trim() === '') {
        small.innerHTML = 'Veuillez entrer votre nom.';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        icon.style.display = 'none';
        return false; // Validation échouée
    } else if (nomRegExp.test(inputNom)) {
        small.innerHTML = ''; // Effacer le contenu
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        icon.style.display = 'inline'; 
        return true; // Validation réussie
    } else {
        small.innerHTML = 'Nom non valide !';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        icon.style.display = 'none'; 
        return false; // Validation échouée
    }
}

// Fonction de validation du prénom
const validPrenom = function(inputPrenom) {
    let prenomRegExp = new RegExp('^[A-Z][a-zA-Zéèê \-]+$', 'i');
    let small = document.querySelector('#prenom_small');
    let icon = document.querySelector('#prenom_icon');

    if (inputPrenom.trim() === '') {
        small.innerHTML = 'Veuillez entrer votre Prénom.';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        icon.style.display = 'none';
        return false; // Validation échouée
    } else if (prenomRegExp.test(inputPrenom)) {
        small.innerHTML = ''; 
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        icon.style.display = 'inline'; 
        return true; 
    } else {
        small.innerHTML = 'Prenom non valide !';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        icon.style.display = 'none';
        return false;
    }
}

// Fonction de validation de l'email
const validEmail = function(inputEmail) {
    let emailRegExp = new RegExp('^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$', 'i');
    let small = document.querySelector('#email_small');
    let icon = document.querySelector('#email_icon');

    if (emailRegExp.test(inputEmail)) {
        small.innerHTML = ''; // Effacer le contenu
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        icon.style.display = 'inline'; 
        return true; // Validation réussie
    } else {
        small.innerHTML = 'Adresse mail non valide !';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        icon.style.display = 'none';
        return false;
    }
};

// Fonction de validation du sujet
const validSujet = function(inputSujet) {
    let small = document.querySelector('#sujet_small');
    let icon = document.querySelector('#sujet_icon');
    if (inputSujet.trim() === '') {
        small.innerHTML = 'Veuillez entrer votre sujet.';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        icon.style.display = 'none';
        return false; // Validation échouée
    } else if (inputSujet.length > 80) {
        small.innerHTML = 'Le sujet doit contenir moins de 80 caractéres !';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        icon.style.display = 'none';
        return false;
    } else {
        small.innerHTML = ''; // Effacer le contenu
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        icon.style.display = 'inline'; 
        return true; // Validation réussie
    }
}

// Fonction de validation du genre
const validGenre = function() {
    let small = document.querySelector('#genre_small');
    let icon = document.querySelector('#genre_icon');
    let genreInputs = document.querySelectorAll('input[name="genre"]');
    let genreChecked = false;
    genreInputs.forEach(function(input) {
        if (input.checked) {
            genreChecked = true;
        }
    });
    if (!genreChecked) {
        small.innerHTML = 'Veuillez sélectionner un genre.';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        icon.style.display = 'none';
        return false; // Validation échouée
    } else {
        small.innerHTML = ''; // Effacer le contenu
        small.classList.remove('text-danger');
        small.classList.add('text-success');; 
        return true; // Validation réussie
    }
}

// Fonction pour compter les mots dans une chaîne
function Compter(chaine) {
    var exp = new RegExp("[a-zA-Z0-9éèêëàáâäóòôöíìîïçÉÈÊËÀÁÂÄÒÓÔÖÌÍÎÏÇ-]+", "g");
    var tabMots = chaine.match(exp);
    return tabMots ? tabMots.length : 0;
}

// Fonction de validation du contenu
const validContenu = function(inputContenu) {
    let small = document.querySelector('#contenu_small');
    let icon = document.querySelector('#contenu_icon');
    let mots = Compter(inputContenu);
    if (inputContenu.trim() === '') {
        small.innerHTML = 'Veuillez sélectionner un contenu.';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        icon.style.display = 'none';
        return false;
    } else if (mots > 200) {
        small.innerHTML = 'Le contenu doit contenir moins de 200 mots.';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        icon.style.display = 'none';
        return false;
    } else {
        small.innerHTML = ''; 
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        icon.style.display = 'inline'; 
        return true; 
    }
}

// Fonction de validation de la date de naissance
const validDateNaissance = function(inputDate) {
    let small = document.querySelector('#dateNaissance_small');
    let icon = document.querySelector('#dateNaissance_icon');
    let dateNaissance = new Date(inputDate);
    let currentDate = new Date();
    if (isNaN(dateNaissance.getTime())) {
        small.innerHTML = 'Veuillez entrer une date de naissance.';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        icon.style.display = 'none';
        return false;
    } else if (dateNaissance >= currentDate) {
        small.innerHTML = 'La date de naissance doit être antérieure à la date actuelle.';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        icon.style.display = 'none';
        return false;
    } else {
        small.innerHTML = '';
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        icon.style.display = 'inline'; 
        return true; // Validation réussie
    }
}

// Écouteur d'événement pour la soumission du formulaire
form.addEventListener('submit', function(event) {
    event.preventDefault();

    let nomValide = validNom(form.nom.value);
    let prenomValide = validPrenom(form.prenom.value);
    let emailValide = validEmail(form.email.value);
    let sujetValide = validSujet(form.Sujet.value);
    let genreValide = validGenre();
    let contenuValide = validContenu(form.Contenu.value);
    let dateNaissanceValide = validDateNaissance(form.DateDeNaissance.value);

    if (nomValide && prenomValide && emailValide && sujetValide && genreValide && contenuValide && dateNaissanceValide) {
        alert("Formulaire envoyé !");
        form.submit();
    } else {
        alert("Veuillez remplir correctement tous les champs du formulaire.");
    }
});
