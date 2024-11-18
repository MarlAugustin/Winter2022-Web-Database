<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Supprimer une partie</title>
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
        <?php
        //Connexion à la base de données
        try{
            $bdd= new PDO('mysql:host=localhost;dbname=march_madness;charset=utf8','root','mysql');
        } catch (Exception $ex) {
            die('Erreur :' .$e->getMessage());
        }
    //Récupération du match à supprimer
        $partie=$bdd->query('SELECT * FROM parties WHERE id = ' . $_GET['id']);
        
    //Affichage de la partie à supprimer
        $donnees=$partie->fetch();
        $partie->closeCursor();
        ?>
        
        <form action="parties_supprimer.php" method="post">
            <h2>Supprimer une partie</h2>
            <h3>Match numero <?php echo $donnees['id']; ?></h3>
            <table border="1">
                <tr>
                    <th>Date du Match:</th>
                    <th>Numero équipe 1:</th>
                    <th>Numero équipe 2:</th>
                    <th>Nombre de points équipe 1:</th>
                    <th>Nombre de points équipe 2:</th>
                    <th>Manche de la compétition:</th>
                </tr>
                <tr>
                    <td><?php echo htmlspecialchars($donnees['jour_de_la_partie']); ?></td>
                    <td><?php echo htmlspecialchars($donnees['id_Equipe1']); ?></td>
                    <td><?php echo htmlspecialchars($donnees['id_Equipe2']); ?></td>
                    <td><?php echo htmlspecialchars($donnees['point_Equipe1']); ?></td>
                    <td><?php echo htmlspecialchars($donnees['point_Equipe2']); ?></td>
                    <td><?php echo htmlspecialchars($donnees['Serie']); ?></td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php echo $donnees['id']; ?>" />
            <input type="submit" value="Supprimer" />
        </form>
        <form action="index.php" method="post">
            <input type="submit" value="Annuler" />
        </form>
    </body>
</html>