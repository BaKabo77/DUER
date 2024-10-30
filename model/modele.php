<?php

function utilisateur($nom, $prenom, $email)
{

	require 'connexion.php';

    $utilisateurs = select_utilisateur();
    $exist = false;
    $count = 0;

    foreach($utilisateurs as $utilisateur) {
        if($utilisateur['nom'] == $nom && $utilisateur['prenom'] == $prenom && $utilisateur['email'] = $email) {
            $exist = true;
            $count = $utilisateur['Id_Utilisateur'];
        }
    }
    
    if($exist == false) {
	$sql = "INSERT INTO utilisateur (nom, prenom, email) VALUES (?, ?, ?)";
	$stmt= $bdd->prepare($sql);
	$stmt->execute([$nom, $prenom, $email]);
	

	if($stmt == false) 
	{	
		$message_erreur="Impossible d'executer la requete: $sql " ;
		echo $message_erreur;
		die();
		header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$count = $bdd->lastInsertId(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
	} }
	return $count ;
	
}

function inserer_unite_de_travail($id, $salle)
{
	require 'connexion.php';

    $unites = select_unite_de_travail();
    $exist = false;
    $count = 0;

    foreach($unites as $unite) {
        if($unite['salle'] == $salle) {
            $exist = true;
            $count = $unite['Id_Unite_de_travail'];
        }
    }

    if($exist == false) {
	$sql = "INSERT INTO unite_de_travail (Id_Unite_de_travail, salle) VALUES (?, ?)";
	$stmt= $bdd->prepare($sql);
	$stmt->execute([$id, $salle]);

	if($stmt == false) 
	{	
		$message_erreur="Impossible d'executer la requete: $sql " ;
		echo $message_erreur;
		die();
		header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$count = $bdd->lastInsertId(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
	} }

	return $count;
	
}

function inserer_solution_de_la_situation( $complexite, $solution_onereuse)
{
	require 'connexion.php';

	$sql = "INSERT INTO solution_de_la_situation ( complexite_de_resolution, solution_onereuse) VALUES ( ?, ?)";
	$stmt= $bdd->prepare($sql);
	$stmt->execute([ $complexite, $solution_onereuse]);
	$count = 0;

	if($stmt == false) 
	{	
		$message_erreur="Impossible d'executer la requete: $sql " ;
		echo $message_erreur;
		die();
		header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$count = $bdd->lastInsertId(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
	}
	return $count ;
	
}

function inserer_situation_dangereuse($id, $precis)
{
	require 'connexion.php';

	$sql = "INSERT INTO situation_dangereuse (Id_Situation_dangereuse, precis) VALUES (?, ?)";
	$stmt= $bdd->prepare($sql);
	$stmt->execute([$id, $precis]);
	$count = 0;
	

	if($stmt == false) 
	{	
		$message_erreur="Impossible d'executer la requete: $sql ";
		echo $message_erreur;
		die();
		header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$count = $bdd->lastInsertId(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
	}
	return $count;
}

function inserer_probabilite( $probabilite)
{
	require 'connexion.php';

	$sql = "INSERT INTO probabilite (probabilite) VALUES ( ?)";
	$stmt= $bdd->prepare($sql);
	$stmt->execute([$probabilite]);
	$count = 0;

	if($stmt == false) 
	{	
		$message_erreur="Impossible d'executer la requete: $sql " ;
		echo $message_erreur;
		die();
		header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$count = $bdd->lastInsertId(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
	}
	return $count ;
	

}

function inserer_personne_exposees($id, $personnels, $atte, $eleves)
{
	require 'connexion.php';

	$sql = "INSERT INTO personne_exposees (Id_personne_exposees, tous_les_personnels_EN, tous_les_ATTEE, tous_les_eleves) VALUES (?, ?, ?, ?)";
	$stmt= $bdd->prepare($sql);
	$stmt->execute([$id, $personnels, $atte, $eleves]);
	$count = 0;

	if($stmt == false) 
	{	
		$message_erreur="Impossible d'executer la requete: $sql " ;
		echo $message_erreur;
		die();
		header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$count = $bdd->lastInsertId(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
	}
	return $count ;
	

}

function inserer_localisation($id, $emplacement)
{
	require 'connexion.php';

	$sql = "INSERT INTO localisation (Id_Localisation, emplacement_precis) VALUES (?, ?)";
	$stmt= $bdd->prepare($sql);
	$stmt->execute([$id, $emplacement]);
	$count = 0;

	if($stmt == false) 
	{	
		$message_erreur="Impossible d'executer la requete: $sql " ;
		echo $message_erreur;
		die();
		header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$count = $bdd->lastInsertId(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
	}
	return $count ;

	

}

function inserer_gravite($id, $blessures, $maladie, $penibilite_physique, $penibilite_mentale)
{
	require 'connexion.php';

	$sql = "INSERT INTO gravite (Id_Gravite, Blessure_graves_ou_deces, maladie_mortelle, penibilite_physique, penibilite_mentale) VALUES ('$id', '$blessures', '$maladie', '$penibilite_physique', '$penibilite_mentale')";
	$stmt= $bdd->prepare($sql);
	$stmt->execute();
	$count = 0;
	
	if($stmt == false) 
	{	
		$message_erreur="Impossible d'executer la requete: $sql " ;
		echo $message_erreur;
		die();
		header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$count = $bdd->lastInsertId(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
	}
	return $count ;

}

function inserer_famille_de_risque($id, $famille)
{
	require 'connexion.php';

    $familles = select_famille_de_risque();
    $exist = false;
    $count = 0;

    foreach($familles as $f){
        if($f['famille'] == $famille){
            $exist = true;
            $count = $f['Id_Famille_de_risque'];
        }
    }


	if($exist == false){
	$sql = "INSERT INTO famille_de_risque (Id_Famille_de_risque, famille) VALUES (?, ?)";
	$stmt= $bdd->prepare($sql);
	$stmt->execute([$id, $famille]);

	if($stmt == false) 
	{	
		$message_erreur="Impossible d'executer la requete: $sql " ;
		echo $message_erreur;
		die();
		header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$count = $bdd->lastInsertId(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
	} }
	return $count;
	
}

function inserer_comptes($id, $email, $name, $password)
{
	require 'connexion.php';

	$sql = "INSERT INTO comptes (Id_Comptes, email, name_user, mot_de_passe) VALUES (?, ?, ?, ?)";
	$stmt= $bdd->prepare($sql);
	$stmt->execute([$id, $email, $name, $password]);
	$count = 0;

	if($stmt == false) 
	{	
		$message_erreur="Impossible d'executer la requete: $sql " ;
		echo $message_erreur;
		die();
		header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$count = $bdd->lastInsertId(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
	}
	return $count;
}


function inserer_risque( $etat, 
                         $date_creation, 
                         $date_derniere_modification, 
                         $Id_Photos, 
                         $Id_Utilisateur, 
                         $Id_Situation_dangereuse, 
                         $Id_Probabilite, 
                         $Id_Famille_de_risque, 
                         $Id_Localisation, 
                         $Id_Unite_de_travail, 
                         $Id_gravite, 
                         $Id_personne_exposees, 
                         $Id_solution_de_la_situation)
{
	require 'connexion.php';

	$date_creation=date('Y-m-d H:i:s');
	$sql = "INSERT INTO risques ( etat, 
                                  date_creation, 
                                  date_derniere_modification, 
                                  Id_Photos, 
                                  Id_Utilisateur, 
                                  Id_Situation_dangereuse, 
                                  Id_Probabilite, 
                                  Id_Famille_de_risque, 
                                  Id_Localisation, 
                                  Id_Unite_de_travail, 
                                  Id_personne_exposees,
                                  Id_Gravite, 
                                  Id_solution_de_la_situation ) 
                                  VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt= $bdd->prepare($sql);
	$stmt->execute([$etat, 
                    $date_creation, 
                    $date_derniere_modification, 
                    $Id_Photos, 
                    $Id_Utilisateur, 
                    $Id_Situation_dangereuse, 
                    $Id_Probabilite, 
                    $Id_Famille_de_risque, 
                    $Id_Localisation, 
                    $Id_Unite_de_travail, 
                    $Id_gravite, 
                    $Id_personne_exposees, 
                    $Id_solution_de_la_situation ]);
	$count = 0;
	
	if($stmt == false) 
	{	
		$message_erreur="Impossible d'executer la requete: $sql " ;
		echo $message_erreur;
		die();
		header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$count = $stmt->rowCount();
        $id = $bdd->lastInsertId();
        $stmt2 = $bdd->prepare("CALL calculer_total_evaluation(?,?,?,?,?)");
        $stmt2->execute([$id, $Id_personne_exposees, $Id_gravite, $Id_Probabilite, $Id_solution_de_la_situation]);
	}
	return $count ;

}

function inserer_image($images)
{
	require 'connexion.php';  
    // Count total files
    $countfiles = count($_FILES['files']['name']);   
    // Prepared statement
    $sql = "INSERT INTO photos (nom,photos) VALUES(?,?)";
    $stmt = $bdd->prepare($sql);
    $count = 0;
    // Loop all files
    for($i = 0; $i < $countfiles; $i++) {
        // File name
        $filename = $_FILES['files']['name'][$i];
        // Location
        $target_file = '../images/'.$filename;
        // file extension
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        // Valid image extension
        $valid_extension = array("png","jpeg","jpg");
        if(in_array($file_extension, $valid_extension)) {
            // Upload file
            if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file)
            ) {
                // Execute query
                $stmt->execute(array($filename,$target_file));
                $count = $bdd->lastInsertId();
            }
        }
    }
    return $count;
}


function verif_connexion($mail, $pass)
{
	require 'connexion.php';
    
    
    $sql = "SELECT * FROM comptes WHERE email='$mail' AND mot_de_passe='$pass'";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
	$count=0;
    

	if(!$data=$stmt->fetch(PDO::FETCH_ASSOC)) 
	{	
		$message_erreur="Impossible d'executer la requete: $sql";
		header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
        $_SESSION['loggedin'] = true;
        $_SESSION['utilisateur_id'] = $data['Id_Comptes'];
        $_SESSION['nom'] = $data['name_user'];
        $comptes=$data;
	}
	return $comptes;
}

function select_image()
{
	require 'connexion.php';
    $imagelist = array();

    $sql = "SELECT * FROM images";
    $stmt = $bdd->prepare($sql);
    $stmt->execute();
    $imagelist = $stmt->fetchAll();

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $imagelist;
}

// SELECT
/*
function select_incidents(){
	require 'connexion.php';
	$sql = "SELECT * FROM fournisseur";
	$stmt = $bdd->prepare($sql);
	$stmt->execute()
}
*/

function select_utilisateur(){
	require 'connexion.php';
	$utilisateur = array();

	$sql = "SELECT * FROM utilisateur";
	$stmt = $bdd->prepare($sql);
    $stmt->execute();
	$utilisateur = $stmt->fetchAll();
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $utilisateur;

}

function select_localisation(){
	require 'connexion.php';
	$localisation = array();

	$sql = "SELECT * FROM localisation";
	$stmt = $bdd->prepare($sql);
    $stmt->execute();
	$localisation = $stmt->fetchAll();
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $localisation;

}

function select_comptes(){
	require 'connexion.php';
	$comptes = array();

	$sql = "SELECT * FROM comptes";
	$stmt = $bdd->prepare($sql);
    $stmt->execute();
	$comptes = $stmt->fetchAll();
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $comptes;

}

function select_unite_de_travail(){
	require 'connexion.php';
	$unite_de_travail = array();

	$sql = "SELECT * FROM unite_de_travail";
	$stmt = $bdd->prepare($sql);
    $stmt->execute();
	$unite_de_travail = $stmt->fetchAll();
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $unite_de_travail;

}

function select_famille_de_risque(){
	require 'connexion.php';
    $famille_de_risque = array();

	$sql = "SELECT * FROM famille_de_risque ORDER BY famille ASC";
	$stmt = $bdd->prepare($sql);
	$stmt->execute();
    $famille_de_risque = $stmt->fetchAll();

    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $famille_de_risque;
}

function select_personne_exposees(){
	require 'connexion.php';
    $personnes_exposees = array(); 
	$sql = "SELECT * FROM personne_exposees";
	$stmt = $bdd->prepare($sql);
	$stmt->execute();
    $personnes_exposees = $stmt->fetchAll();
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $personnes_exposees;
}

function select_gravite(){
	require 'connexion.php';
    $gravite = array();
	$sql = "SELECT * FROM gravite";
	$stmt = $bdd->prepare($sql);
	$stmt->execute();
    $gravite = $stmt->fetchAll();
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $gravite;
}

function select_probabilite(){
	require 'connexion.php';
    $probabilite = array();
	$sql = "SELECT * FROM probabilite";
	$stmt = $bdd->prepare($sql);
	$stmt->execute();
    $probabilite = $stmt->fetchAll();
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $probabilite;
}

function select_solution_de_la_situation(){
	require 'connexion.php';
    $solution = array();
	$sql = "SELECT * FROM solution_de_la_situation";
	$stmt = $bdd->prepare($sql);
	$stmt->execute();
    $solution = $stmt->fetchAll();
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $solution;
}
function select_risques(){
	require 'connexion.php';
    $risques = array();
	$sql = "SELECT Id_Risques, etat, date_creation,
            date_derniere_modification, u.nom, u.prenom,
            u.email
            FROM risques r
            INNER JOIN utilisateur u
            ON r.Id_Utilisateur = u.Id_Utilisateur
            ORDER BY r.date_creation DESC;";
	$stmt = $bdd->prepare($sql);
	$stmt->execute();
    $risques = $stmt->fetchAll();
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $risques;
}

function liste_risques(){
	require 'connexion.php';
    $risques = array();
	$sql = "SELECT *
            FROM risques 
            ORDER BY date_creation DESC;";
	$stmt = $bdd->prepare($sql);
	$stmt->execute();
    $risques = $stmt->fetchAll();
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $risques;
}

function recuperer_infos_risque_par_id($id_risque){
    require 'connexion.php';
    $sql = "SELECT r.Id_Risques, r.etat, r.date_creation,
            r.date_derniere_modification, r.total_evaluation, u.nom, u.prenom,
            u.email, ph.photos, si.precis, pr.probabilite,
            ut.salle, f.famille, l.emplacement_precis, pe.tous_les_personnels_EN,
            pe.tous_les_ATTEE, pe.tous_les_eleves, gr.Blessure_graves_ou_deces,
            gr.maladie_mortelle, gr.penibilite_physique, gr.penibilite_mentale,
            so.complexite_de_resolution, so.solution_onereuse
            FROM risques r
            INNER JOIN utilisateur u
            ON r.Id_Utilisateur = u.Id_Utilisateur
            INNER JOIN photos ph
            ON r.Id_Photos = ph.Id_Photos
            INNER JOIN unite_de_travail ut
            ON r.Id_Unite_de_travail = ut.Id_Unite_de_travail
            INNER JOIN situation_dangereuse si
            ON r.Id_Situation_dangereuse = si.Id_Situation_dangereuse
            INNER JOIN probabilite pr
            ON r.Id_Probabilite = pr.Id_Probabilite
            INNER JOIN famille_de_risque f
            ON r.Id_Famille_de_risque = f.Id_Famille_de_risque
            INNER JOIN localisation l
            ON r.Id_Localisation = l.Id_Localisation
            INNER JOIN personne_exposees pe
            ON r.Id_personne_exposees = pe.Id_personne_exposees
            INNER JOIN gravite gr
            ON r.Id_Gravite = gr.Id_Gravite
            INNER JOIN solution_de_la_situation so
            ON r.Id_solution_de_la_situation = so.Id_solution_de_la_situation
            WHERE Id_Risques = :risque";
    
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':risque', $id_risque, PDO::PARAM_INT);
	$stmt->execute();
    
    // Vérifier si la requête s'est bien exécutée
    if($stmt === false) {
        $message_erreur = "Impossible d'exécuter la requête: $sql";
        // Afficher un message d'erreur ou rediriger vers une page d'erreur
        echo $message_erreur;
        header("Location: ../view/vue_erreur.php?erreur=$message_erreur");
        exit(); // Arrêter l'exécution du script après la redirection
    }
    
    // Récupérer les résultats de la requête
    $risque = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $risque;
}

// ONE SELECT

function one_select_utilisateur($id){
	require 'connexion.php';
	$utilisateur = array();

	$sql = "SELECT * FROM utilisateur WHERE Id_Utilisateur = ?";
	$stmt = $bdd->prepare($sql);
    $stmt->execute([$id]);
	$utilisateur = $stmt->fetch();
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $utilisateur;

}

function one_select_localisation($id){
	require 'connexion.php';
	$localisation = array();

	$sql = "SELECT * FROM localisation WHERE Id_Localisation =?";
	$stmt = $bdd->prepare($sql);
    $stmt->execute([$id]);
	$localisation = $stmt->fetch();
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $localisation;

}

function one_select_comptes($id){
	require 'connexion.php';
	$comptes = array();

	$sql = "SELECT * FROM comptes WHERE Id_Comptes = ?";
	$stmt = $bdd->prepare($sql);
    $stmt->execute([$id]);
	$comptes = $stmt->fetch();
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $comptes;

}

function one_select_unite_de_travail($id){
	require 'connexion.php';
	$unite_de_travail = array();

	$sql = "SELECT * FROM unite_de_travail WHERE Id_Unite_de_travail = ?";
	$stmt = $bdd->prepare($sql);
    $stmt->execute([$id]);
	$unite_de_travail = $stmt->fetch();
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $unite_de_travail;

}

function one_select_famille_de_risque($id){
	require 'connexion.php';
    $famille_de_risque = array();
	$sql = "SELECT * FROM famille_de_risque WHERE Id_Famille_de_risque = ? ";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$id]);
    $famille_de_risque = $stmt->fetch();
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $famille_de_risque;
}

function one_select_personne_exposees($id){
	require 'connexion.php';
    $personne_exposees = array();
	$sql = "SELECT * FROM personne_exposees WHERE Id_personne_exposees = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$id]);
    $personne_exposees = $stmt->fetch();
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $personne_exposees;
}

function one_select_gravite($id){
	require 'connexion.php';
    $gravite = array();
	$sql = "SELECT * FROM gravite WHERE Id_Gravite = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$id]);
    $gravite = $stmt->fetch();
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $gravite;
}

function one_select_probabilite($id){
	require 'connexion.php';
    $probabilite =array();
	$sql = "SELECT * FROM probabilite WHERE Id_Probabilite = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$id]);
    $probabilite = $stmt->fetch();
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $probabilite;
}

function one_select_solution_de_la_situation($id){
	require 'connexion.php';
    $solution = array();
	$sql = "SELECT * FROM solution_de_la_situation WHERE Id_solution_de_la_situation = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$id]);
    $solution = $stmt->fetch();
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $solution;
}

function one_select_risque($id){
	require 'connexion.php';
    $risque= array();
	$sql = "SELECT Id_Risques,  etat, date_creation, date_derniere_modification, 
    ip.tous_les_personnels_EN, ip.tous_les_ATTEE, ip.tous_les_eleves,                                /* Personne exposees */ 
    g.Blessure_graves_ou_deces, g.maladie_mortelle, g.penibilite_physique, g.penibilite_mentale,	/* Gravite           */
    s.complexite_de_resolution, s.solution_onereuse,                                                 /* Solution          */
    i.nom as nomimage, i.nom,
    f.famille, f.Id_Famille_de_risque,
    ut.nom, ut.prenom , ut.email, ut.Id_Utilisateur,
    sd.precis, sd.Id_Situation_dangereuse,
    p.probabilite, 
    l.emplacement_precis, l.Id_Localisation,
    u.salle , u.Id_Unite_de_travail
    FROM `risques` 
    INNER JOIN famille_de_risque f ON risques.Id_Famille_de_risque = f.Id_Famille_de_risque
    INNER JOIN gravite g ON risques.Id_Gravite = g.Id_Gravite
    INNER JOIN photos i ON risques.Id_Photos= i.Id_Photos
    INNER JOIN localisation l ON risques.Id_Localisation = l.Id_Localisation
    INNER JOIN personne_exposees ip ON risques.Id_personne_exposees = ip.Id_personne_exposees
    INNER JOIN probabilite p ON risques.Id_Probabilite = p.Id_Probabilite
    INNER JOIN situation_dangereuse sd ON risques.Id_Situation_dangereuse = sd.Id_Situation_dangereuse
    INNER JOIN solution_de_la_situation s ON risques.Id_solution_de_la_situation = s.Id_solution_de_la_situation
    INNER JOIN unite_de_travail u ON risques.Id_Unite_de_travail = u.Id_Unite_de_travail
    INNER JOIN utilisateur ut ON risques.Id_Utilisateur = ut.Id_Utilisateur 
    WHERE Id_Risques = $id";

    $requete=$bdd->query($sql);
    $risque=$requete->fetchAll();

    return $risque;
}
// MODIFIER
function modifier_etat($etat,$id){
	require 'connexion.php';

	$sql = "UPDATE risques SET etat = ? WHERE Id_Risques = ?";
	$stmt = $bdd->prepare($sql);
    $stmt->execute([$etat,$id]);
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $count;

}

function modifier_situation_dangereuse($precis,$id){
	require 'connexion.php';

	$sql = "UPDATE situation_dangereuse SET precis = ? WHERE Id_Situation_dangereuse = ?";
	$stmt = $bdd->prepare($sql);
    $stmt->execute([$precis,$id]);
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $count;

}

function modifier_utilisateur($nom,$prenom,$email,$id){
	require 'connexion.php';

	$sql = "UPDATE utilisateur SET nom = ?, prenom = ?, email=? WHERE Id_Utilisateur = ?";
	$stmt = $bdd->prepare($sql);
    $stmt->execute([$nom,$prenom,$email,$id]);
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $count;

}

function modifier_localisation($emplacement,$id){
	require 'connexion.php';
	$sql = "UPDATE localisation SET  emplacement_precis = ? WHERE Id_Localisation = ?";
	$stmt = $bdd->prepare($sql);
    $stmt->execute([$emplacement,$id]);
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $count;

}

function modifier_comptes($mail,$name,$password,$id){
	require 'connexion.php';

    $sql = "UPDATE comptes SET email = ?, name_user = ?, mot_de_passe=? WHERE Id_Comptes = ?";
	$stmt = $bdd->prepare($sql);
    $stmt->execute([$mail,$name,$password,$id]);
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $count;

}
function modifier_unite_de_travail($salle, $id){
	require 'connexion.php';
	$sql = "UPDATE unite_de_travail SET salle = ? WHERE Id_Unite_de_travail = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$salle,$id]);
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $count;

}

function modifier_famille_de_risque($famille, $id){
	require 'connexion.php';
	$sql = "UPDATE famille_de_risque SET famille = ? WHERE Id_Famille_de_risque = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$famille, $id]);
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $count;
}

function modifier_personne_exposees($personnels, $atte, $eleves, $id){
	require 'connexion.php';
	$sql = "UPDATE personne_exposees SET tous_les_personnels_EN = ?, tous_les_ATTEE = ?, tous_les_eleves = ? WHERE Id_personne_exposees = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$personnels, $atte, $eleves, $id]);
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $count;
}

function modifier_gravite($blessures, $maladie, $penibilite_physique, $penibilite_mentale, $id){
	require 'connexion.php';
	$sql = "UPDATE gravite SET Blessure_graves_ou_deces = ?, maladie_mortelle = ?, penibilite_physique = ?, penibilite_mentale = ? WHERE Id_Gravite = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$blessures, $maladie, $penibilite_physique, $penibilite_mentale, $id]);
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $count;
}

function modifier_probabilite($probabilite, $id){
	require 'connexion.php';
	$sql = "UPDATE probabilite SET probabilite = ? WHERE Id_Probabilite = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$probabilite, $id]);
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $count;
}

function modifier_solution_de_la_situation($complexite, $solution_onereuse, $id){
	require 'connexion.php';
	$sql = "UPDATE solution_de_la_situation SET complexite_de_resolution = ?, solution_onereuse = ? WHERE Id_solution_de_la_situation = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$complexite, $solution_onereuse, $id]);
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $count;

}
function modifier_risque(   $date_creation,
                            $date_derniere_modification,
                            $Id_Risques
                            ){
	require 'connexion.php';
    
    $sql = "UPDATE risques 
            SET date_creation = ?, 
                date_derniere_modification = ? 
            WHERE Id_Risques = ? ";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$date_creation,
                    $date_derniere_modification,
                    $Id_Risques]);
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $count;

}




// SUPPRIMER 

function supprimer_utilisateur($id){
	require 'connexion.php';

	$sql = "DELETE FROM utilisateur  WHERE Id_Unite_de_travail = ?";
	$stmt = $bdd->prepare($sql);
    $stmt->execute([$id]);
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $count;

}

function supprimer_localisation($id){
	require 'connexion.php';

	$sql = "DELETE FROM localisation  WHERE Id_Localisation = ?";
	$stmt = $bdd->prepare($sql);
    $stmt->execute([$id]);
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $count;

}

function supprimer_comptes($id){
	require 'connexion.php';
    $sql = "DELETE FROM comptes WHERE Id_Comptes = ?";
	$stmt = $bdd->prepare($sql);
    $stmt->execute([$id]);
    $count = 0;

	
    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $count;

}
function supprimer_unite_de_travail($id){
	require 'connexion.php';
	$sql = "DELETE FROM unite_de_travail WHERE Id_Unite_de_travail = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$id]);
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $count;

}

function supprimer_famille_de_risque($id){
	require 'connexion.php';
	$sql = "DELETE FROM famille_de_risque WHERE Id_Famille_de_risque = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$id]);
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $count;
}

function supprimer_personne_exposees($id){
	require 'connexion.php';
	$sql = "DELETE FROM personne_exposees WHERE Id_personne_exposees = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$id]);

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $count;
}

function supprimer_gravite($id){
	require 'connexion.php';
	$sql = "DELETE FROM gravite WHERE Id_Gravite = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$id]);
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $count;
}

function supprimer_probabilite($id){
	require 'connexion.php';
	$sql = "DELETE FROM probabilite WHERE Id_Probabilite = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$id]);
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $count;
}

function supprimer_solution_de_la_situation($id){
	require 'connexion.php';
	$sql = "DELETE FROM solution_de_la_situation WHERE Id_solution_de_la_situation = ?";
	$stmt = $bdd->prepare($sql);
	$stmt->execute([$id]);
    $count = 0;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount(); // compte le nombre de lignes affectées (normalement 1 ligne insérée)
    }
    return $count;

}


function supprimer_image($id)
{
	require 'connexion.php';

    $sql = "DELETE FROM images WHERE Id_images = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$id]);
    $count = 0 ;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $count;
}

function supprimer_risque($id)
{
	require 'connexion.php';

    $sql = "DELETE FROM risques WHERE Id_Risques = ?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$id]);
    $count = 0 ;

    if($stmt == false)
    {
        $message_erreur="Impossible d'executer la requete: $sql " ;
        echo $message_erreur;
        die();
        header("Location:../view/vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
        exit(); // interruption de la fonction après redirection
    }
    else // insert réussi
    {
        $count = $stmt->rowCount();
		
    }
    return $count;
}
 