<?php

require_once 'Framework/Modele.php';

class Equipe extends Modele {
// Renvoie la liste de toutes les équipes
    public function getEquipes() {
        $sql = 'select * from equipes';
        $equipes = $this->executerRequete($sql);      
        return $equipes;
    }
// Renvoie la liste de l'équipe sélectionner
    public function getEquipe($idEquipe) {
        $sql = 'select * from equipes'
                . ' where id=?';
        $equipe = $this->executerRequete($sql, (array($idEquipe)));
        if ($equipe->rowCount() == 1)
            return $equipe->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucune équipe ne correspond à l'identifiant '$idEquipe'");
    }
    // Renvoie la liste de l'équipe sélectionner
    public function getNomEquipe($idEquipe) {
        
        $sql = 'select nom from equipes'
                . ' where id=?';
        $equipe = $this->executerRequete($sql, (array($idEquipe)));
        if ($equipe->rowCount() == 1)
            return $equipe->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucune équipe ne correspond à l'identifiant '$idEquipe'");
    }

//On ajoute une équipe
    public function ajoutEquipe($equipe) {
        $fichierImage=$this->enregistrerImage($equipe['image']);
        $sql = 'INSERT INTO equipes ( '
                . 'nom, '
                . 'rang, '
                . 'site, '
                . 'image) '
                . 'VALUES(?,?,?,?)';

        $requete = $this->executerRequete($sql, [$equipe['nom'],
            $equipe['rang'],
            $equipe['site'],
            $fichierImage         
        ]);
        return $requete;
    }

}
