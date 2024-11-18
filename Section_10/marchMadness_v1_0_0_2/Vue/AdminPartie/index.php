<?php $titre = 'Liste de matchs March Madness'; ?>
<p><a href="AdminPartie/Ajout/">[Ajouter une nouvelle partie]</a></p>
<p data-i18n="Bienvenue">Je vous souhaite la bienvenue sur ce modeste site.</p>

<?php foreach ($donnees as $donnee) :?>
    <?php if ($donnee['efface'] == '0') : ?>
    <?php
    // On récupère tout le contenu de la table parties
    // On affiche chaque entrée une à une
    //devrais ajouter les noms des équipes?
    echo '<p>'
            . '<a href="AdminPartie/Modifier/' .
            $donnee['id'] . 
            '">[Modifier]' .
            '<a href="AdminPartie/Confirmer/' .
            $donnee['id'] . 
            '">[Supprimer]</a> <strong>   Match numero  ' .
            htmlspecialchars($donnee['id'])  .
            ': </strong></br> <table border=' . 1 .'"><tr><th>Date du Match  </th>' .
           '<th>Numero équipe 1  </th>'.
           '<th>Numero équipe 2  </th>'.    
           '<th>Nombre de points équipe 1  </th>'.
           '<th>Nombre de points équipe 2  </th>'.
           '<th>Manche de la compétition </th>'.
           '<th>Lieu de la partie </th></tr>'.
           '<tr> <td>' . htmlspecialchars($donnee['jour_de_la_partie']).
           '</td> <td> <a href="Equipe/Equipe/' . htmlspecialchars($donnee['id_Equipe1']). '">'. htmlspecialchars($donnee[9]['nom']).'</a>'.
               '</td> <td> <a href="Equipe/Equipe/' . htmlspecialchars($donnee['id_Equipe2']). '">'. htmlspecialchars($donnee[10]['nom']).'</a>'.
           '</td> <td>' . htmlspecialchars($donnee['point_Equipe1']).
           '</td> <td>' . htmlspecialchars($donnee['point_Equipe2']).
           '</td> <td>' . htmlspecialchars($donnee['Serie']).
           '</td> <td>' . htmlspecialchars($donnee['Ville']).
            '</tr></table></p>';
            ?>
    <?php else : ?>
    <?php
    // On récupère tout le contenu de la table parties
    // On affiche chaque entrée une à une
    //devrais ajouter les noms des équipes?
    echo '<p>'
            . 
            '<a href="AdminPartie/Retablir/' .
            $donnee['id'] . 
            '">[Retablir]</a> <strong>   Match numero  ' .
            htmlspecialchars($donnee['id'])  .
            ': </strong></br> <table border=' . 1 .'"><tr><th>Date du Match  </th>' .
           '<th>Numero équipe 1  </th>'.
           '<th>Numero équipe 2  </th>'.    
           '<th>Nombre de points équipe 1  </th>'.
           '<th>Nombre de points équipe 2  </th>'.
           '<th>Manche de la compétition </th>'.
           '<th>Lieu de la partie </th></tr>'.
           '<tr> <td>' . htmlspecialchars($donnee['jour_de_la_partie']).
           '</td> <td> <a href="Equipe/Equipe/' . htmlspecialchars($donnee['id_Equipe1']). '">'. htmlspecialchars($donnee[9]['nom']).'</a>'.
               '</td> <td> <a href="Equipe/Equipe/' . htmlspecialchars($donnee['id_Equipe2']). '">'. htmlspecialchars($donnee[10]['nom']).'</a>'.
           '</td> <td>' . htmlspecialchars($donnee['point_Equipe1']).
           '</td> <td>' . htmlspecialchars($donnee['point_Equipe2']).
           '</td> <td>' . htmlspecialchars($donnee['Serie']).
           '</td> <td>' . htmlspecialchars($donnee['Ville']).
            '</tr></table></p>';
            ?>
    <?php endif; ?>
<?php endforeach; ?>
