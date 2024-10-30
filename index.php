<?php
require 'AltoRouter.php';

$routeur = new AltoRouter;


$routeur->map('GET','/DUER/',function(){
    include_once 'view/vue_connexion.php';
});

$routeur->map('GET|POST','/DUER/menu/',function(){
    include_once 'controller/controleur.php';
});

$routeur->map('GET|POST','/DUER/menu/ajout',function(){
    include_once __DIR__.'../controller/controleur_ajout.php';
});

$routeur->map('GET|POST','/DUER/menu/modification',function(){
    include_once __DIR__.'../controller/controleur_modif.php';
});


$routeur->map('GET|POST','/DUER/menu/suppression',function(){
    include_once __DIR__.'../controller/controleur_supp.php';
});

$routeur->map('GET','/DUER/admin',function(){
    include_once 'view/vue_admin.php';
});

$routeur->map('GET','/DUER/formulaire',function(){
    include_once 'view/vue_formulaire.php';
});

$routeur->map('GET','/DUER/erreur',function(){
    include_once 'view/vue_erreur.php';
});

$routeur->map('GET','/DUER/confirmation/[i:nb_lignes]',function($nb_lignes){
    $nb_lignes;
    include_once 'view/vue_confirmation.php';
});




$routeur->map('GET','/DUER/risque',function(){
    include_once 'view/vue_risques.php';
});

$routeur->map('GET','/DUER/risque/[i:num]',function($num){
    $action=$num;
    include_once 'view/vue_risques_modif.php';
});





$routeur->map('GET','/DUER/famille-de-risque',function(){
    include_once 'view/vue_famille_de_risque.php';
});

$routeur->map('GET','/DUER/famille-de-risque/[i:num]',function($num){
    $action=$num;
    include_once 'view/vue_famille_de_risque_modif.php';
});

$routeur->map('GET','/DUER/famille-de-risque/ajouter',function(){
    include_once 'view/vue_famille_de_risque_modif.php';
});






$routeur->map('GET','/DUER/gravite',function(){
    include_once 'view/vue_gravite.php';
});

$routeur->map('GET','/DUER/gravite/[i:num]',function($num){
    $action=$num;
    include_once 'view/vue_gravite_modif.php';
});






$routeur->map('GET','/DUER/exposition',function(){
    include_once 'view/vue_personne_exposees.php';
});

$routeur->map('GET','/DUER/exposition/[i:num]',function($num){
    $action=$num;
    include_once 'view/vue_personne_exposees_modif.php';
});





$routeur->map('GET','/DUER/probabilite',function(){
    include_once 'view/vue_probabilite.php';
});

$routeur->map('GET','/DUER/probabilite/[i:num]',function($num){
    $action=$num;
    include_once 'view/vue_probabilite_modif.php';
});





$routeur->map('GET','/DUER/resolution',function(){
    include_once 'view/vue_resolution_de_la_situation.php';
});

$routeur->map('GET','/DUER/resolution/[i:num]',function($num){
    $action=$num;
    include_once 'view/vue_resolution_de_la_situation_modif.php';
});





$routeur->map('GET','/DUER/unite',function(){
    include_once 'view/vue_unite_de_travail.php';
});

$routeur->map('GET','/DUER/unite/[i:num]',function($num){
    $action=$num;
    include_once 'view/vue_unite_de_travail_modif.php';
});

$routeur->map('GET','/DUER/unite/ajouter',function(){
    include_once 'view/vue_unite_de_travail_modif.php';
});






$match = $routeur->match();

if($match !== false){
    call_user_func_array($match['target'],$match['params']);

}else{

    include_once 'view/page404.php';
}

?>