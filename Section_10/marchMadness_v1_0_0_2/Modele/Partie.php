<?php
require_once 'Framework/Modele.php';

class Partie extends Modele{

// Renvoie la liste de tous les parties
public function getParties() {
    $sql='SELECT * FROM parties';
    $donnees= $this->executerRequete($sql);
    return $donnees;
}

//Renvoie les éléments de la partie sélectionner
public function getPartie($idPartie){
    //Récupération du match à supprimer
    $sql='SELECT * FROM parties WHERE id = ' . $idPartie;
    $partie= $this->executerRequete($sql, array($idPartie));
    //Affichage de la partie à supprimer
        if ($partie->rowCount() == 1)
            return $partie->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucune partie ne correspond à l'identifiant '$idPartie'");

        return $partie;
}
// ajout d'une partie à la base de données
public function ajoutPartie() {
    $sql='INSERT INTO parties (id_Equipe1, '
                    . 'id_Equipe2, '
                    . 'jour_de_la_partie, '
                    . 'point_Equipe1, '
                    . 'point_Equipe2, '
                    . 'Serie, '
                    . 'Ville) '
                    . 'VALUES(?,?,?,?,?,?,?)';
    
    $requete=$this->executerRequete($sql,([$_POST['id_Equipe1'],
            $_POST['id_Equipe2'],
            $_POST['jour_de_la_partie'],
            $_POST['point_Equipe1'],
            $_POST['point_Equipe2'],
            $_POST['Serie'],
            $_POST['Ville']
            ]));    
}
//supprime une partie de la base de données
public function supprimerPartie($id){
    $sql='UPDATE parties '
            . ' SET efface = 1'
            . ' WHERE id= ?';
    var_dump($id);
    //var_dump($sql);
    $req=$this->executerRequete($sql, array($id));
}
// Réactive une partie
public function restorePartie($id) {
        $sql = 'UPDATE parties'
                . ' SET efface = 0'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
}
//modifie les données d'une partie
public function modifierPartie($id){
    $sql='UPDATE parties SET '
                    . 'id_Equipe1 = ?, '
                    . 'id_Equipe2 = ?, '
                    . 'jour_de_la_partie = ?, '
                    . 'point_Equipe1 = ?, '
                    . 'point_Equipe2 = ?, '
                    . 'Serie = ? '
                    . 'WHERE id=?';
    
    $requete=$this->executerRequete($sql,([$_POST['id_Equipe1'],
            $_POST['id_Equipe2'],
            $_POST['jour_de_la_partie'],
            $_POST['point_Equipe1'],
            $_POST['point_Equipe2'],
            $_POST['Serie'],
            $_POST['id'],

            ]));
}

// Renvoie la liste de tous les parties que l'équipe sélectionner à participer
public function getPartiesDeLequipe($idEquipe) {
    $sql='SELECT * FROM parties WHERE id_Equipe1='. $idEquipe .' OR id_Equipe2=' . $idEquipe;
    $donnees=$this->executerRequete($sql, (array($idEquipe)));
    return $donnees;
}
}