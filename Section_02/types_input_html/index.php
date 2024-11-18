<!DOCTYPE html>

<html>

    <head>

        <title>Notre première instruction : echo</title>

        <meta charset="utf-8" />

    </head>

    <body>

        <h2>Affichage de texte avec PHP</h2>

        <p>

            Cette ligne a été écrite entièrement en HTML.<br />

            <?php echo "Celle-ci a été écrite entièrement en PHP."; ?> <br/>
			
			<a href="bonjour.php?nom=Pilon&amp;prenom=André">Dis-moi bonjour !</a>

		<p>

			Cette page ne contient que du HTML.<br />

			Veuillez taper votre prénom :

		</p>


		<form action="cible.php" method="post">

		<p>

			<input type="text" name="prenom" /><br />

			<textarea name="texte" rows="2" cols="25">Votre message ici.</textarea><br />
			<select name="choix">

				<option value="c1">Choix 1</option>

				<option value="c2" selected="selected">Choix 2</option>

				<option value="c3">Choix 3</option>

				<option value="c4">Choix 4</option>

			</select><br />
			<input type="checkbox" name="case" id="case" /> <label for="case">Ma case à cocher</label><br />
			Aimez-vous les frites ?

			<input type="radio" name="frites" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>

			<input type="radio" name="frites" value="non" id="non" /> <label for="non">Non</label><br />
			<input type="hidden" name="pseudo" value="blabla" />




			<input type="submit" value="Valider" />
		</p>

		</form>
        </p>

		
		
		
		
		
		
		
		
	<br /><br /><br /><br /><br /><br /><br /><br />
    </body>

	
	
	
	
	
	
	
	
	
</html>