<?php

require_once 'Framework/Controleur.php';

class ControleurApropos extends Controleur {

    public function index() {
        $this->genererVue();
    }
    
}