<?php

require 'Modele/Modele.php';

//Affiche toute les parties
function acceuil(){
    $donnees= getParties();
    require 'Vue/vueAccueil.php';
}
// Renvoie la liste de l'équipe sélectionner
function Equipe($idEquipe,$erreur) {
    $equipe= getEquipe($idEquipe);
    $donnees= getPartiesDeLequipe($idEquipe);
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
function ajouterEquipe($equipe){
        $validation_site= filter_var($equipe['site'], FILTER_VALIDATE_URL);
        $validation_rang=filter_var($equipe['rang'], FILTER_VALIDATE_INT);
        if($validation_site && $validation_rang){
            ajoutEquipe();
            header('Location: index.php');
        }if (!$validation_rang){
            header('Location: index.php?action=nouvelleEquipe&erreur=rang');
        }if(!$validation_site){
            header('Location: index.php?action=nouvelleEquipe&erreur=site');
        }

}
function nouvelleEquipe($erreur){
        require 'Vue/vueAjoutEquipe.php';
}
function ajout(){
    ajoutPartie();
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
function quelsVille($term) {
    echo searchVille($term);
}
