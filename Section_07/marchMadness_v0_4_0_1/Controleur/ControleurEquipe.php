<?php

require_once 'Modele/Equipe.php';
require_once 'Vue/Vue.php';
require_once 'Modele/Partie.php';
class ControleurEquipe{
    private $equipe;
    private $partie;
    public function __construct(){
        $this->equipe= new Equipe();
        $this->partie= new Partie();
    }
    
    public function equipe($idEquipe, $erreur) {
        $equipe = $this->equipe->getEquipe($idEquipe);
        $donnees = $this->partie->getPartiesDeLequipe($idEquipe);
        $vue = new Vue("Equipe");
        $vue->generer(['donnees' => $donnees]);
        $vue->generer(['equipe' => $equipe]);
    }
    public function nouvelEquipe() {
        $vue = new Vue("AjoutEquipe");
        $vue->generer();
    }
    public function ajouter($equipe) {
        $this->equipe->ajoutEquipe($equipe);
    }
   
}

