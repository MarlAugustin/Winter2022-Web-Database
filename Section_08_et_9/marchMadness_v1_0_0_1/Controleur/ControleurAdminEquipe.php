<?php
require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Equipe.php';
require_once 'Modele/Partie.php';

class ControleurAdminEquipe extends ControleurAdmin {
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
    public function AjoutEquipe() {
        $vue = new Vue("AjoutEquipe");
        $this->genererVue();
    }
    public function ajouter() {
        $equipe['id']=$this->requete->getParametreId("id");
        $equipe['nom']=$this->requete->getParametre("nom");
        $equipe['rang']=$this->requete->getParametre("rang");
        $equipe['site']=$this->requete->getParametre("site");
        $this->equipe->ajoutEquipe($equipe);
        $this->executerAction('index');
    }
    
   
}

