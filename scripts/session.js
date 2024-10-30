var idleTimeout = 300000; // 5 minutes en millisecondes
var lastActivity = Date.now();

function resetTimer() {
    lastActivity = Date.now();
}

function checkIdleTimeout() {
    var currentTime = Date.now();
    if (currentTime - lastActivity > idleTimeout) {
        // L'utilisateur est inactif depuis trop longtemps, déconnectez-le
        window.location.href = '../controller/deconnexion.php';
    } else {
        // Réinitialiser le timer
        resetTimer();
    }
}

// Sur toute activité de l'utilisateur (click, mousemove, keypress, etc.)
window.addEventListener('mousemove', resetTimer);
window.addEventListener('keypress', resetTimer);

// Vérifier régulièrement l'inactivité
setInterval(checkIdleTimeout, 60000); // Vérifier toutes les minutes