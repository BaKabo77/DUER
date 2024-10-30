<?php

session_start();

if (!$_SESSION['loggedin'] || $_SESSION['role'] != 'util') {
    header('Location:page404.php');
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur | DUERP</title>
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
    <script src="../scripts/session.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
        body{
            background-color:rgb(20,21,38)!important;
        }
    </style>

<body>
    <div class="block-p container bg-light mt-5 p-2 rounded">
        <div class="text-center">
            <p class="p1 display-3">Accueil</p>
            <?php

            echo "<p class='p2'>Utilisateur connecté : " . $_SESSION['user'] . "</p>";

            ?>
        </div>

        <div class="row">
        <div class="logo-accueil col-12 col-lg-6 col-md-6">
            <img src="../assets/duer_logo.png" class="logo img-fluid">
        </div>


        <div class="col-12 col-lg-6 col-md-6">

                <div class="user-menu d-flex justify-content-around my-5">

                    <div class="form-case">
                        <a href="vue_formulaire.php"><button class=" btn btn-primary">Formulaire</button></a>
                    </div>

                    <div class="logout ">
                        <form method=post action="../controller/controleur.php">
                            <input type="hidden" name="mode" value="3">
                            <button class="btn btn-warning" type="submit">Se déconnecter</button>
                        </form>
                    </div>

                </div>

            <div class="me-3 bg-primary pt-2 pe-2 ps-2 pb-2 ms-2 rounded">    
                <div class="text-reception text-center text-white">
                    <p>Boîte de réception</p>
                </div>
                    <div style="height: 45vh;" class="mb-5 reception border rounded overflow-x-hidden overflow-y-scroll">
                        <?php
                        require "../model/modele.php";

                        $les_risques = select_risques();
                        if ($les_risques) {
                            foreach ($les_risques as $risque) {
                                $date_creation = strtotime($risque['date_creation']);
                                $date_formattee = date("d/m/Y", $date_creation); // Formatage de la date
                                $heure_formattee = date("H:i", $date_creation); // Formatage de l'heure ?>

                                <form method="post" class="border pdf-form" action="../controller/generer_pdf.php">
                                    <input type="hidden" name="id_risque" value="<?php echo $risque['Id_Risques']; ?>">

                                    <div class="risque-card bg-white row d-flex pt-3 pb-3 text-center">

                                        <div class="text-card col-5 col-md-5 ms-3">
                                            <p class="font-weight-bold"><?php echo $risque['nom'] . " " . $risque['prenom']; ?></p>
                                            <p class="email card-subtitle mb-2 text-muted"><?php echo $risque['email']; ?></p>
                                            <p class="etat">Etat : <?php echo $risque['etat']; ?></p>
                                            <p class="date-creation">Soumis le : <?php echo $date_formattee . " à " . $heure_formattee; ?></p>
                                        </div>

                                        <button type="submit" class="col-5 col-md-5 ms-5 ms-3 pdf-button" s title="Télécharger le récapitulatif en PDF">
                                            <img src="../assets/pdf_icon.png" class="img-fluid">
                                        </button>

                                    </div>

                                </form>
                        <?php
                            }
                        }
                        ?>
                    </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>