<?php
require_once 'Modele/Partie.php';
require_once 'Vue/Vue.php';

class ControleurPartie{
    private $partie;
    
    public function __construct() {
        $this->partie = new Partie();
    }
    public function parties() {
        $partie = $this->partie->getParties();
        $vue = new Vue("Parties");
        $vue->generer(['donnees' => $partie]);
    }
    /*
    public function partie($idArticle, $erreur) {
        $partie = $this->partie->getPartie($idArticle);    
        $vue = new Vue("Partie");
        $vue->generer(['partie' => $partie, 'erreur' => $erreur]);
    }*/
    public function nouvelPartie() {
        $vue = new Vue("Ajout");
        $vue->generer();
    }
    public function ajouter($partie) {
        $this->partie->setPartie($partie);
        $this->parties();
    }
    public function modifierPartie($id) {
        $partie = $this->partie->getPartie($id);
        $vue = new Vue("Modifier");
        $vue->generer(['partie' => $partie]);
    }
    public function miseAJourPartie($partie) {
        $this->partie->modifierPartie($partie);
        $this->parties();
        }
    // Confirmer la suppression d'une partie
    public function confirmer($id) {
        // Lire le commentaire à l'aide du modèle
        $partie = $this->partie->getPartie($id);
        $vue = new Vue("Confirmer");
        $vue->generer(array('partie' => $partie));
    }
    // Supprimer une partie
    public function supprimer($id) {
        // Lire le commentaire afin d'obtenir le id de l'article associé
        $partie = $this->partie->getCommentaire($id);
        $this->partie->supprimerPartie($id);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        header('Location: index.php');
    }
    }

