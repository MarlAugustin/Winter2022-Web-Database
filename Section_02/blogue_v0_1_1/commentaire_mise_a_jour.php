<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=blogue_v0_0_1;charset=utf8', 'root', 'mysql');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Insertion du commentaire à l'aide d'une requête préparée
$req = $bdd->prepare('UPDATE commentaires SET auteur = ?, titre = ?, texte = ? WHERE id = ?');
$req->execute(array($_POST['auteur'], $_POST['titre'], $_POST['texte'], $_POST['id']));

// Redirection du visiteur vers la page d'accueil du Blogue
// Mettre en commentaire pour déboguer
 header('Location: index.php');
?>
<!-- Pour déboguage -->
<html>
    <body>
		<h2>Mettre à jour un commentaire V0.1.1</h2>
        <form action="index.php">
            *** Pour déboguage ***<br />
            Voici le contenu de $_POST envoyé par le formulaire de modification et transmis à la requête : <br />
            <?php var_dump($_POST); ?>
            <input type="submit" value="Continuer">
        </form>
    </body>     
</html>
