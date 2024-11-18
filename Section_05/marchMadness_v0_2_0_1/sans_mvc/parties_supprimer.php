<?php
// Connexion à la base de données
try{
    $bdd=new PDO('mysql:host=localhost;dbname=march_madness;charset=utf8','root','mysql');
} catch (Exception $ex) {
    die('Erreur :' . $e->getMessage());
}
//Suppressions de la partie
$req = $bdd->prepare('DELETE FROM parties WHERE id= ?');
$req->execute(array($_POST['id']));

header('Location: index.php') 
?>
<html>
    <body>
		<!-- Pour le débogage -->
	<h2>Supprimer une partie</h2>
        <form action="index.php">
	     *** Pour déboguage ***<br />
		Voici le contenu de $_POST envoyé par le formulaire d'envoi et transmis à la requête : <br />
        <?php var_dump($_POST); ?>
        <?php // print_r($_POST); // décommentez pour comparer avec var_dump ?>
            <input type="submit" value="Continuer">
        </form>
    </body>     
</html>
