<?php $titre = "Équipe  - " . $equipe['id']; ?>
<?php ob_start(); ?>
        <p>Nom de l'équipe: <?= $equipe['nom'] ?></p>
        <p>Classement de l'équipe: <?= $equipe['rang'] ?></p>
        <form action="index.php" method="post">
            <input type="submit" value="Retourner à la page d'acceuil" />
        </form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'gabarit.php'; ?>