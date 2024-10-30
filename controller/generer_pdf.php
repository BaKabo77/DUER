<?php

session_start();
// Inclure FPDF
require_once('../vendor/autoload.php');

// Inclure le modèle
require_once('../model/modele.php');

// Fonction pour générer le PDF en utilisant l'ID du risque
function genererPDF($id_risque) {
    // Récupérer les informations du risque en fonction de son ID
    $risque = recuperer_infos_risque_par_id($id_risque);
    $date = $risque['date_creation'];
    $date_formatee = date('d/m/Y', strtotime($date));
    $note = $risque['total_evaluation'];

    $couleur="";
    if($note >= 0 && $note <= 13){
        $couleur = "vert";
    } elseif ($note >= 14 && $note <= 26){
        $couleur = "jaune";
    } elseif ($note >= 27 && $note < 36){
        $couleur = "rouge";
    } elseif ($note >= 36 && $note <= 40){
        $couleur = "rouge-fonce";
    }

    // Créer une instance FPDF
    $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);

    ob_start();
    include('../view/vue_risque_pdf.php');
    $html = ob_get_clean();
    $mpdf->WriteHTML($html);


    // Générer un nom de fichier unique pour le PDF
    $pdfFileName = 'risque_' . uniqid() . '.pdf';

    // Enregistrer le PDF dans un fichier temporaire
    $mpdf->Output($pdfFileName, \Mpdf\Output\Destination::FILE);

    // Envoyer le PDF au client pour le téléchargement
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $pdfFileName . '"');
    readfile($pdfFileName);

    // Supprimer le fichier temporaire après le téléchargement
    unlink($pdfFileName);
    exit;
}

// Vérifier si l'ID du risque est défini dans la requête POST
if(isset($_POST['id_risque'])) {

    $_SESSION['id_risque'] = true;
    // Appeler la fonction pour générer le PDF avec l'ID du risque passé en paramètre
    genererPDF($_POST['id_risque']);
} else {
    // Redirection si l'ID du risque n'est pas défini
    header('Location: ../view/vue_utilisateur.php');
    exit; // Arrêter l'exécution du script après la redirection
}
?>