<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        
        <link href="images/profile.jpg" rel="icon">
        <title>Gravite</title>
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

        <div class="container">
        
            <form class="table-responsive form-group m-1" action="/DUER/menu/suppression" method="POST">            
                <input type="hidden" name="mode" value="5">

                <table class="table-bordered table container table-striped" width="60%" align="center">
                    <tr >
                        <td align="center" colspan="6"><b><h3>Informations Gravite</h3></b></td>
                    </tr>
                    <tr  style='border-bottom:1pt solid black;' style='border-left:1pt solid black;'>
                        <th>#</th>    
                        <th>Num</th>
                        <th width="20%" text-align="center">Blessures graves ou deces</th>
                        <th width="20%" text-align="center">Maladie mortelle</th>
                        <th width="20%" text-align="center">Penebilite physique</th>
                        <th width="20%" text-align="center">Penebilite mentale</th>
                        <th width="5%"  text-align="center">Modifier</th>

                    </tr>  
                    <?php
                        include __DIR__.'/../model/modele.php';
                        $gravite = array(); 
                        $gravite = select_gravite(); 
                        $nb = count($gravite); 

                        if($nb > 0) 
                        {
                            $i=0;						
                            while ($i<$nb)
                            {
                                $grav=$gravite[$i];  
                                $num=$grav['Id_Gravite'];			
                                $b_graves  =$grav['Blessure_graves_ou_deces'];
                                $m_mortelle=$grav['maladie_mortelle'];
                                $p_physique=$grav['penibilite_physique'];
                                $p_mentale =$grav['penibilite_mentale'];

                                echo "<tr style='border-bottom:1pt solid black;' ><td align='center'><input type='checkbox' name='gravite[]' value='$num'></td>";
                                echo "<td>$num</td>";
                                echo "<td>$b_graves</td>";
                                echo "<td>$m_mortelle</td>";
                                echo "<td>$p_physique</td>";
                                echo "<td>$p_mentale</td>";
                                echo "<td><a href='/DUER/gravite/$num'><input class='btn btn-primary' type='button' value='Modifier'></a></td>";
                                echo "</tr>";
                                $i=$i+1;
                            }
                        }	
                    ?>
                    <tr>
                        <td colspan="6" align="center">


                            <input class="btn btn-danger" type="submit" value="Supprimer" name="supprimer">
                        </td>
                    </tr>
                </table>
                <table border=0>
                    
                </table>
            </form>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>
</html>
