<?php
require 'Controleur/controleur.php';
try {
    if(isset($_GET['action'])){
        if($_GET['action'] == 'Equipe'){
           //intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
            if(isset($_GET['id'])){
                $id= intval($_GET['id']);
                if($id!=0){
                   $equipe=Equipe($id);
                } else{
                    throw new Exception("Identifiant d'équipe incorrect");
                }
            }else{
                throw new Exception(" Aucun identifiant d'équipe");
            }          
        }else if($_GET['action'] == 'confirmer'){
           //intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
            if(isset($_GET['id'])){
                $id= intval($_GET['id']);
                if($id!=0){
                   $partie= confirmer($id);
                } else{
                    throw new Exception("Identifiant de la partie est incorrect");
                }
            }else{
                throw new Exception(" Aucun identifiant de partie");
            }          
        }else if($_GET['action'] == 'supprimer'){
           //intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
            if(isset($_POST['id'])){
                $id= intval($_POST['id']);
                if($id!=0){
                   $partie= supprimerPartie($id);
                } else{
                    throw new Exception("Identifiant de la partie est incorrect");
                }
            }else{
                throw new Exception(" Aucun identifiant de partie");
            }          
        }else if($_GET['action'] == 'ajout'){
                    ajout();
        }else if($_GET['action'] == 'ajouter'){
                    ajouter();
        }else if($_GET['action'] == 'afficherModifier'){
            //ça ne fonctionne pas
                afficherModifier($id);
        }else if($_GET['action'] == 'modifier'){
            //ça ne fonctionne pas
                modifier($id);
        }else {
           throw new Exception(" Action non valide"); 
        }
    }else{
        //affiche la page d'acceuil par défaut
        acceuil();
    }
} catch (Exception $e) {
   erreur($e->getMessage());
}
