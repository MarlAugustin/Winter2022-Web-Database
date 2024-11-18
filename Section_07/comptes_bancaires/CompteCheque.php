<?php

require_once 'CompteEpargne.php';

class CompteCheque extends CompteEpargne
{
    private $fraisDOuverture;

    public function __construct($devise, $solde, $titulaire, $tauxInteret, $fraisDOuverture)
    {
        parent::__construct($devise, $solde, $titulaire, $tauxInteret);
        $this->fraisDOuverture = $fraisDOuverture;
        $this->setSolde($solde - $fraisDOuverture);
    }

    public function getFraisDOuverture()
    {
        return $this->fraisDOuverture;
    }

    public function __toString()
    {
        return parent::__toString() . 
            '. Ses frais d\'ouverture sont de ' . $this->fraisDOuverture . ' ' . $this->getDevise();
    }
}
