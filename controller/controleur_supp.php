<?php
$mode=$_POST["mode"];
include __DIR__.'/../model/modele.php';



switch ($mode) {

	case 1:
        //$numero = implode(',',  $_POST['unite']);
        $id = $_POST['unite'];
		if(empty($id)) 
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			header("Location:/DUER/erreur");
			exit();
		}
		else   
		{
			$nb_lignes=supprimer_unite_de_travail($id[0]);
			if($nb_lignes > 0) 
			{
				header("Location:/DUER/unite"); 
				exit(); 
			}
			else 
			{
				$message_erreur="Erreur lors de la verification des données dans la base de donnee." .$id[0];
				header("Location:/DUER/erreur");
			}	
		}	
        break;
	case 2:

        $id = $_POST['solution'];
		if(empty($id)) 
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			header("Location:/DUER/erreur");
			exit(); 
		}
		else 
		{
			$nb_lignes=supprimer_solution_de_la_situation($id[0]);
			if($nb_lignes > 0) 
			{
				header("Location:/DUER/resolution");
				exit();
			}
			else 
			{
				echo "Erreur lors de la verification des données dans la base de donnees." .$id[0];
				header("Location:/DUER/resolution");
				exit();

			}	
		}

		break;

	case 3: 
        
        $id = $_POST['probabilite'];
		if(empty($id))
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			header("Location:/DUER/erreur");
			exit(); 
		}
		else 
		{
			$nb_lignes=supprimer_probabilite($id[0]);
			if($nb_lignes > 0) 
			{
				header("Location:/DUER/probabilite");
				exit();
			}
			else 
			{
				$message_erreur="Erreur lors de la verification des données dans la base de donnee." .$id[0];
				header("Location:/DUER/erreur");
			}	
		}
		break;

	case 4: 

        $id = $_POST['personne'];
		if(empty($id)) 
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			header("Location:/DUER/erreur");
			exit(); 
		}
		else 
		{
			$nb_lignes=supprimer_personne_exposees($id[0]);
			if($nb_lignes > 0) 
			{
				header("Location:/DUER/exposition"); 
				exit(); 
			}
			else 
			{
				$message_erreur="Erreur lors de la verification des données dans la base de donnee." .$id[0];
				header("Location:/DUER/erreur");
			}	
		}
		break;
		

	case 5:
        
		if($_POST['action']=='Ajouter'){

			header("Location:../view/vue_admin.php");
			exit();
		}

        $id = $_POST['gravite'];
		if(empty($id)) 
		{

			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			header("Location:/DUER/erreur");

			exit(); 
		}
		else  
		{
			$nb_lignes=supprimer_gravite($id[0]);
			if($nb_lignes > 0) 
			{
				header("Location:/DUER/gravite");
				exit(); 
			}
			else 
			{
				$message_erreur="Erreur lors de la verification des données dans la base de donnee." .$id[0];
				header("Location:/DUER/erreur");
			}	
		}
		break;
		
	case 6: 
		
        $id = $_POST['famille'];
		if(empty($id)) 
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			header("Location:/DUER/erreur");
			exit();
		}
		else  
		{
			$nb_lignes=supprimer_famille_de_risque($id[0]);
			if($nb_lignes > 0) 
			{
				header("Location:/DUER/famille-de-risque"); 
				exit(); 
			}
			else 
			{
				$message_erreur="Erreur lors de la verification des données dans la base de donnee." .$id[0];
				header("Location:/DUER/erreur");
			}	
		}
		break;
	case 7: 
	
		$id = $_POST['images'];
		if(empty($id)) 
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			header("Location:/DUER/erreur");
			exit();
		}
		else  
		{
			$nb_lignes=supprimer_image($id[0]);
			if($nb_lignes > 0) 
			{
				header("Location:../view/vue_image.php"); 
				exit(); 
			}
			else 
			{
				echo 'tt';
				$message_erreur="Erreur lors de la verification des données dans la base de donnee.".$nb_lignes;

				echo 'ee';
				header("Location:/DUER/erreur");
			}	
		}
		break;

	case 8: 
	
		$id = $_POST['risques'];
		if(empty($id)) 
		{
			$message_erreur="ATTENTION : Des champs n'ont pas été rempli correctement, veuillez vérifier";
			header("Location:/DUER/erreur");
			exit();
		}
		else  
		{
			$nb_lignes=supprimer_risque($id[0]);
			if($nb_lignes > 0) 
			{
				header("Location:/DUER/risque"); 
				exit(); 
			}
			else 
			{
				$message_erreur="Erreur lors de la verification des données dans la base de donnee." .$id[0];
				header("Location:/DUER/erreur");
			}	
		}
		break;
}
?>
