<?php

require_once 'Modele/Modele.php';

class Equipe extends Modele {

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

//On ajoute une équipe
    public function ajoutEquipe() {
        $sql = 'INSERT INTO equipes ( '
                . 'nom, '
                . 'rang, '
                . 'site) '
                . 'VALUES(?,?,?)';

        $requete = $this->executerRequete($sql, [$_POST['nom'],
            $_POST['rang'],
            $_POST['site']
        ]);
    }

}
