const regexNom = /^(?=.*[A-ZÀ-ÖØ-Ý])[A-ZÀ-ÖØ-Ý][A-ZÀ-ÖØ-Ý]*(-[A-ZÀ-ÖØ-Ý][A-ZÀ-ÖØ-Ý]*)*$/;
const regexPrenom = /^[A-ZÀ-ÖØ-Ý][A-Za-zÀ-ÖØ-öø-ÿ]*(-[A-ZÀ-ÖØ-Ý][A-Za-zÀ-ÖØ-öø-ÿ]*)*$/;
const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const regexText = /^[A-Za-zÀ-ÖØ-öø-ÿ][a-zA-ZÀ-ÖØ-öø-ÿ\s]+$/;

const input_nom = document.querySelector('#nom');
const input_prenom = document.querySelector('#prenom');
const input_email = document.querySelector('#email');
const select_salle = document.querySelector('#salle');
const input_lieu = document.querySelector('#lieu');
const input_situation = document.querySelector('#situation');
const select_famille = document.querySelector('#famille');
const myform = document.querySelector('form[name="myform"]');

var personnel_en = document.getElementsByName('tous_les_personnels_en');
var attee = document.getElementsByName('tous_les_ATTEE');
var eleves = document.getElementsByName('tous_les_eleves');
var blessures = document.getElementsByName('blessures');
var maladies = document.getElementsByName('maladies');
var pen_phy = document.getElementsByName('penibilite_physique');
var pen_men = document.getElementsByName('penibilite_mentale');
var probabilite = document.getElementsByName('probabilite');
var complexite = document.getElementsByName('complexite_de_resolution');
var solution = document.getElementsByName('solution_onereuse');

input_nom.addEventListener('input', verifNom);
input_prenom.addEventListener('input', verifPrenom);
input_email.addEventListener('input', verifEmail);
select_salle.addEventListener('change', verifSalle);
input_lieu.addEventListener('input', verifLieu);
input_situation.addEventListener('input', verifSituation);
select_famille.addEventListener('change', verifFamille);

function verifNom() {
    const nomValide = regexNom.test(input_nom.value.trim());

    if (input_nom.value.trim() === '') {
        return false;
    } else if (!nomValide) {
        stateSwitch('nom', 'error-input');
        return false;
    } else {
        stateSwitch('nom', 'valid-input');
        return true;
    }
}

function verifPrenom() {

    const prenomValide = regexPrenom.test(input_prenom.value.trim());


    if (input_prenom.value.trim() === '') {
        return false;
    } else if (!prenomValide) {
        stateSwitch('prenom', 'error-input');
        return false;
    } else {
        stateSwitch('prenom', 'valid-input');
        return true;
    }
}

function verifEmail() {

    const emailValide = regexEmail.test(input_email.value.trim());

    if (input_email.value.trim() === '') {
        return false;
    } else if (!emailValide) {
        stateSwitch('email', 'error-input');
        return false;
    } else {
        stateSwitch('email', 'valid-input');
        return true;
    }
}

function verifSalle() {

    const salleValide = select_salle.value !== 'Choisir...';

    if (!salleValide) {
        stateSwitch('salle', 'error-input');
        return false;
    } else {
        stateSwitch('salle', 'valid-input');
        return true;
    }
}

function verifLieu() {

    const lieuValide = regexText.test(input_lieu.value.trim());

    if (input_lieu.value.trim() === '') {
        return false;
    } else if (!lieuValide) {
        stateSwitch('lieu', 'error-input');
        return false;
    } else {
        stateSwitch('lieu', 'valid-input');
        return true;
    }
}

function verifSituation() {

    const situationValide = regexText.test(input_situation.value.trim());

    if (input_situation.value.trim() === '') {
        return false;
    } else if (!situationValide) {
        stateSwitch('situation', 'error-input');
        return false;
    } else {
        stateSwitch('situation', 'valid-input');
        return true;
    }
}

function verifFamille() {

    const familleValide = select_famille.value !== 'Choisir...';

    if (!familleValide) {
        stateSwitch('famille', 'error-input');
        return false;
    } else {
        stateSwitch('famille', 'valid-input');
        return true;
    }
}

