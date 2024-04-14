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
    let nomRegExp = new RegExp('^[A-Z][A-Za-zéèê\-]+$', 'i');
    let small = document.querySelector('#nom_small');
    
    if (inputNom.trim() === '') {
        small.innerHTML = 'Veuillez entrer votre nom.';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        return false; // Validation échouée
    } else if (nomRegExp.test(inputNom)) {
        small.innerHTML = 'Nom valide.';
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        return true; // Validation réussie
    } else {
        small.innerHTML = 'Nom non valide !';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        return false; // Validation échouée
    }
}

// Fonction de validation du prénom
const validPrenom = function(inputPrenom) {
    let prenomRegExp = new RegExp('^[A-Z][a-zA-Zéèê \-]+$', 'i');
    let small = document.querySelector('#prenom_small');

    if (inputPrenom.trim() === '') {
        small.innerHTML = 'Veuillez entrer votre prénom.';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        return false;
    } else if (prenomRegExp.test(inputPrenom)) {
        small.innerHTML = 'Prénom valide.';
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        return true;
    } else {
        small.innerHTML = 'Prénom non valide !';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        return false;
    }
}

// Fonction de validation de l'email
const validEmail = function(inputEmail) {
    let emailRegExp = new RegExp('^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$', 'i');
    let small = document.querySelector('#email_small');

    if (emailRegExp.test(inputEmail)) {
        small.innerHTML = 'Adresse mail valide.';
        small.classList.remove('text-danger');
        small.classList.add('text-success');
        return true;
    } else {
        small.innerHTML = 'Adresse mail non valide !';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        return false;
    }
};

// Fonction de validation du sujet
const validSujet = function(inputSujet) {
    let sujetSmall = document.querySelector('#sujet_small');
    if (inputSujet.trim() === '') {
        sujetSmall.innerHTML = 'Veuillez entrer un sujet.';
        sujetSmall.classList.remove('text-success');
        sujetSmall.classList.add('text-danger');
        return false;
    } else if (inputSujet.length > 80) {
        sujetSmall.innerHTML = 'Le sujet doit contenir moins de 80 caractères.';
        sujetSmall.classList.remove('text-success');
        sujetSmall.classList.add('text-danger');
        return false;
    } else {
        sujetSmall.innerHTML = 'Sujet valide.';
        sujetSmall.classList.remove('text-danger');
        sujetSmall.classList.add('text-success');
        return true;
    }
}

// Fonction de validation du genre
const validGenre = function() {
    let genreInputs = document.querySelectorAll('input[name="genre"]');
    let genreSmall = document.querySelector('#genre_small');
    let genreChecked = false;
    genreInputs.forEach(function(input) {
        if (input.checked) {
            genreChecked = true;
        }
    });
    if (!genreChecked) {
        genreSmall.innerHTML = 'Veuillez sélectionner un genre.';
        genreSmall.classList.remove('text-success');
        genreSmall.classList.add('text-danger');
        return false;
    } else {
        genreSmall.innerHTML = '';
        genreSmall.classList.remove('text-danger');
        genreSmall.classList.add('text-success');
        return true;
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
    let contenuSmall = document.querySelector('#contenu_small');
    let mots = Compter(inputContenu);
    if (inputContenu.trim() === '') {
        contenuSmall.innerHTML = 'Veuillez entrer un contenu.';
        contenuSmall.classList.remove('text-success');
        contenuSmall.classList.add('text-danger');
        return false;
    } else if (mots > 200) {
        contenuSmall.innerHTML = 'Le contenu doit contenir moins de 200 mots.';
        contenuSmall.classList.remove('text-success');
        contenuSmall.classList.add('text-danger');
        return false;
    } else {
        contenuSmall.innerHTML = 'Contenu valide.';
        contenuSmall.classList.remove('text-danger');
        contenuSmall.classList.add('text-success');
        return true;
    }
}

// Fonction de validation de la date de naissance
const validDateNaissance = function(inputDate) {
    let dateNaissanceSmall = document.querySelector('#dateNaissance_small');
    let dateNaissance = new Date(inputDate);
    let currentDate = new Date();
    if (isNaN(dateNaissance.getTime())) {
        dateNaissanceSmall.innerHTML = 'Veuillez entrer une date de naissance valide.';
        dateNaissanceSmall.classList.remove('text-success');
        dateNaissanceSmall.classList.add('text-danger');
        return false;
    } else if (dateNaissance >= currentDate) {
        dateNaissanceSmall.innerHTML = 'La date de naissance doit être antérieure à la date actuelle.';
        dateNaissanceSmall.classList.remove('text-success');
        dateNaissanceSmall.classList.add('text-danger');
        return false;
    } else {
        dateNaissanceSmall.innerHTML = 'Date de naissance valide.';
        dateNaissanceSmall.classList.remove('text-danger');
        dateNaissanceSmall.classList.add('text-success');
        return true;
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
