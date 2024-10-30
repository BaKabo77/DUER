<?php
$mode=$_POST["mode"];

include __DIR__.'/../model/modele.php';

switch ($mode) {

	case 1:
		$id=$_POST['Id_Unite_de_travail'];
		$salle=$_POST['salle'];

		if(empty($salle) )
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location:/DUER/erreur");
			exit(); // interruption après redirection
		}
		else // sinon effectuer les mise à jour
		{
			$nb_lignes=inserer_unite_de_travail($id, $salle);
			// on a modifier 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:/DUER/unite"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de la mise à jour des données du formulaire.";
				// redirection vers la page vue erreur
				header("Location:/DUER/erreur");
			}	
		}    
        break;
	
		$id=$_POST['Id_solution_de_la_situation'];
		$complexite=$_POST['complexite_de_resolution'];
		$solution_onereuse=$_POST['solution_onereuse'];
		
		if(empty($complexite) && empty($solution_onereuse) )
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location:/DUER/erreur");
			exit(); // interruption après redirection
		}
		else // sinon effectuer les mise à jour
		{
			$nb_lignes=modifier_solution_de_la_situation($complexite, $solution_onereuse, $id);
			// on a modifier 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../view/vue_resolution_de_la_situation"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de la mise à jour des données du formulaire.";
				// redirection vers la page vue erreur
				header("Location:/DUER/erreur");
			}	
		}    
		
		break;


		$id=$_POST['Id_Probabilite'];
		$probabilite=$_POST['probabilite'];
	
		if(empty($probabilite))
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location:/DUER/erreur");
			exit(); // interruption après redirection
		}
		else // sinon effectuer les mise à jour
		{
			$nb_lignes=modifier_probabilite($probabilite, $id);
			// on a modifier 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:../view/vue_probabilite.php"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de la mise à jour des données du formulaire.";
				// redirection vers la page vue erreur
				header("Location:/DUER/erreur");
			}	
		}    
		break;

	case 4: //Personnes exposees
		$id=$_POST['Id_personne_exposees'];
		$personnels=$_POST['tous_les_personnels_EN'];
		$atte=$_POST['tous_les_ATTEE'];
		$eleves=$_POST['tous_les_eleves'];
		
		
		if(empty($personnels) && empty($atte) && empty($eleves))
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location:/DUER/erreur");
			exit(); // interruption après redirection
		}
		else // sinon effectuer les mise à jour
		{
			$nb_lignes=modifier_personne_exposees($personnels, $atte, $eleves, $id);
			// on a modifier 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:/DUER/exposition"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de la mise à jour des données du formulaire.";
				// redirection vers la page vue erreur
				header("Location:/DUER/erreur");
			}	
		}  
		break;
	case 6: // Famille de risque
		$id=$_POST['Id_Famille_de_risque'];
		$famille=$_POST['famille'];
		
		if(empty($famille) )
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location:/DUER/erreur");
			exit(); // interruption après redirection
		}
		else // sinon effectuer les mise à jour
		{
			$nb_lignes=inserer_famille_de_risque($id, $famille);
			// on a modifier 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:/DUER/famille-de-risque"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de la mise à jour des données du formulaire.";
				// redirection vers la page vue erreur
				header("Location:/DUER/erreur");
			}	
		}   
		break;

	case 7: // Image
		$id=$_POST['Id_Famille_de_risque'];
		$famille=$_POST['famille'];
		
		if(empty($famille) )
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location:/DUER/erreur");
			exit(); // interruption après redirection
		}
		else // sinon effectuer les mise à jour
		{
			$nb_lignes=modifier_famille_de_risque($famille, $id);
			// on a modifier 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:/DUER/famille-de-risque"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de la mise à jour des données du formulaire.";
				// redirection vers la page vue erreur
				header("Location:/DUER/erreur");
			}	
		}   
		break;

	
	case 8:
		$Id_Risques=$_POST['Id_Risques'];
		$Id_Utilisateur = $_POST['Id_Utilisateur'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mail = $_POST['email'];
		$Id_salle = $_POST['Id_Unite_de_travail'];
		$salle = $_POST['salle'];
		$Id_Localisation = $_POST['Id_Localisation'];
		$emplacement_precis = $_POST['emplacement_precis'];
		$Id_Situation_dangereuse = $_POST['Id_Situation_dangereuse'];
		$precis = $_POST['precis'];
		$Id_Famille_de_risque = $_POST['Id_Famille_de_risque'];
		$famille = $_POST['famille'];
		$date_creation = $_POST['date_creation'];
		$date_derniere_modification = date('Y-m-d H:i:s');

		if(empty($Id_Risques) )
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			// redirection vers la page vue erreur
			header("Location:/DUER/erreur");
			exit(); // interruption après redirection
		}
		else // sinon effectuer les mise à jour
		{
			modifier_utilisateur($nom,$prenom,$mail,$Id_Utilisateur);
			modifier_unite_de_travail($salle, $Id_salle);
			modifier_localisation($emplacement_precis ,$Id_Localisation);
			modifier_situation_dangereuse($precis,$Id_Situation_dangereuse);
			modifier_famille_de_risque($famille, $Id_Famille_de_risque);
			$nb_lignes=modifier_risque( $date_creation, $date_derniere_modification, $Id_Risques);
			// on a modifier 1 ligne
			if($nb_lignes > 0) 
			{
				header("Location:/DUER/risque"); // page de confirmation
				exit(); // interruption de la fonction après redirection
			}
			else // il y a eu une erreur
			{
				$message_erreur="Erreur lors de la mise à jour des données du formulaire.";
				// redirection vers la page vue erreur
				header("Location:/DUER/erreur");
			}	
		}   
		break;




	}

?>