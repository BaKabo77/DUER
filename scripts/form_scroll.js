const pages = document.querySelectorAll(".pg");
const pg1 = document.querySelector('.pg-1');
const pg2 = document.querySelector('.pg-2');
const pg3 = document.querySelector('.pg-3');
const pg4 = document.querySelector('.pg-4');

const nextBtn = document.querySelector('#next');
const backBtn = document.querySelector('#back');
toggleBackHomeListener();
let count = 0;

nextBtn.addEventListener('click', switchNextPage);
backBtn.addEventListener('click', switchBackPage);

function toggleBackHomeListener() {
    if (backBtn.textContent === "🡰 Retour à l'accueil" && backBtn.classList.contains("active")) {
        backBtn.addEventListener('click', backHome);
    } else {
        backBtn.removeEventListener('click', backHome);
    }
}

function backHome(e) {
    e.preventDefault();
    fetch('check_session.php')
        .then(response => response.json())
        .then(data => {
            if (data.loggedin && data.role) {
                window.location.href = '../view/vue_utilisateur.php';
            } else {
                window.location.href = '../index.php';
            }
        })
        .catch(error => {
            console.error('Error checking session:', error);
            // Rediriger vers index.php en cas d'erreur
            window.location.href = '../index.php';
        });
}

function switchNextPage(e) {

    e.preventDefault();

    if (count >= 0 && count < 3) {
        pages[count].classList.remove("pg-selected");
        pgVisibility(count, 'hidden');
        count++;

        if (count == 3) {
            nextBtn.textContent = "Terminer ✔";
            backBtn.textContent = "🡰 Précédent";
            backBtn.classList.remove('active');
        } else {
            nextBtn.textContent = "Suivant 🡲";
            backBtn.textContent = "🡰 Précédent";
            backBtn.classList.remove('active');
        }

        pages[count].classList.add("pg-selected");
        pgVisibility(count, 'visible');
    }

    toggleBackHomeListener();
}

function switchBackPage(e) {
   e.preventDefault();

    if (count > 0) {
        pages[count].classList.remove("pg-selected");
        pgVisibility(count, 'hidden');
        count--;

        if (count == 0) {
            backBtn.textContent = "🡰 Retour à l'accueil";
            backBtn.classList.add('active');
            nextBtn.textContent = "Suivant 🡲";
        } else {
            backBtn.textContent = "🡰 Précédent";
            backBtn.classList.remove('active');
            nextBtn.textContent = "Suivant 🡲";
        }

        pages[count].classList.add("pg-selected");
        pgVisibility(count, 'visible');
        
    }

    toggleBackHomeListener();
}

function pgVisibility(index, visibility) {
    switch (index) {
        case 0:
            pg1.classList.remove('visible', 'hidden');
            pg1.classList.add(visibility);
            break;
        case 1:
            pg2.classList.remove('visible', 'hidden');
            pg2.classList.add(visibility);
            break;
        case 2:
            pg3.classList.remove('visible', 'hidden');
            pg3.classList.add(visibility);
            break;
        case 3:
            pg4.classList.remove('visible', 'hidden');
            pg4.classList.add(visibility);
            break;
        default:
            break;
    }
}




