<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Modifier un commentaire</title>
    </head>
    <style>
        form
        {
            text-align:center;
        }
    </style>
    <body>


        <?php
// Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=blogue_v0_0_1;charset=utf8', 'root', 'mysql');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

// Récupération du commentaire à modifier
//$reponse = $bdd->query('SELECT * FROM Commentaires WHERE id = ' . $_GET['id']);
        try {
			$req = $bdd->prepare('SELECT * FROM commentaires WHERE id = ?');
			$req->execute(array($_GET['id']));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
// Affichage du commentaire à modifer (toutes les données externes sont protégées par htmlspecialchars)
        $donnees = $req->fetch();
        $req->closeCursor();
        ?>

        <form action="commentaire_mise_a_jour.php" method="post">
			<h2>Modifier un commentaire V0.1.1</h2>
			<p>
                <label for="auteur">Auteur</label> : <input type="text" name="auteur" id="auteur" value="<?php echo htmlspecialchars($donnees['auteur']); ?>" /><br />
                <label for="titre">Titre</label> :  <input type="text" name="titre" id="titre" value="<?php echo htmlspecialchars($donnees['titre']); ?>" /><br />
				<label for="texte">Commentaire</label> :  <textarea type="text" name="texte" id="texte" ><?php echo htmlspecialchars($donnees['texte']); ?></textarea><br />
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                <input type="submit" value="Modifier" />
            </p>
        </form>
    </body>
</html>



