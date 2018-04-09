<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" href="CSS/photos.css">
        <?php include 'script/scriptBootStrapHead.php' ?>
        <title>Publication d'une photo</title>

    </head>
    <body>



        <?php
        try
        {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=bddphoto','root','');
        }
        catch(Exception $e)
        {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
        }

            // On récupère le contenu du champ nom_evenement
            $reponse = $bdd->query('SELECT * FROM evenements');

        ?>

        <?php if($donnees = $reponse->fetch()){ ?>

            <form method="post" action="script/result_add_photo.php" enctype="multipart/form-data">
            <br /><br /><br /><br />

            <p>Titre de la photo :
            <input type="text" name="titre_photo"/></p>

            <p> Veuillez choisir l'événement :
            <select name='choix'>
            <?php
            do {
            ?>
                <option value="<?php echo $donnees['ID_evenement']; ?>"><?php echo $donnees['nom_evenement']; ?></option>
            <?php
            } while ($donnees = $reponse->fetch());

            // Termine le traitement de la requête
            $reponse->closeCursor();
            ?>
            </select></p>

            <p>Pièce Jointe
            <input type="file" name="monfichier" /> <br />
            Format accepté : png, jpeg et jpg <br />
            Limite du fichier : 15 Mo
            </p>

            <input type="hidden" name="username" value=1 />
            <p><input type="submit" value="Publier" /> </p>

            </form>

        <?php
        }else{
            echo "<br/><br /><br /><h1>Vous ne pouvez pas publier une photo car il n'y a pas d'événement.</h1>";
        }
        ?>

        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
