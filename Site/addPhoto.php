<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" href="CSS/photos.css">
        <?php include 'script/scriptBootStrapHead.php' ?>
        <title>Publication d'une photo</title>
        <?php include('script/validateForm.php'); ?>

    </head>

    <header><?php include 'navbar.php';?></header>
    <body>
        <?php
        include ('script/connexionBDD.php');

        // On récupère le contenu du champ nom_evenement
        // TASK : Optimiser le SELECT, Et que l'événément est outdate
        date_default_timezone_set('Europe/Paris');
        $today = date("Y-m-d H:i:s");
        $reponse=$bdd->query('SELECT * FROM PARTICIPER INNER JOIN evenements ON PARTICIPER.ID_evenement = evenements .ID_evenement WHERE evenements.valide=\'1\' AND (evenements.date_evenement) <= "'.$today.'" AND PARTICIPER.ID_utilisateur='.$_SESSION['id'].' ORDER BY evenements.date_evenement DESC');
        ?>

        <?php if($donnees = $reponse->fetch()){ ?>

        <div class="container" id="placement">
        <h1>Formulaire publication photo</h1>
        <form method="post" action="resultPhoto.php" enctype="multipart/form-data" onsubmit="return validateForm('une image')">

        <div class="form-group">
            <label for="titre_photo">Titre de l'image</label>
            <input class="form-control" type="text" name="titre_photo" id="titre_photo"/>
        </div>

        <div class="form-group">
            <label for="evenement">Veuillez choisir l'événement :</label>
            <select class="form-control" id="evenement" name='choix'>
                <?php
                do {
                ?>
                    <option value="<?php echo $donnees['ID_evenement']; ?>"><?php echo $donnees['nom_evenement']; ?></option>
                <?php
                } while ($donnees = $reponse->fetch());

            // Termine le traitement de la requête
            $reponse->closeCursor();
            ?>
            </select>
        </div>

        <div class="form-group">
            <label for="piecejointe">Pièce Jointe :</label>
            <input class="form-control" type="file" name="monfichier" id="piecejointe" />
            <label for="piecejointe">Format accepté : png, jpeg et jpg <br />
            Limite du fichier : 15 Mo</label>
        </div>
        <button type="submit" class="btn btn-default">Publier</button>

        </form>
        </div>

        <?php
        }else{
            echo "<h1>Vous ne pouvez pas publier une photo car il n'y a pas d'événement.</h1>";
        }
        ?>

        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
