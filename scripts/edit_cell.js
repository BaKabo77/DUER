const cells = document.querySelectorAll('.cell');

cells.forEach(cell => cell.addEventListener('click', toggleEdit));

function toggleEdit(){
    const input = this.querySelector('input');
    if (input.disabled) {
        input.disabled = false;
        input.focus(); // Focus sur l'input pour permettre à l'utilisateur de commencer à éditer immédiatement
    } else {
        input.disabled = true;
    }
}