<?php $titre = "Supprimer parties  - " . $partie['id']; ?>
<form action="AdminPartie/supprimer/" method="post">
            <h2>Supprimer une partie</h2>
            <h3>Match numero <?php echo $partie['id']; ?></h3>
            <table border="1">
                <tr>
                    <th>Date du Match:</th>
                    <th>Numero équipe 1:</th>
                    <th>Numero équipe 2:</th>
                    <th>Nombre de points équipe 1:</th>
                    <th>Nombre de points équipe 2:</th>
                    <th>Manche de la compétition:</th>
                    <th>Lieu de la partie :</th>
                </tr>
                <tr>
                    <td><?php echo htmlspecialchars($partie['jour_de_la_partie']); ?></td>
                    <td><?php echo htmlspecialchars($partie['id_Equipe1']); ?></td>
                    <td><?php echo htmlspecialchars($partie['id_Equipe2']); ?></td>
                    <td><?php echo htmlspecialchars($partie['point_Equipe1']); ?></td>
                    <td><?php echo htmlspecialchars($partie['point_Equipe2']); ?></td>
                    <td><?php echo htmlspecialchars($partie['Serie']); ?></td>
                    <td><?php echo htmlspecialchars($partie['Ville']); ?></td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php echo $partie['id']; ?>" />
            <input type="submit" value="Supprimer" />
        </form>
        <form action="index.php" method="post">
            <input type="submit" value="Annuler" />
        </form>
