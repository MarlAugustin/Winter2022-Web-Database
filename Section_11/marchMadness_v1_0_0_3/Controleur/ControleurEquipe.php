<?php

require_once 'Modele/Equipe.php';
require_once 'Modele/Partie.php';
require_once 'Framework/Controleur.php';

class ControleurEquipe extends Controleur{
    private $equipe;
    private $partie;
    public function __construct(){
        $this->equipe= new Equipe();
        $this->partie= new Partie();
    }
    public function index() {
        $equipes = $this->equipe->getEquipes();
        $this->genererVue(array('equipes'=>$equipes));
        
    }
    public function Equipe() {
        $idEquipe = $this->requete->getParametre("id");
        $equipe = $this->equipe->getEquipe($idEquipe);
        $parties = $this->partie->getPartiesDeLequipe($idEquipe);
        $partiesNom=array();
        foreach($parties as $partie){
            
            $nomEquipe1=$this->equipe->getNomEquipe($partie['id_Equipe1']);
            $nomEquipe2=$this->equipe->getNomEquipe($partie['id_Equipe2']);
            array_push($partie,$nomEquipe1,$nomEquipe2);
            array_push($partiesNom,$partie);
        }
        $this->genererVue(['donnees' => $partiesNom,'equipe' => $equipe]);
        
    }
   
}

