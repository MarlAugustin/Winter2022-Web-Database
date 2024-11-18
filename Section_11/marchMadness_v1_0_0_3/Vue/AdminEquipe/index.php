<?php $titre = 'Liste des équipes du March Madness'; ?>
<p><a href="AdminPartie/index/">[Listes des parties]</a></p>
<p><a href="AdminEquipe/AjoutEquipe/">[Ajouter une équipe]</a></p>
<p data-i18n="Bienvenue">Je vous souhaite la bienvenue sur ce modeste site.</p>

<?php foreach ($equipes as $equipe):
        // On récupère tout le contenu de la table parties
        // On affiche chaque entrée une à une
        //devrais ajouter les noms des équipes?
        echo '<p>'
                . ' <strong>   Equipe numero  ' .
                    htmlspecialchars($equipe['id'])  .
               '<table border=' . 1 .'"><tr><th>Nom: </th>' .
               '<th>Classement:  </th>'.    
               '<th>Site web </th></tr>'.
                '<tr> <td><a href="Equipe/Equipe/' . htmlspecialchars($equipe['id']). '">'. htmlspecialchars($equipe['nom']). '</a>'.
               '</td> <td>' . htmlspecialchars($equipe['rang']).
               '</td> <td>' . htmlspecialchars($equipe['site']).
                '</tr></table></p>';
                ?>
<?php endforeach; ?>
<form action="index.php" method="post">
            <input type="submit" value="Retourner à la page d'acceuil" />
</form>