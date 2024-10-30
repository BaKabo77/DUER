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
        <title>Personne</title>
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
                <a class="bg-dark nav-link nav-link text-light" href="/DUER/">Se connecter</a>
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

            <form class="table-responsive form-group m-1" action="../controller/controleur_supp.php" method="POST">            <input type="hidden" name="mode" value="4">

                <table class="table-bordered table container table-striped" width="60%" align="center">
                    <tr>
                        <td align="center" colspan="6"><b><h3>Informations Personnes Exposées</h3></b></td>
                    </tr>
                    <tr style="border-bottom:1pt solid black;">
                        <th>#</th>    
                        <th>Num</th>
                        <th width="30%">tous les personnes</th>
                        <th width="30%">tous les attee</th>
                        <th width="30%">tous les eleves</th>
                        <th width="5%">Modifier</th>


                    </tr>  
                    <?php
                    
                        include __DIR__.'/../model/modele.php';
                        $personnes_exposees = array(); 
                        $personnes_exposees = select_personne_exposees(); 
                        $nb = count($personnes_exposees); 

                        if($nb > 0) 
                        {
                            $i=0;						
                            while ($i<$nb)
                            {
                                $personnes=$personnes_exposees[$i];  
                                $num=$personnes['Id_personne_exposees'];			
                                $t_personnes=$personnes['tous_les_personnels_EN'];
                                $t_attee=$personnes['tous_les_ATTEE'];
                                $t_eleves=$personnes['tous_les_eleves'];
                                echo "<tr style='border-bottom:1pt solid black;'><td><input type='checkbox' name='personne[]' value='$num'></td>";
                                echo "<td>$num</td>";
                                echo "<td>$t_personnes</td>";
                                echo "<td>$t_attee</td>";
                                echo "<td>$t_eleves</td>";
                                echo "<td><a href='/DUER/resolution/$num'><input class='btn btn-primary' type='button' value='Modifier'></a></td>";
                                echo "</tr>";
                                $i=$i+1;
                            }
                        }	
              
                    ?>
                    <tr>
                        <td align="center" colspan="6">

                            <input class="btn btn-danger" type="submit" value="Supprimer" name="supprimer">
                        </td>
                    </tr>
                </table>
            </form>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    </body>
</html>
