<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
 $bdd = new PDO('mysql:host=localhost;dbname=march_madness_v0_2_1;charset=utf8', 'root', 'mysql',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
 return $bdd;
}

// Renvoie la liste de tous les parties
function getParties() {
    $bdd = getBdd();
    $donnees =$bdd->query('SELECT * FROM parties');
    return $donnees;
}
// Renvoie la liste de tous les parties
function getPartiesDeLequipe($idEquipe) {
    $bdd = getBdd();
    $donnees =$bdd->query('SELECT * FROM parties WHERE id_Equipe1='. $idEquipe .' OR id_Equipe2=' . $idEquipe);
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
                    . 'Serie, '
                    . 'Ville) '
                    . 'VALUES(?,?,?,?,?,?,?)');
    
    $requete->execute([$_POST['id_Equipe1'],
            $_POST['id_Equipe2'],
            $_POST['jour_de_la_partie'],
            $_POST['point_Equipe1'],
            $_POST['point_Equipe2'],
            $_POST['Serie'],
            $_POST['Ville']
            ]);    
}
//supprime une partie de la base de données
function supprimerPartie($id){
    $bdd = getBdd();
    $req = $bdd->prepare('DELETE FROM parties WHERE id= ?');
    $req->execute(array($_POST['id']));
}
//modifie les données d'une partie
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
// Recherche les types répondant à l'autocomplete
function searchVille($term) {
    $conn = getBdd();
    $stmt = $conn->prepare('SELECT nomVille FROM villes WHERE nomVille LIKE :term');
    $stmt->execute(array('term' => '%' . $term . '%'));

    while ($row = $stmt->fetch()) {
        $return_arr[] = $row['nomVille'];
    }

    /* Toss back results as json encoded array. */
    return json_encode($return_arr);
}

//On ajoute une équipe
function ajoutEquipe() {
    $bdd = getBdd();
    $requete= $bdd->prepare('INSERT INTO equipes ( '
                    . 'nom, '
                    . 'rang, '
                    . 'site) '
                    . 'VALUES(?,?,?)');
    
    $requete->execute([$_POST['nom'],
            $_POST['rang'],
            $_POST['site']
            ]);
}