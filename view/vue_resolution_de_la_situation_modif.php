<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384- 
        Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        
        <link href="images/profile.jpg" rel="icon">
        <title>Modif Solution</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body style="background-color: white;">
    <div class="bg-dark navbar navbar-expand-lg mb-5">

<div class="container">

    <p class="navbar-brand text-light mt-2">
        D.U.E.R.P
    </p>

    <button class="navbar-toggler bg-light" data-bs-toggle="collapse" data-bs-target="#menu">

        <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse justify-content-end" id="menu">

        <ul class="navbar-nav">

            <?php 

            if(!isset($_SESSION['loggedin'])) { ?>

            <li class="nav-item">
                <a class="bg-dark nav-link nav-link text-light" href="/DUER/admin">Acceuil</a>
            </li>

            <li class="nav-item">
                <a class="bg-dark nav-link nav-link text-light" href="../index.php">Se connecter</a>
            </li>
            <?php } elseif($_SESSION['loggedin'] == true){ ?>


            <li class="nav-item">
                                <a class="bg-dark nav-link nav-link text-light" href="/DUER/admin">Acceuil</a>

            </li>

            <li class="nav-item">
                <form method="post" action="/DUER/menu/">
                <input type="hidden" name="mode" value="3">
                    <input style="padding: 0; border:none;" type="submit" class="text-decoration-none bg-dark nav-link text-light my-2" value="Se deconnecter">
                </form>
            </li>

            <li class="nav-item">
                <a class="bg-dark nav-link text-light" href="/DUER/risque" >Risques</a>
            </li>

            <li class="nav-item">
                <a class="bg-dark nav-link text-light" href="/DUER/unite">Unité de travail (salle)</a>
            </li>

            <li class="nav-item">
                <a class="bg-dark nav-link text-light" href="/DUER/famille-de-risque">Famille de risque</a> 
            </li>

            <li class="nav-item">
                <a class="bg-dark nav-link text-light" href="/DUER/exposition" >Personne exposées</a>
            </li>

            <li class="nav-item">
                <a class="bg-dark nav-link text-light" href="/DUER/gravite" >Gravité</a> 
            </li>

            <li class="nav-item">
                <a class="bg-dark nav-link text-light" href="/DUER/probabilite">Probabilité</a>
            </li>

            <li class="nav-item">
                <a class="bg-dark nav-link text-light" href="/DUER/resolution">Résolution de la situation</a>
            </li>

            <?php } ?>

        </ul>

    </div>

</div>

</div>
            <?php
                include __DIR__ .'/../model/modele.php';

                $solution = array(); 
                $solution = one_select_solution_de_la_situation($action); 
            ?>
            <form class="form-group p-3 mx-5" align="center" action="" method="post">
                <input type="hidden" name="mode" value="2">    

                <label class="form-label" for="Id_solution_de_la_situation">Num</label>
                <input class="form-control" type='text' name="Id_solution_de_la_situation" id="Id_solution_de_la_situation" value="<?=$solution['Id_solution_de_la_situation']?>"  readonly="readonly">
                <label class="form-label" for="complexite_de_resolution">Complexite</label>
                <input class="form-control" type="text" name="complexite_de_resolution" id="complexite_de_resolution" value="<?=$solution['complexite_de_resolution']?>">
                <label class="form-label" for="solution_onereuse">Onereux</label>
                <input class="form-control mb-3" type="text" name="solution_onereuse" id="solution_onereuse" value="<?=$solution['solution_onereuse']?>">	
                
                <input class="btn btn-success" type="submit" value="Modifier" name="submit">
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>
</html>
