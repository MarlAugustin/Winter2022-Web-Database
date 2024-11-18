<?php $titre = "Ajouter une nouvelle Equipe"; ?>
<?php ob_start(); ?>
<form action="index.php?action=ajoutEquipe" method="post" />
            <h2>Ajouter une nouvelle Equipe</h2>

            <p>                           
                <label for="nom">Nom de votre équipe</label> :  <input type="text" name="nom" id="nom" /><br />
                <label for="rang">rang de votre équipe</label> :  <input type="number" name="rang" id="rang" />
                <!-- faut tester la validation normalement on mettrait number-->
                <?= ($erreur == 'rang') ? '<span style="color : red;">Entrez un rang valide s.v.p.</span>' : '' ?> 
                <br/>
                <label for="site">site de votre équipe</label> :  <input type="url" name="site" id="site" />
                <?= ($erreur == 'site') ? '<span style="color : red;">Entrez un site valide s.v.p.</span>' : '' ?> 
                <br/>
                <input type="submit" value="Ajouter" />
            </p>                     
    </form>
    <form action="index.php" method="post">
        <input type="submit" value="Annuler" />
    </form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>