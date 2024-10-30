<?php

session_start();


include __DIR__.'/../model/modele.php';

$salles = array();
$salles = select_unite_de_travail();

$familles = array();
$familles = select_famille_de_risque();
/*
if (isset($_SESSION['loggedin'])){
echo "vous etes connecter";

}else{
echo "vous n'etes pas connecter";
}
*/
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Formulaire | DUERP</title>
  <link rel="apple-touch-icon" sizes="57x57" href="../assets/icons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="../assets/icons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../assets/icons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/icons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../assets/icons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="../assets/icons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="../assets/icons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../assets/icons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/icons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="../assets/icons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="../assets/icons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/icons/favicon-16x16.png">
  <link rel="manifest" href="../assets/icons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="../assets/icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
        body{
            background-color:rgb(20,21,38)!important;
        }
    </style>

</head>
<body class="p-3">
  <div class="rounded-4 bg-light my-5 container p-3">

    <div class="titres-accueil-">
      <p class="p1 p1 display-1 text-center">Formulaire</p>
    </div>

    <div class="formulaire pg-1 visible form-group">

      <form class="" name="myform" method="post" action="/DUER/menu/" enctype='multipart/form-data'>
        <input class="form-control" type="hidden" name="mode" value="1">

        <label class="form-label" for="nom">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control mb-3" placeholder="Entrez votre nom" required>

        <label class="form-label" for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" class="form-control mb-3" placeholder="Entrez votre prénom" required>

        <label class="form-label" for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control mb-3" placeholder="Entrez votre email" required>

    </div>

    <div class="formulaire pg-2 hidden form-group">

      <label class="form-label" for="salle">Unité de travail (salle):</label>
      <select id="salle" name="salle" class="form-control mb-3" required>

        <option selected>Choisir...</option>
        <?php foreach ($salles as $salle) : ?> <option value="<?= $salle['salle'] ?>"><?= $salle['salle'] ?></option> <?php endforeach; ?>

      </select>

      <label class="form-label" for="lieu">Localisation:</label>
      <input type="text" class="form-control mb-3" id="lieu" name="emplacement_precis" placeholder="Précision spaciale dans la pièce" required>

      <label class="form-label" for="situation">Situation dangereuse:</label>
      <input type="text" class="form-control mb-3" id="situation" name="precis" placeholder="Donner une Précision (ex:Interrupteur côté porte...)" required>

      <label class="form-label" for="famille">Famille de risque:</label>

      <select id="famille" name="famille" class="form-control mb-3" required>

        <option selected>Choisir...</option>
        <?php foreach ($familles as $famille) : ?> <option value="<?= $famille['famille'] ?>"><?= $famille['famille'] ?></option> <?php endforeach; ?>

      </select>

    </div>


    <div class="formulaire pg-3 mt-5 form-group">

      <div class="block-1">

        <h3>Caractéristiques du risque</h3>

        <table class="table">

          <thead>

            <tr class="form-label">

              <th>Personnes exposées</th>
              <th>0</th>
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>4</th>

            </tr>

          </thead>

          <tbody>

            <tr>
              <td>Tous les personnels EN</td>
              <td><input type="radio" name="tous_les_personnels_en" value="0" required></td>
              <td><input type="radio" name="tous_les_personnels_en" value="1"></td>
              <td><input type="radio" name="tous_les_personnels_en" value="2"></td>
              <td><input type="radio" name="tous_les_personnels_en" value="3"></td>
              <td><input type="radio" name="tous_les_personnels_en" value="4"></td>
            </tr>

            <tr>
              <td>Tous les ATTEE</td>
              <td><input type="radio" name="tous_les_ATTEE" value="0" required></td>
              <td><input type="radio" name="tous_les_ATTEE" value="1"></td>
              <td><input type="radio" name="tous_les_ATTEE" value="2"></td>
              <td><input type="radio" name="tous_les_ATTEE" value="3"></td>
              <td><input type="radio" name="tous_les_ATTEE" value="4"></td>
            </tr>

            <tr>
              <td>Tous les élèves</td>
              <td><input type="radio" name="tous_les_eleves" value="0" required></td>
              <td><input type="radio" name="tous_les_eleves" value="1"></td>
              <td><input type="radio" name="tous_les_eleves" value="2"></td>
              <td><input type="radio" name="tous_les_eleves" value="3"></td>
              <td><input type="radio" name="tous_les_eleves" value="4"></td>
            </tr>

          </tbody>

        


          <thead>

            <tr class="form-label">

              <th>Gravité</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>

            </tr>

          </thead>


            <tbody>
              
              <tr>
              
                <td>Blessures Graves</td>
                <td><input type="radio" name="blessures" value="0" required></td>
                <td><input type="radio" name="blessures" value="1"></td>
                <td><input type="radio" name="blessures" value="2"></td>
                <td><input type="radio" name="blessures" value="3"></td>
                <td><input type="radio" name="blessures" value="4"></td>

              </tr>

              
              <tr>
                <td>Maladies Mortelles</td>
                <td><input type="radio" name="maladies" value="0" required></td>
                <td><input type="radio" name="maladies" value="1"></td>
                <td><input type="radio" name="maladies" value="2"></td>
                <td><input type="radio" name="maladies" value="3"></td>
                <td><input type="radio" name="maladies" value="4"></td>
              </tr>

              <tr>
                <td>Pénibilité Physique</td>
                <td><input type="radio" name="penibilite_physique" value="0" required></td>
                <td><input type="radio" name="penibilite_physique" value="1"></td>
                <td><input type="radio" name="penibilite_physique" value="2"></td>
                <td><input type="radio" name="penibilite_physique" value="3"></td>
                <td><input type="radio" name="penibilite_physique" value="4"></td>
              </tr>

              <tr>
                <td>Pénibilité Mentale</td>
                <td><input type="radio" name="penibilite_mentale" value="0" required></td>
                <td><input type="radio" name="penibilite_mentale" value="1"></td>
                <td><input type="radio" name="penibilite_mentale" value="2"></td>
                <td><input type="radio" name="penibilite_mentale" value="3"></td>
                <td><input type="radio" name="penibilite_mentale" value="4"></td>
              </tr>

            </tbody>

            <thead>
            <tr>
              <th>Probabilité</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>Probabilité</td>
              <td><input type="radio" name="probabilite" value="0" required></td>
              <td><input type="radio" name="probabilite" value="1"></td>
              <td><input type="radio" name="probabilite" value="2"></td>
              <td><input type="radio" name="probabilite" value="3"></td>
              <td><input type="radio" name="probabilite" value="4"></td>
            </tr>

          </tbody>

          <thead>
            <tr>
              <th>Résolution de la situation</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Complexité de Résolution</td>
              <td><input type="radio" name="complexite_de_resolution" value="0" required></td>
              <td><input type="radio" name="complexite_de_resolution" value="1"></td>
              <td><input type="radio" name="complexite_de_resolution" value="2"></td>
              <td><input type="radio" name="complexite_de_resolution" value="3"></td>
              <td><input type="radio" name="complexite_de_resolution" value="4"></td>
            </tr>
            <tr>
              <td>Solution Onéreuse</td>
              <td><input type="radio" name="solution_onereuse" value="0" required></td>
              <td><input type="radio" name="solution_onereuse" value="1"></td>
              <td><input type="radio" name="solution_onereuse" value="2"></td>
              <td><input type="radio" name="solution_onereuse" value="3"></td>
              <td><input type="radio" name="solution_onereuse" value="4"></td>
            </tr>
          </tbody>



        </table>
      </div>


   
      <h3 class="my-3">Photos</h3>
      <input class="form-control" type="file" name='files[]' />
 



    <div class="next-pg mt-5 row">


      <div class="col-6 text-center">
      <a href="vue_admin.php" class="btn btn-warning text-light">Annuler</a>
      </div>


      <div class="col-6 text-center">

      <input class="btn btn-primary" type="submit" name="submit">
      </div>






      </div>


    </form>
  </div>
  <script src="../scripts/form_scroll.js"></script>
  <script src="../scripts/verif_form.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>