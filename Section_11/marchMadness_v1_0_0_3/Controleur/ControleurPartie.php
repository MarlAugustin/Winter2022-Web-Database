<?php
require_once 'Modele/Partie.php';
require_once 'Framework/Controleur.php';
require_once 'Modele/Equipe.php';

class ControleurPartie extends Controleur{
    private $partie;
    private $equipe;
    public function __construct() {
        $this->partie = new Partie();
        $this->equipe=new Equipe();
    }
    public function index() {
        $parties = $this->partie->getParties();
        $partiesNom=array();
        foreach($parties as $partie){
            
            $nomEquipe1=$this->equipe->getNomEquipe($partie['id_Equipe1']);
            $nomEquipe2=$this->equipe->getNomEquipe($partie['id_Equipe2']);
            array_push($partie,$nomEquipe1,$nomEquipe2);
            array_push($partiesNom,$partie);
        }
        $this->genererVue(array('donnees'=>$partiesNom));
    }
    /*
    public function partie($idArticle, $erreur) {
        $partie = $this->partie->getPartie($idArticle);    
        $vue = new Vue("Partie");
        $vue->generer(['partie' => $partie, 'erreur' => $erreur]);
    }*/
    }

