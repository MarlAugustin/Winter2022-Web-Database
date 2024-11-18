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
    $parties =$bdd->query('SELECT * FROM parties');
    return $parties;
}
//Renvoie les éléments de la partie séclectionner
function getPartie($id){
    //Récupération du match à supprimer
        $partie=$bdd->query('SELECT * FROM parties WHERE id = ' . $_GET['id']);
        
    //Affichage de la partie à supprimer
        $donnees=$partie->fetch();
        $partie->closeCursor();
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
        throw new Exception("Aucun article ne correspond à l'identifiant '$idEquipe'");
}
// ajout d'une partie à la base de données
function ajoutParties() {
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
