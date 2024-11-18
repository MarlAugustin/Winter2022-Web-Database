<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
 $bdd = new PDO('mysql:host=localhost;dbname=march_madness;charset=utf8', 'root', 'mysql',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
 return $bdd;
}

// Renvoie la liste de tous les parties
function getParties() {
    $bdd = getBdd();
    $donnees =$bdd->query('SELECT * FROM parties');
    return $donnees;
}
//Renvoie les éléments de la partie sélectionner
function getPartie($idPartie){
    $bdd= getBdd();
    //Récupération du match à supprimer
    $partie=$bdd->query('SELECT * FROM parties WHERE id = ' . $_GET['id']);
        
    //Affichage de la partie à supprimer
        $partie->execute(array($idPartie));
        if ($partie->rowCount() == 1)
            return $partie->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucune partie ne correspond à l'identifiant '$idPartie'");

        return $partie;
}
// Renvoie la liste de l'équipe sélectionner
function getEquipe($idEquipe) {
    $bdd = getBdd();
    $equipe = $bdd->prepare('select * from equipes'
            . ' where id=?');
    $equipe->execute(array($idEquipe));
    if ($equipe->rowCount() == 1)
        return $equipe->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucune équipe ne correspond à l'identifiant '$idEquipe'");
}
// ajout d'une partie à la base de données
function ajoutPartie() {
    $bdd = getBdd();
    $requete= $bdd->prepare('INSERT INTO parties (id_Equipe1, '
                    . 'id_Equipe2, '
                    . 'jour_de_la_partie, '
                    . 'point_Equipe1, '
                    . 'point_Equipe2, '
                    . 'Serie) '
                    . 'VALUES(?,?,?,?,?,?)');
    
    $requete->execute([$_POST['id_Equipe1'],
            $_POST['id_Equipe2'],
            $_POST['jour_de_la_partie'],
            $_POST['point_Equipe1'],
            $_POST['point_Equipe2'],
            $_POST['Serie']
            ]);    
}
function supprimerPartie($id){
    $bdd = getBdd();
    $req = $bdd->prepare('DELETE FROM parties WHERE id= ?');
    $req->execute(array($_POST['id']));
}
function modifierPartie($id){
    $bdd = getBdd();
    $requete = $bdd->prepare('UPDATE parties SET '
                    . 'id_Equipe1 = ?, '
                    . 'id_Equipe2 = ?, '
                    . 'jour_de_la_partie = ?, '
                    . 'point_Equipe1 = ?, '
                    . 'point_Equipe2 = ?, '
                    . 'Serie = ? '
                    . 'WHERE id=?');
    
    $requete->execute([$_POST['id_Equipe1'],
            $_POST['id_Equipe2'],
            $_POST['jour_de_la_partie'],
            $_POST['point_Equipe1'],
            $_POST['point_Equipe2'],
            $_POST['Serie'],
            $_POST['id'],

            ]);
}