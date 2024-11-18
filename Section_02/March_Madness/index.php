<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Envoi de parties</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
<h2>Progression du tournoi march Madness</h2>
<p><a href="parties_nouvelle.php">ajouter une nouvelle partie</a></p>
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
    $id=1;
    while ($donnees = $reponse->fetch()) {
        //devrais ajouter les noms des équipes?
        echo '<p>'
                . '<a href="parties_modifier.php?id=' .
                $donnees['id'] . 
                '">[Modifier] </a> <strong> Match numero  ' .
                htmlspecialchars($donnees['id'])  .  ': </strong></br> Date du match :' .
                htmlspecialchars($donnees['jour_de_la_partie']).  '</br> Numero de la première équipe :' .
                htmlspecialchars($donnees['id_Equipe1'])  .  '</br> Numero de la deuxième équipe :' .
                htmlspecialchars($donnees['id_Equipe2']) .   '</br> Nombre de point de la première équipe :' .
                htmlspecialchars($donnees['point_Equipe1']) .  '</br> Nombre de point de la deuxième équipe :' .
                htmlspecialchars($donnees['point_Equipe2']) .  '</br> Manche de la compétition :' .
                htmlspecialchars($donnees['Serie']) 
                    
                 
                . '</p>';
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
?>