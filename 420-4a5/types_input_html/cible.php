<!DOCTYPE html>

<html>

    <head>

        <title>Récupération avec POST</title>

        <meta charset="utf-8" />

    </head>

    <body>
		<p>Bonjour !</p>


		<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles <?php echo $_POST['prenom']; ?> !</p>


		<p>Si tu veux changer de prénom, <a href="index.php">clique ici</a> pour revenir à la page formulaire.php.</p>
		<p> Voici ton message : <?php echo $_POST['texte']; ?>
		<p> Voici ton choix : <?php echo $_POST['choix']; ?>
		
		<p> Voici ta case : 
		<?php 
			$caseacocher = (isset($_POST['case'])) ? 'vrai' : 'faux';
			echo $caseacocher; 
		?>
		<p> Aimes-tu les frites? : <?php echo $_POST['frites']; ?>
		<p> La valeur cachée : <?php echo $_POST['pseudo']; ?>

	<br /><br /><br /><br /><br /><br /><br /><br />
		</body>

		
		
		
		
		
		
		
		
</html>