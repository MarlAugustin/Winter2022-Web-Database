<?php $titre = 'Liste de matchs March Madness'; ?>
<!-- <p><a href="Equipe/index/">[Listes des équipes]</a></p>-->

<p data-i18n="Bienvenue">Je vous souhaite la bienvenue sur ce modeste site.</p>

<?php foreach ($donnees as $donnee):
        // On récupère tout le contenu de la table parties
        // On affiche chaque entrée une à une
        echo '<p>'
                .
               '<table border=' . 1 .'"><tr><th>Date du Match  </th>' .
               '<th>Nom de l\'équipe 1  </th>'.
               '<th>Nom de l\'équipe 2  </th>'.    
               '<th>Nombre de points équipe 1  </th>'.
               '<th>Nombre de points équipe 2  </th>'.
               '<th>Manche de la compétition </th>'.
               '<th>Lieu de la partie </th></tr>'.
                '<tr> <td>' . htmlspecialchars($donnee['jour_de_la_partie']).
               '</td> <td> <a href="Equipe/Equipe/' . htmlspecialchars($donnee['id_Equipe1']). '">'. htmlspecialchars($donnee[8]['nom']).'</a>'.
               '</td> <td> <a href="Equipe/Equipe/' . htmlspecialchars($donnee['id_Equipe2']). '">'. htmlspecialchars($donnee[9]['nom']).'</a>'.
               '</td> <td>' . htmlspecialchars($donnee['point_Equipe1']).
               '</td> <td>' . htmlspecialchars($donnee['point_Equipe2']).
               '</td> <td>' . htmlspecialchars($donnee['Serie']).
               '</td> <td>' . htmlspecialchars($donnee['Ville']).
                '</tr></table></p>';
                ?>
    
<?php endforeach; ?>
