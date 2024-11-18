<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Liste de matchs March Madness</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
<h2>Progression du tournoi march Madness</h2>
<p><a href="A_propos.html">[À propos] </a></p>
<p><a href="parties_nouvelle.php">[Ajouter une nouvelle partie]</a></p>
<?php
    try {
    // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=march_madness;charset=utf8', 'root', 'mysql',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    }
    // Si tout va bien, on peut continuer
    // On récupère tout le contenu de la table parties
    $reponse = $bdd->query('SELECT * FROM parties');
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch()) {
        //devrais ajouter les noms des équipes?
        echo '<p>'
                . '<a href="parties_modifier.php?id=' .
                $donnees['id'] . 
                '">[Modifier]' .
                '<a href="parties_confirmer.php?id=' .
                $donnees['id'] . 
                '">[Supprimer]</a> <strong>   Match numero  ' .
                htmlspecialchars($donnees['id'])  .
                ': </strong></br> <table border=' . 1 .'"><tr><th>Date du Match : </th>' .
               '<th>Numero équipe 1 : </th>'.
               '<th>Numero équipe 2 : </th>'.    
               '<th>Nombre de points équipe 1 : </th>'.
               '<th>Nombre de points équipe 2 : </th>'.
               '<th>Manche de la compétition: </th></tr>'.
               '<tr> <td>' . htmlspecialchars($donnees['jour_de_la_partie']).
               '</td> <td>' . htmlspecialchars($donnees['id_Equipe1']).
               '</td> <td>' . htmlspecialchars($donnees['id_Equipe2']).
               '</td> <td>' . htmlspecialchars($donnees['point_Equipe1']).
               '</td> <td>' . htmlspecialchars($donnees['point_Equipe2']).
               '</td> <td>' . htmlspecialchars($donnees['Serie']).
                '</tr></table></p>';
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
?>