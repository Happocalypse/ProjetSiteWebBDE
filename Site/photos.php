<!DOCTYPE html>
<html>
	<head>

		<meta charset="utf-8" />
		<link rel="stylesheet" href="CSS/photos.css">
		<title>Publication d'une photo</title>

	</head>
	<body>
	<?php include 'navbar.php' ?>
	<?php
		try
		{
			// On se connecte à MySQL
			$bdd = new PDO('mysql:host=178.62.4.64;dbname=SiteBDEG1','groupeMN','1234');
		}
		catch(Exception $e)
		{
			// En cas d'erreur, on affiche un message et on arrête tout
			die('Erreur : '.$e->getMessage());
		}

		// On récupère le contenu du champ nom_evenement
		$reponse = $bdd->query('SELECT (nom_evenement) FROM evenements WHERE valide=1');

	?>

		<?php if($donnees = $reponse->fetch()){ ?>

			<form method="post" action="script/result_add_photo.php" enctype="multipart/form-data">

			<p>Titre de la photo :
			<input type="text" name="title_image"/></p>

			<p> Veuillez choisir l'événement :
			<select name='choix'>

				<?php

				do {
				?>
					<option value="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom']; ?></option>

				<?php

				} while ($donnees = $reponse->fetch());

			// Termine le traitement de la requête
			$reponse->closeCursor();
			?>
			</select></p>

			<p>Pièce Jointe
			<input type="file" name="monfichier" /> <br />
			Format accepté : png, jpeg et jpg <br />
			Limite du fichier : 1 Mo
			</p>

			<input type="hidden" name="username" value="his_username" />
			<p><input type="submit" value="Publier" /> </p>

			</form>

		<?php
		}else{
			echo "<h1>Vous ne pouvez pas publier une photo car il n'y a pas d'événement.</h1>";
		}
	?>

	</body>
</html>
