<?php 
session_start();

if(!$_SESSION['id_risque']){
    header('Location:page404.php');
    exit;
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risque N°<?php echo $risque['Id_Risques']; ?></title>
    <link rel="stylesheet" href="../styles/pdf.css">
</head>
<body>
    <div class="bloc-titre">
    <div class="titre-fiche">
        <p>FICHE D'EVALUATION D'UN RISQUE</p>
    </div>
    <div class="num-fiche">
        <p>N° <?php echo $risque['Id_Risques'] ?></p>
    </div>
    <div class="etablissement">
    <p>Etablissement : LGT_LP_Voillaume</p>
    </div>
    <div class="logo-voillaume">
        <img src="../assets/logo_voillaume.jpg" width="7%">
    </div>
    </div>
    <div class="tab-1">
        <table>
            <tr>
                <td class="first">Unité de travail :</td>
                <td><?php echo $risque['salle']?></td>
            </tr>
            <tr>
                <td class="first">Localisation :</td>
                <td><?php echo $risque['emplacement_precis']?></td>
            </tr>
            <tr>
                <td class="first">Activité de travail ou tâche :</td>
                <td></td>
            </tr>
            <tr>
                <td class="first">Situation dangereuse :</td>
                <td><?php echo $risque['precis']?></td>
            </tr>
            <tr>
                <td class="first">Famille de risque :</td>
                <td><?php echo $risque['famille']?></td>
            </tr>
        </table>
    </div>
    <div class="bloc-photo">
        <div class="photo-titre">
            <p>PHOTO DU RISQUE</p>
        </div>
        <div class="photo">
            <img class="image" src="<?php if(isset($risque['photos'])){echo $risque['photos'];}?>">
        </div>
    </div>
    <div class="midlign"></div>
    <div class="tab-2">
        <table>
            <tr class="head">
                <td class="info" colspan=2>Pour chaque ligne, évaluez en informant par un "X" une case de 0 à 4</td>
                <td class="niveau">0</td>
                <td class="niveau">1</td>
                <td class="niveau">2</td>
                <td class="niveau">3</td>
                <td class="niveau">4</td>
                <td class="info">0 étant la valeur la plus faible, 4 étant la valeur la plus élevée</td>
            </tr>
            <tr>
                <td rowspan=3 class="title-cell">Personnes exposées</td>
                <td>Aucun personnel EN concerné</td>
                <?php for($i=0; $i<5; $i++){
                    if($risque['tous_les_personnels_EN'] == $i){
                        echo "<td class='niveau choisi'>X</td>";
                    }else{ echo "<td class='niveau'></td>"; }
                }?>
                <td>Tous les personnels EN sont concernés</td>
            </tr>
            <tr>
                <td>Aucun ATTEE concerné</td>
                <?php for($i=0; $i<5; $i++){
                    if($risque['tous_les_ATTEE'] == $i){
                        echo "<td class='niveau choisi'>X</td>";
                    }else{ echo "<td class='niveau'></td>"; }
                }?>
                <td>Tous les ATTEE sont concernés</td>
            </tr>
            <tr>
                <td>Aucun élève concerné</td>
                <?php for($i=0; $i<5; $i++){
                    if($risque['tous_les_eleves'] == $i){
                        echo "<td class='niveau choisi'>X</td>";
                    }else{ echo "<td class='niveau'></td>"; }
                }?>
                <td>Tous les élèves sont concernés</td>
            </tr>
            <tr>
                <td rowspan=4 class="title-cell">Gravité</td>
                <td>Aucune blessure</td>
                <?php for($i=0; $i<5; $i++){
                    if($risque['Blessure_graves_ou_deces'] == $i){
                        echo "<td class='niveau choisi'>X</td>";
                    }else{ echo "<td class='niveau'></td>"; }
                }?>
                <td>Blessures graves ou décès</td>
            </tr>
            <tr>
                <td>Aucune maladie</td>
                <?php for($i=0; $i<5; $i++){
                    if($risque['maladie_mortelle'] == $i){
                        echo "<td class='niveau choisi'>X</td>";
                    }else{ echo "<td class='niveau'></td>"; }
                }?>
                <td>Maladie mortelle</td>
            </tr>
            <tr>
                <td>Aucune pénibilité physique</td>
                <?php for($i=0; $i<5; $i++){
                    if($risque['penibilite_physique'] == $i){
                        echo "<td class='niveau choisi'>X</td>";
                    }else{ echo "<td class='niveau'></td>"; }
                }?>
                <td>Très grande pénibilité physique</td>
            </tr>
            <tr>
                <td>Aucune pénibilité mentale</td>
                <?php for($i=0; $i<5; $i++){
                    if($risque['penibilite_mentale'] == $i){
                        echo "<td class='niveau choisi'>X</td>";
                    }else{ echo "<td class='niveau'></td>"; }
                }?>
                <td>Très grande pénibilité mentale</td>
            </tr>
            <tr>
                <td class="title-cell">Probabilité</td>
                <td>Nulle</td>
                <?php for($i=0; $i<5; $i++){
                    if($risque['probabilite'] == $i){
                        echo "<td class='niveau choisi'>X</td>";
                    }else{ echo "<td class='niveau'></td>"; }
                }?>
                <td>très probable</td>
            </tr>
            <tr>
                <td class="title-cell" rowspan=2>Résolution de la situation</td>
                <td>Apparemment impossible à régler</td>
                <?php for($i=0; $i<5; $i++){
                    if($risque['complexite_de_resolution'] == $i){
                        echo "<td class='niveau choisi'>X</td>";
                    }else{ echo "<td class='niveau'></td>"; }
                }?>
                <td>Apparemment très simple à régler</td>
            </tr>
            <tr>
                <td>Apparemment très coûteux à régler</td>
                <?php for($i=0; $i<5; $i++){
                    if($risque['solution_onereuse'] == $i){
                        echo "<td class='niveau choisi'>X</td>";
                    }else{ echo "<td class='niveau'></td>"; }
                }?>
                <td>Apparemment très peu coûteux à régler</td>
            </tr>
        
        </table>
    </div>
    <div class="pied">
        <div class="date">
            <p>Fait le : <span id="date-risque"><?php echo $date_formatee; ?></span></p>
        </div>
        <div class="auteur">
            <p>Par : <span id="emetteur"><?php echo $risque['prenom']." ".$risque['nom']; ?></span></p>
        </div>
        <div class="note">
            <p id="total">Total évaluation : <span id="<?php echo $couleur; ?>"><?php echo $risque['total_evaluation']; ?></span> <span id="bareme">/40<span></p>
        </div>
    </div>
</body>
</html>