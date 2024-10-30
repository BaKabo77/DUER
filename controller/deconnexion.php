<?php

session_start();
session_destroy();
header("Location: ../index.php"); // Redirigez vers la page de connexion ou une autre page après la déconnexion
exit();

?>