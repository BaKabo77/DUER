<?php
session_start();


$mode=$_GET["mode"];
$id=$_GET["num"];

include __DIR__.'/../model/modele.php';
switch ($mode) {

	case 1:
        
            $etat = 'Valide';
            $nb_lignes=modifier_etat($etat,$id);
            if($nb_lignes > 0) 
			{
				header("Location:../view/vue_risques.php"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de la verification des données dans la base de donnee.";
				// redirection vers la page vue erreur
				header("Location:/DUER/erreur");
			}	
        break;

    case 2:

            $etat = 'Invalide';
            $nb_lignes=modifier_etat($etat,$id);
            if($nb_lignes > 0) 
			{
				header("Location:../view/vue_risques.php"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de la verification des données dans la base de donnee.";
				// redirection vers la page vue erreur
				header("Location:/DUER/erreur");
			};
        break;
	case 3:

			// Vérifier si l'utilisateur est connecté
			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
				// Détruire toutes les variables de session
				session_destroy();
				// Rediriger vers la page de connexion ou une autre page appropriée
				header('Location:../index.php');
				exit;
			} else {
				// L'utilisateur n'est pas connecté, gérer l'erreur ou afficher un message
				echo "Vous n'êtes pas connecté.";
			}
        break;

}

?>