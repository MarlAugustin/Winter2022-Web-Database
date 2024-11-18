<?php

require_once 'Controleur/ControleurPartie.php';
require_once 'Controleur/ControleurEquipe.php';
require_once 'Controleur/ControleurType.php';
require_once 'Vue/Vue.php';

class Routeur {

    private $ctrlPartie;
    private $ctrlEquipe;
    private $ctrlType;

    public function __construct() {
        $this->ctrlPartie = new ControleurPartie();
        $this->ctrlEquipe = new ControleurEquipe();
        $this->ctrlType = new ControleurType();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'apropos') {
                    $this->apropos();
                } else if ($_GET['action'] == 'confirmer') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        $this->ctrlPartie->confirmer($id);
                    } else
                        throw new Exception("Identifiant de la partie non valide");
                }if ($_GET['action'] == 'Equipe') {
                    $id = intval($this->getParametre($_POST, 'id'));
                     if ($id != 0) {
                        // Vérifier si une erreur est présente
                        $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                        $this->ctrlEquipe->equipe($id, $erreur);
                    } else
                        throw new Exception("Identifiant d'équipe non valide");
                } else if ($_GET['action'] == 'ajout') {
                    $partie_id = intval($this->getParametre($_POST, 'id'));
                    if ($partie_id != 0) {
                        $this->getParametre($_POST, 'id_Equipe1');
                        $this->getParametre($_POST, 'id_Equipe2');
                        $this->getParametre($_POST, 'jour_de_la_partie');
                        $this->getParametre($_POST, 'point_Equipe1');
                        $this->getParametre($_POST, 'point_Equipe2');
                        $this->getParametre($_POST, 'Serie');
                        $this->getParametre($_POST, 'Ville');
                        // Enregistrer le commentaire
                        $this->ctrlPartie->ajouter($_POST);
                    } else
                        throw new Exception("Identifiant de la partie non valide");
                } else if ($_GET['action'] == 'ajouter') {
                    $this->ctrlPartie->nouvelPartie();
                } else if ($_GET['action'] == 'nouvelleEquipe') {
                    $this->ctrlEquipe->nouvelEquipe();
                } else if ($_GET['action'] == 'ajoutEquipe') {
                    $this->ctrlEquipe->ajouter($_POST);
                } else if ($_GET['action'] == 'supprimer') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        $this->ctrlPartie->supprimer($id);
                    } else
                        throw new Exception("Identifiant de la partie non valide");
                } else if ($_GET['action'] == 'modifier') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        $this->ctrlPartie->miseAJourPartie($id);
                    } else
                        throw new Exception("Identifiant de la partie non valide");
                } else if ($_GET['action'] == 'afficherModifier') {
                    $this->ctrlPartie->modifierPartie($id);
                } else if ($_GET['action'] == 'quelsVille') {
                    $term = $this->getParametre($_GET, 'term');
                    $this->ctrlType->quelsVille($term);
                } else {
                    throw new Exception("Action non valide");
                }
            } else
                $this->ctrlPartie->parties();
        } catch (Exception $ex) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une explication de l'application
    private function apropos() {
        $vue = new Vue("A_propos");
        $vue->generer();
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else
            throw new Exception("Paramètre '$nom' absent");
    }

}
