<?php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="styles/style.css"> -->
    <title>Accueil | DUERP</title>
    <link rel="apple-touch-icon" sizes="57x57" href="assets/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="scripts/session.js" defer></script>

    <style>
        body{
            background-color:rgb(20,21,38)!important;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">

        <div class="rounded-4 row text-center bg-light w-5 mx-3 my-5 mt-lg-5 align-items-center align-content-center">

            <div class="titres-accueil- col-12 mb-4">

                <p class="p1 display-1 mt-5 mb-5 h1">Accueil</p>
                <p class="p2 h4 mb-2">Bienvenue à l'accueil de l'application DUERP.</p>

            </div>

            <div class="logo-accueil col-12 col-md-6 col-lg-6">  

                <img src="assets/duer_logo.png" class="logo img-fluid">

            </div>

            

            <div class="d-flex justify-content-center align-content-center col-md-6 col-12 col-lg-6 d-flex">


                    <form class="mt-5" action="/DUER/menu/" method="post">
                    <input type="hidden" name="mode" value="2">
                    
               
                    <input class="form-control mb-3" placeholder="Email" type="email" name="mail"  required>
                

                    <input class="form-control mb-2 " placeholder="Mot de passe" type="password" name="password"  required>
                
                    <a class="pass-ft" href="">Mot de passe oublié</a><br>
                
                   <div class="row">

                    <button class="submit-login mt-3 btn btn-primary shadow-lg" type="submit" name="submit">Se connecter</button>

                    
                    <a href="view/vue_formulaire.php" class="mt-3 btn btn-warning mb-5 shadow-lg">Formulaire</a>
                   </div>
                    

                    </form>

 

            </div>

        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>