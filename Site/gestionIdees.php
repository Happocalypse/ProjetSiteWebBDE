<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gestion des Idées</title>
        <link rel="stylesheet" href="CSS/gestionIdees.css">
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>

        <h1 class="gestidees" >Gestion des Idées</h1>

        <?php
    include('script/connexionBDD.php');


        $readIdeas = $bdd->query('SELECT nom_evenement, description_evenement, date_evenement, ID_evenement FROM evenements WHERE valide=0 ORDER BY date_evenement ASC');
        while( $ideas = $readIdeas->fetch()){
        ?>
        <form method="post" action="script/scriptModifIdees.php" autocomplete="on">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 idees">
                    <div class="presentationI">
                        <input type="text" class="form-control" id="nomActivite" name="nomActivite" maxlength="100" Value="<?= $ideas['nom_evenement']; ?>"/>

                        <input type="text" class="form-control" id="dateHeureActivite" name="dateHeureActivite" maxlength="19" Value="<?= $ideas['date_evenement']; ?>"/>

                        <textarea style="resize:none" class="form-control" id="description" name="description" maxlength="255"><?= $ideas['description_evenement']; ?></textarea>

                        <input type='hidden' name="id_evenement" Value="<?= $ideas['ID_evenement']; ?>"/>

                        <button type="submit" class="btn btn-warning">Valider</button>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>

        <?php   } $readIdeas->closeCursor();?>


        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
