<?php
require_once 'Controleur/ControleurAdmin.php';
require_once 'Modele/Partie.php';
require_once 'Modele/Equipe.php';


class ControleurAdminPartie extends ControleurAdmin {
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
    public function ajout() {
        $equipes=$this->equipe->getEquipes();   
        $vue = new Vue("Ajout");
        $this->genererVue(['equipes'=>$equipes]);
    }
    public function ajouter() {
        $partie['jour_de_la_partie']=$this->requete->getParametre('jour_de_la_partie');
        $partie['id_Equipe1']=$this->requete->getParametre('id_Equipe1');
        $partie['id_Equipe2']=$this->requete->getParametre('id_Equipe2');
        $partie['point_Equipe1']=$this->requete->getParametre('point_Equipe1');
        $partie['point_Equipe2']=$this->requete->getParametre('point_Equipe2');
        $partie['Serie']=$this->requete->getParametre('Serie');
        $partie['Ville']=$this->requete->getParametre('Ville');
        $this->partie->ajoutPartie();
        $this->executerAction('index');
    }
    public function Modifier() {
        $id = $this->requete->getParametreId('id');
        $partie = $this->partie->getPartie($id);
        $this->genererVue(['partie' => $partie]);
    }
    public function miseAJourPartie() {
        $partie['id']=$this->requete->getParametreId('id');
        $partie['jour_de_la_partie']=$this->requete->getParametre('jour_de_la_partie');
        $partie['id_Equipe1']=$this->requete->getParametre('id_Equipe1');
        $partie['id_Equipe2']=$this->requete->getParametre('id_Equipe2');
        $partie['point_Equipe1']=$this->requete->getParametre('point_Equipe1');
        $partie['point_Equipe2']=$this->requete->getParametre('point_Equipe2');
        $partie['Serie']=$this->requete->getParametre('Serie');
        $partie['Ville']=$this->requete->getParametre('Ville');
        $this->partie->modifierPartie($partie);
        $this->executerAction('index');
        }
    // Confirmer la suppression d'une partie
    public function Confirmer() {
        // Lire le commentaire à l'aide du modèle
        $id = $this->requete->getParametreId('id');
        $partie = $this->partie->getPartie($id);
        $this->genererVue(['partie' => $partie]);
    }
    // Supprimer une partie
    public function supprimer() {
        // Lire le commentaire afin d'obtenir le id de l'article associé
        $id = $this->requete->getParametreId('id');
        $partie = $this->partie->getPartie($id);
        $this->partie->supprimerPartie($id);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        $this->executerAction('index');
    }
}