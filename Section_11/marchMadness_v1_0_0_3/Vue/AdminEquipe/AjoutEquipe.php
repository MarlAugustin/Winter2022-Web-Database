<?php $titre = "Ajouter une nouvelle Equipe"; ?>
<form action="AdminEquipe/ajouter" method="post" enctype="multipart/form-data" />
            <h2>Ajouter une nouvelle Equipe</h2>

            <p>                           
                <label for="nom">Nom de l'équipe</label> :  <input type="text" name="nom" id="nom" /><br />
                <label for="rang">rang de l'équipe</label> :  <input type="number" name="rang" id="rang" />
                <!-- faut tester la validation normalement on mettrait number-->
                <?= ($erreur == 'rang') ? '<span style="color : red;">Entrez un rang valide s.v.p.</span>' : '' ?> 
                <br/>
                <label for="site">site de l'équipe</label> :  <input type="url" name="site" id="site" />
                <?= ($erreur == 'site') ? '<span style="color : red;">Entrez un site valide s.v.p.</span>' : '' ?> 
                <br/>
                <label for="image">Logo de l'équipe</label> :  <input type="file" name="image" id="image" />
                <br/>
                <input type="submit" value="Ajouter" />
            </p>                     
    </form>
    <form action="index.php" method="post">
        <input type="submit" value="Annuler" />
    </form>
