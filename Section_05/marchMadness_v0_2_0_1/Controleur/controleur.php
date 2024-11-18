<?php

require 'Modele/Modele.php';

//Affiche toute les parties
function acceuil(){
    $donnees= getParties();
    require 'Vue/vueAccueil.php';
}
// Renvoie la liste de l'équipe sélectionner
function Equipe($idEquipe) {
    $equipe= getEquipe($idEquipe);
    require 'Vue/VueEquipe.php';
}
function confirmer($id) {
    $partie= getPartie($id);
    require 'Vue/vueConfirmer.php';
}
function supprimer($id){
    $partie= getPartie($id);
    //Supprimer la partie à l'aide du modèle
    supprimerPartie($id);
    //rechager la page
    header('Location: index.php');
}
function ajouter(){
        require 'Vue/vueAjout.php';
}
function ajout(){
    ajoutPartie();
    //Ça affiche une erreur
    header('Location: index.php');
}
function afficherModifier($id){
    $partie= getPartie($id);
    require 'Vue/vueModifier.php';
}
function modifier($id){
    modifierPartie($id);
    header('Location: index.php');

}
//affiche une erreur
function erreur($msgErreur){
    require 'Vue/vueErreur.php';
}

