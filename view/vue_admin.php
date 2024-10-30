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

    <title>Administrateur | DUERP</title>
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

        <div class="rounded-4 bg-light my-5  align-items-center align-content-center">

        
            <div class="row text-center">

                <div class="col-12 mb-4">

                    <p class="p1 display-1 mt-5 mb-5 mb-5 h1">Accueil</p>

                    <?php echo "<p class='p2 h4 mb-2'>Utilisateur connecté : ".$_SESSION['user']."</p>";?>

            </div>


            <div class="col-12 col-lg-6 col-md-6 p-5">  

                <img src='../' class="img-fluid">

            </div>


            <div class="ps-4 pe-lg-3 form-group col-12 col-lg-6 col-md-6 row align-items-center align-content-center">

                <div class=" col-6">

                    <a class="m-1 btn btn-warning mb-5 w-100 text-light shadow-lg" href="/DUER/formulaire">Formulaire</a>

                </div>

                <div class="col-6">

                    <a class="m-1 btn btn-warning mb-5 w-100 btn-block text-light shadow-lg" href="/DUER/risque">Risques</a>

                </div>

                <div class="col-6">

                    <a class="m-1 btn btn-warning mb-5 w-100 btn-block text-light shadow-lg" href="/DUER/famille-de-risque">Famille de risques</a>

                </div>

                <div class="col-6">

                    <a class="m-1 btn btn-warning mb-5 w-100 btn-block text-light shadow-lg" href="/DUER/gravite">Gravité</a>

                </div>

                <div class="col-6">

                    <a class="m-1 btn btn-warning mb-5 w-100 btn-block text-light shadow-lg" href="/DUER/exposition">Personnes exposées</a>

                </div>

                <div class="col-6">

                    <a class="m-1 btn btn-warning mb-5 w-100 btn-block text-light shadow-lg" href="/DUER/probabilite">Probabilité</a>

                </div>

                <div class="col-6">

                    <a class="m-1 btn btn-warning mb-5 w-100 btn-block text-light shadow-lg" href="/DUER/resolution">Résolution de la situation</a>

                </div>

                <div class="col-6">

                    <a class="m-1 btn btn-warning mb-5 w-100 btn-block text-light shadow-lg" href="/DUER/unite">Unité de travail</a>

                </div>

                <div class="logout">

                    <form  method=post action="/DUER/menu/">
                    <input type="hidden" name="mode" value="3">
                    <button class="btn btn-primary mb-5" type="submit">Se déconnecter</button>
                    </form>

                </div>

            </div>


        </div>

    </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    </div>
</body>
</html>