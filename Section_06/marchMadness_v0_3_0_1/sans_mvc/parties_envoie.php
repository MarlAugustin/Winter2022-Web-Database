<?php
    try {
    // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=march_madness;charset=utf8', 'root', 'mysql',
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    }
    //ajout de la partie grâce à la requête
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
    
header('Location: index.php')            
 ?>  
<html>
    <body>
		<!-- Ce bout de code HTML peut-être réutilisé n'importe où au besoin ---
		--- Seule l'action de la balise Form ci-dessous doit être adaptée au contexte ---
		--- Notez la différence dans l'affichage de "print_r" et de "var_dump" ---
		--- elle est due à la présence de l'extension "xdebug" dans l'environnement php de Ampps (cf. phpinfo) ---
		--- sinon l'affichage serait identique --- 
		--- comme xdebug est souvent présent dans les environnements de développement PHP, "var_dump" est préféré -->
		<h2>Envoyer une partie</h2>
	     *** Pour déboguage ***<br />
		Voici le contenu de $_POST envoyé par le formulaire d'envoi et transmis à la requête : <br />
        <?php var_dump($_POST); ?>
        <?php // print_r($_POST); // décommentez pour comparer avec var_dump ?>
        <form action="index.php">
            <input type="submit" value="Continuer">
        </form>
    </body>     
</html>
