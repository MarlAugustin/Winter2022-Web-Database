<?php

require_once 'Framework/Controleur.php';

/**
 * Classe parente des contrôleurs soumis à authentification
 *
 * @author Baptiste Pesquet
 */
abstract class ControleurAdmin extends Controleur {

    private $utilisateur;

    public function executerAction($action) {
        // Vérifie si les informations utilisateur sont présents dans la session
        // Si oui, l'utilisateur s'est déjà authentifié : l'exécution de l'action continue normalement
        // Si non, l'utilisateur est renvoyé vers le contrôleur de connexion
        if ($this->requete->getSession()->existeAttribut("utilisateur")){
            $this->utilisateur = $this->requete->getSession()->getAttribut("utilisateur");
            parent::executerAction($action);
        } else {
            $this->rediriger('Utilisateurs');
        }
    }

    public function genererVue($donneesVue = array()) {
        // Ajouter l'utilisateur en session aux données de la vue
        $donneesVue['utilisateur'] = $this->utilisateur;
        parent::genererVue($donneesVue);
    }

}
