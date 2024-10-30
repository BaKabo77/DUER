<?php 

session_start();

 if(!$_SESSION['loggedin'] || $_SESSION['role'] != 'admin') {
    header('Location:page404.php');
 }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risques | DUERP</title>
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../assets/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/icons/favicon-16x16.png">
    <link rel="manifest" href="../assets/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../assets/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../scripts/session.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>
        body{
            background-color:rgb(20,21,38)!important;
        }
    </style>
</head>
<body>
    
    <div class="container">
        
        <p class="p1 text-white text-center display-5 my-5">Liste des risques</p>
        
        <div class="container table-responsive p-3 rounded bg-white my-5">
            <table class="table-bordered table table-striped">
                <thead>
                    <tr>
                        <th class="bg-primary text-center text-white">N° Risque</th>
                        <th class="bg-primary text-center text-white">Etat</th>
                        <th class="bg-primary text-center text-white">Date de création</th>
                        <th class="bg-primary text-center text-white">Date de modification</th>
                        <th class="bg-primary text-center text-white">Id Photo</th>
                        <th class="bg-primary text-center text-white">Id Utilisateur</th>
                        <th class="bg-primary text-center text-white">Id Situation dangereuse</th>
                        <th class="bg-primary text-center text-white">Id Probabilité</th>
                        <th class="bg-primary text-center text-white">Id Famille de risque</th>
                        <th class="bg-primary text-center text-white">Id Localisation</th>
                        <th class="bg-primary text-center text-white">Id Unité de travail</th>
                        <th class="bg-primary text-center text-white">Id Personnes exposées</th>
                        <th class="bg-primary text-center text-white">Id Gravité</th>
                        <th class="bg-primary text-center text-white">Id Solution de la situation</th>
                        <th class="bg-primary text-center text-white">Total Evaluation</th>
                        <th class="bg-primary text-center text-white">Modification</th>
                    </tr>
                </thead>
                <?php 
                include __DIR__.'/../model/modele.php';

         $les_risques = liste_risques();
         if(empty($les_risques)){
            echo "
            <tbody>
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            </tbody>";
        } else { 
         
          
                    foreach($les_risques as $risque){ ?>
                    <tbody>
                        <tr>
                            <td class="text-center fw-bold"><?=$risque['Id_Risques']?> </td>
                            <td class="text-center fw-bold"><?=$risque['etat']?></td>
                            <td class="text-center fw-bold"><?=$risque['date_creation']?></td>
                            <td class="text-center fw-bold"><?=$risque['date_derniere_modification']?></td>
                            <td class="text-center fw-bold"><?=$risque['Id_Photos']?></td>
                            <td class="text-center fw-bold"><?=$risque['Id_Utilisateur']?></td>
                            <td class="text-center fw-bold"><?=$risque['Id_Situation_dangereuse']?></td>
                            <td class="text-center fw-bold"><?=$risque['Id_Probabilite']?></td>
                            <td class="text-center fw-bold"><?=$risque['Id_Famille_de_risque']?></td>
                            <td class="text-center fw-bold"><?=$risque['Id_Localisation']?></td>
                            <td class="text-center fw-bold"><?=$risque['Id_Unite_de_travail']?></td>
                            <td class="text-center fw-bold"><?=$risque['Id_personne_exposees']?></td>
                            <td class="text-center fw-bold"><?=$risque['Id_Gravite']?></td>
                            <td class="text-center fw-bold"><?=$risque['Id_solution_de_la_situation']?></td>
                            <td class="text-center fw-bold"><?=$risque['total_evaluation']?></td>
                            <td class="text-center bg-warning">
                            <a class="text-decoration-none text-light" href="/DUER/risque/<?=$risque['Id_Risques']?>">
                            modifier
                            </a>
                        </tr>
                    </tbody>
                 <?php   }
                }
                ?>

            </table>
        </div>
    </div>
    <script src="../scripts/edit_cell.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>









<?
 