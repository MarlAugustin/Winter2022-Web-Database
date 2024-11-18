<?php $titre = 'Liste de matchs March Madness'; ?>
<p><a href="index.php?action=ajouter">[Ajouter une nouvelle partie]</a></p>
<p>Je vous souhaite la bienvenue sur ce modeste site.</p>
<p><a href="A_propos.html">[À propos] </a></p>
<?php foreach ($donnees as $donnee):
        // On récupère tout le contenu de la table parties
        // On affiche chaque entrée une à une
        //devrais ajouter les noms des équipes?
        echo '<p>'
                . '<a href="index.php?action=afficherModifier&id=' .
                $donnee['id'] . 
                '">[Modifier]' .
                '<a href="index.php?action=confirmer&id=' .
                $donnee['id'] . 
                '">[Supprimer]</a> <strong>   Match numero  ' .
                htmlspecialchars($donnee['id'])  .
                ': </strong></br> <table border=' . 1 .'"><tr><th>Date du Match : </th>' .
               '<th>Numero équipe 1 : </th>'.
               '<th>Numero équipe 2 : </th>'.    
               '<th>Nombre de points équipe 1 : </th>'.
               '<th>Nombre de points équipe 2 : </th>'.
               '<th>Manche de la compétition: </th></tr>'.
                '<tr> <td>' . htmlspecialchars($donnee['jour_de_la_partie']).
               '</td> <td> <a href="index.php?action=Equipe&id=' . htmlspecialchars($donnee['id_Equipe1']). '">'. htmlspecialchars($donnee['id_Equipe1']).'</a>'.
               '</td> <td> <a href=index.php?action=Equipe&id=' . htmlspecialchars($donnee['id_Equipe2']). '">'. htmlspecialchars($donnee['id_Equipe2']).'</a>'.
               '</td> <td>' . htmlspecialchars($donnee['point_Equipe1']).
               '</td> <td>' . htmlspecialchars($donnee['point_Equipe2']).
               '</td> <td>' . htmlspecialchars($donnee['Serie']).
                '</tr></table></p>';
                ?>
    
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>