function verifRadios() {
    var val_personnel_en = null;
    var val_attee = null;
    var val_eleves = null;
    var val_blessures = null;
    var val_maladies = null;
    var val_pen_phy = null;
    var val_pen_men = null;
    var val_probabilite = null;
    var val_complexite = null;
    var val_solution = null;

    for (var i = 0; i < personnel_en.length; i++) {
        if (personnel_en[i].checked) {
            val_personnel_en = personnel_en[i].value;
            break;
        }
    }
    for (var i = 0; i < attee.length; i++) {
        if (attee[i].checked) {
            val_attee = attee[i].value;
            break;
        }
    }
    for (var i = 0; i < eleves.length; i++) {
        if (eleves[i].checked) {
            val_eleves = eleves[i].value;
            break;
        }
    }
    for (var i = 0; i < blessures.length; i++) {
        if (blessures[i].checked) {
            val_blessures = blessures[i].value;
            break;
        }
    }
    for (var i = 0; i < maladies.length; i++) {
        if (maladies[i].checked) {
            val_maladies = maladies[i].value;
            break;
        }
    }
    for (var i = 0; i < pen_phy.length; i++) {
        if (pen_phy[i].checked) {
            val_pen_phy = pen_phy[i].value;
            break;
        }
    }
    for (var i = 0; i < pen_men.length; i++) {
        if (pen_men[i].checked) {
            val_pen_men = pen_men[i].value;
            break;
        }
    }
    for (var i = 0; i < probabilite.length; i++) {
        if (probabilite[i].checked) {
            val_probabilite = probabilite[i].value;
            break;
        }
    }
    for (var i = 0; i < complexite.length; i++) {
        if (complexite[i].checked) {
            val_complexite = complexite[i].value;
            break;
        }
    }
    for (var i = 0; i < solution.length; i++) {
        if (solution[i].checked) {
            val_solution = solution[i].value;
            break;
        }
    }

    if(val_personnel_en != null
        && val_attee != null
        && val_eleves != null
        && val_blessures != null
        && val_maladies != null
        && val_pen_phy != null
        && val_pen_men != null
        && val_probabilite != null
        && val_complexite != null
        && val_solution != null) {
            return true;
        } else {
            return false;
        }
}

function verifForm() {
    if (verifNom() && verifPrenom() && verifEmail() && verifSalle() && verifFamille() && verifSituation() && verifLieu() && verifRadios())
    {
        return true;
    } else {
        return false;
    }
}

let formSubmitted = false;

nextBtn.addEventListener('click', function(event) {
    if (nextBtn.textContent == 'Suivant 🡲') {
        nextBtn.removeAttribute('type');
    } else if (nextBtn.textContent == 'Terminer ✔') {
        if (!verifForm()) {
            event.preventDefault();
        } else {
            nextBtn.setAttribute('type', 'submit');
            if (formSubmitted) {
                submitForm(myform);
            }
        }
    }
});

myform.addEventListener('submit', function(event) {
    if (!formSubmitted) {
        event.preventDefault(); // Empêche la soumission automatique si le formulaire n'est pas prêt
    }
});

nextBtn.addEventListener('mousedown', function(event) {
    if (nextBtn.textContent === 'Terminer ✔') {
        formSubmitted = true;
    }
});


function submitForm(frm) {
    HTMLFormElement.prototype.submit.call(frm);
}

function stateSwitch(index, state) {
    switch (index) {
        case 'nom':
            input_nom.classList.remove('valid-input', 'error-input');
            input_nom.classList.add(state);
            break;
        case 'prenom':
            input_prenom.classList.remove('valid-input', 'error-input');
            input_prenom.classList.add(state);
            break;
        case 'email':
            input_email.classList.remove('valid-input', 'error-input');
            input_email.classList.add(state);
            break;
        case 'salle':
            select_salle.classList.remove('valid-input', 'error-input');
            select_salle.classList.add(state);
            break;
        case 'lieu':
            input_lieu.classList.remove('valid-input', 'error-input');
            input_lieu.classList.add(state);
            break;
        case 'situation':
            input_situation.classList.remove('valid-input', 'error-input');
            input_situation.classList.add(state);
            break;
        case 'famille':
            select_famille.classList.remove('valid-input', 'error-input');
            select_famille.classList.add(state);
            break;
        default:
            break;
    }
}