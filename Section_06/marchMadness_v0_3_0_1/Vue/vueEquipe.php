<?php $titre = "Équipe  - " . $equipe['id']; ?>
<?php ob_start(); ?>
        <p>Nom de l'équipe: <?= $equipe['nom'] ?></p>
        <p>Classement de l'équipe: <?= $equipe['rang'] ?></p>
        <p>Site de l'équipe: <?= $equipe['site'] ?></p>
        <h2>Liste de parties jouées: </h2>
        <?php foreach ($donnees as $donnee):
                // On récupère tout le contenu de la table parties
                // On affiche chaque entrée une à une
                //devrais ajouter les noms des équipes?
                echo '<p>'
                        . 
                        ' <strong>   Match numero  ' .
                        htmlspecialchars($donnee['id'])  .
                        ': </strong></br> <table border=' . 1 .'"><tr><th>Date du Match  </th>' .
                       '<th>Numero équipe 1  </th>'.
                       '<th>Numero équipe 2  </th>'.    
                       '<th>Nombre de points équipe 1  </th>'.
                       '<th>Nombre de points équipe 2  </th>'.
                       '<th>Manche de la compétition </th>'.
                       '<th>Lieu de la partie </th></tr>'.
                        '<tr> <td>' . htmlspecialchars($donnee['jour_de_la_partie']).
                       '</td> <td> <a href="index.php?action=Equipe&id=' . htmlspecialchars($donnee['id_Equipe1']). '">'. htmlspecialchars($donnee['id_Equipe1']).'</a>'.
                       '</td> <td> <a href=index.php?action=Equipe&id=' . htmlspecialchars($donnee['id_Equipe2']). '">'. htmlspecialchars($donnee['id_Equipe2']).'</a>'.
                       '</td> <td>' . htmlspecialchars($donnee['point_Equipe1']).
                       '</td> <td>' . htmlspecialchars($donnee['point_Equipe2']).
                       '</td> <td>' . htmlspecialchars($donnee['Serie']).
                       '</td> <td>' . htmlspecialchars($donnee['Ville']).
                        '</tr></table></p>';
                ?><?php endforeach; ?>
            <form action="index.php" method="post">
            <input type="submit" value="Retourner à la page d'acceuil" />
        </form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>