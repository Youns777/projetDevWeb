// Sélection du formulaire
let form = document.querySelector("#inscription_form");

// Sélection des champs du formulaire
let nomInput = document.querySelector('input[name="nom"]');
let prenomInput = document.querySelector('input[name="prenom"]');
let emailInput = document.querySelector('input[name="email"]');
let dateNaissanceInput = document.querySelector('input[name="Date de Naissance"]');
let passwordInput = document.querySelector('input[name="password"]');
let adresseInput = document.querySelector('input[name="adresse"]');

// Ajout des écouteurs d'événements pour la validation des champs
nomInput.addEventListener('input', function() {
    validNom(this.value);
});

prenomInput.addEventListener('input', function() {
    validPrenom(this.value);
});

emailInput.addEventListener('input', function() {
    validEmail(this.value);
});

dateNaissanceInput.addEventListener('input', function() {
    validDateNaissance(this.value);
});

passwordInput.addEventListener('input', function() {
    validPassword(this.value);
});

adresseInput.addEventListener('input', function() {
    validAdresse(this.value);
});

// Fonction de validation de l'email
const validEmail = function(inputEmail) {
    let emailRegExp = new RegExp('^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$', 'i');
    let small = document.querySelector('#email_small');

    if (emailRegExp.test(inputEmail)) {
        small.innerHTML = '';
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

// Fonction de validation du nom
const validNom = function(inputNom) {
    let nomRegExp = new RegExp('^[A-Z][a-zA-Zéèê \-]+$', 'i');
    let small = document.querySelector('#nom_small');
    
    if (inputNom.trim() === '') {
        small.innerHTML = 'Veuillez entrer votre nom.';
        small.classList.remove('text-success');
        small.classList.add('text-danger');
        return false; // Validation échouée
    } else if (nomRegExp.test(inputNom)) {
        small.innerHTML = '';
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
        small.innerHTML = '';
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
        dateNaissanceSmall.innerHTML = '';
        dateNaissanceSmall.classList.remove('text-danger');
        dateNaissanceSmall.classList.add('text-success');
        return true;
    }
}

// Fonction de validation du mot de passe
const validPassword = function(inputPassword) {
    let passwordSmall = document.querySelector('#password_small');
    
    // Regex pour vérifier le format du mot de passe
    let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()])[A-Za-z\d!@#$%^&*()]{8,}$/;
    
    if (!passwordRegex.test(inputPassword)) {
        // Si le mot de passe ne correspond pas aux critères
        let errorMessage = "Le mot de passe doit respecter les critères suivants :<br>";
        errorMessage += "- Au moins 1 lettre majuscule et minuscule<br>";
        errorMessage += "- Au moins 1 chiffre<br>";
        errorMessage += "- Au moins 1 caractère spécial parmi !@#$%^&*()<br>";
        errorMessage += "- Au moins 8 caractères au total<br>";
        
        passwordSmall.innerHTML = errorMessage;
        passwordSmall.classList.remove('text-success');
        passwordSmall.classList.add('text-danger');
        return false;
    } else {
        passwordSmall.innerHTML = '';
        passwordSmall.classList.remove('text-danger');
        passwordSmall.classList.add('text-success');
        return true;
    }
}

// Fonction de validation de l'adresse
const validAdresse = function(inputAdresse) {
    let adresseSmall = document.querySelector('#adresse_small');
    
    // Regex pour vérifier le format de l'adresse
    let adresseRegex = /([0-9]*) ?([a-zA-Z,\. ]*) ?([0-9]{5}) ?([a-zA-Z]*)/;
    
    if (!adresseRegex.test(inputAdresse)) {
        adresseSmall.innerHTML = 'Veuillez entrer une adresse valide. <br> (N° + rue + CP + Ville)';
        adresseSmall.classList.remove('text-success');
        adresseSmall.classList.add('text-danger');
        return false;
    } else {
        adresseSmall.innerHTML = '';
        adresseSmall.classList.remove('text-danger');
        adresseSmall.classList.add('text-success');
        return true;
    }
}

// Gestionnaire d'événements pour la soumission du formulaire
form.addEventListener('submit', function(event) {
    event.preventDefault();

    // Vérification de tous les champs du formulaire
    let emailValide = validEmail(emailInput.value);
    let nomValide = validNom(nomInput.value);
    let prenomValide = validPrenom(prenomInput.value);
    let dateNaissanceValide = validDateNaissance(dateNaissanceInput.value);
    let passwordValide = validPassword(passwordInput.value);
    let adresseValide = validAdresse(adresseInput.value);

    // Si tous les champs sont valides, soumettre le formulaire
    if (emailValide && nomValide && prenomValide && dateNaissanceValide && passwordValide && adresseValide) {
        alert("Inscription effectué  !");
        form.submit();
    } else {
        alert("Veuillez remplir correctement tous les champs du formulaire.");
    }
});
