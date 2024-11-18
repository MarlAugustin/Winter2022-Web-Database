<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Envoi de commentaires</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>

    <form action="commentaire_envoyer.php" method="post">
		<h2>Ajouter un commentaire V0.1.1</h2>
        <p>
        <label for="auteur">Auteur</label> : <input type="text" name="auteur" id="auteur" /><br />
        <label for="titre">Titre</label> :  <input type="text" name="titre" id="titre" /><br />
        <label for="texte">Commentaire</label> :  <textarea type="text" name="texte" id="texte" >Écrivez votre commentaire ici</textarea><br />
        <input type="hidden" name="article_id" value="1" /><br />
        <input type="submit" value="Envoyer" />
	</p>
    </form>

<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blogue_v0_0_1;charset=utf8', 'root', 'mysql');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers commentaires
$reponse = $bdd->query('SELECT * FROM commentaires ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque commentaire (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><a href="commentaire_modifier.php?id=' . $donnees['id'] . '">[modifier]</a> <strong>' . 
		htmlspecialchars($donnees['auteur']) . 
		'</strong> (' . 
		$donnees['date'] . ') : <em>' . 
		htmlspecialchars($donnees['titre']) . '</em>, ' . 
		htmlspecialchars($donnees['texte']) . 
		'</p>';
}

$reponse->closeCursor();

?>
    </body>
</html>

