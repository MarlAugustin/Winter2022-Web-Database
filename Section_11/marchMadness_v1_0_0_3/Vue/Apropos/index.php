<?php $titre = 'À propos du site de Marlond Augustin'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>À propos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .size{
		display:flex;
		flex-direction:column;
                width: 500px;
                height: 300px;
	}
        </style>
    </head>
    <body>
        <h1>Marlond Augustin</h1>
        <p>420-4A4 MO Web et Bases de données.</p>
        <p>Hiver 2022, Collège Montmorency</p>

        <h3>Fonctionnement de l'application</h3>
        <p>L'association entre les 2 tables sont les numéro d'équipe et leur id.</p>
        <p>Les champs que j'ai valider se trouve dans la page d'ajout d'une équipe, ce sont les champs pour le rang et pour mettre le site qui se font valider.</p>
        <p>L'autocomplétion est utilisé pour le champ Lieu de la partie: lors de l'ajout ou de la modification d'une partie.</p>
        <p>Il y a trois langues offertes français, anglais et créole. Pour changer la langue il suffit de cliquer sur Français | English | Créole qui est situé au top-gauche.
           La deuxième expression traduite se situe dans la vueAcceuil. 
        </p>
        <h3>Démarrage d'une session et les opérations permises</h3>
        <p>Pour démarrer une session, il faut cliquer sur se connecter. Ensuite on remplit le champ pour le nom et le mot de passe et on clique sur connexion pour se connecter.
           Si le nom d'usager et le mot de passe est contenu dans le tableau, on se connecte. Sinon, on dit à la personne que son nom et son mot de passe sont incorrects. 
        </p>
        <p>Pour l'ajout d'une partie il suffit de cliquer sur [Ajouter une nouvelle partie] et de remplir les champs.</p>
        <p>Pour l'ajout d'une équipe,il faut d'abord cliquer sur "Afficher tous les équipes pouvant participer au tournoi". Il faut cliquer sur [Ajouter une équipe] et de remplir les champs.</p> 
        <p>Pour modifier ou supprimer une partie il suffit de cliquer sur [Modifier] ou [Supprimer]. Pour la partie qu'on souhaite changer ou effacer.</p>
        
        <h3>Relation entre les tables dans le tp3</h3>
        <p><img src="Contenu/Images/apropos/photo bd.png" alt="Photo bd" class="size" /></p>
        <h3>Inspiration pour la bd</h3>
        <p><img src="Contenu/Images/apropos/photo_bd_database.png" alt="Photo de Lexemple" class="size" /></p>
        <p><a href="http://www.databaseanswers.org/data_models/schools_sports_tournaments/index.htm">Lien vers le diagramme original</a></p>        
        <form action="index.php" method="post">
            <input type="submit" value="Retourner à la page d'acceuil" />
        </form>
    </body>
</html>
