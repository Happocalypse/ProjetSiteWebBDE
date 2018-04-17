<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gestion des évenements</title>
        <link rel="stylesheet" href="CSS/gestionIE.css">
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>

        <h1 class="gestidees" >Gestion des évenements</h1>

        <?php
    include('script/connexionBDD.php');


        $readIdeas = $bdd->query('SELECT nom_evenement, description_evenement, date_evenement, valide, ID_evenement FROM evenements WHERE valide=1 ORDER BY date_evenement ASC');
        while( $idees = $readIdeas->fetch()){
        ?>
        <form method="post" action="script/scriptModifIdees.php" autocomplete="on">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 idees">
                    <div class="presentationI">
                        <label for="nomActivite">Nom de l'activité</label>
                        <input type="text" class="form-control" id="nomActivite" name="nomActivite" maxlength="100" Value="<?= $idees['nom_evenement']; ?>"/>
                        <label for="dateHeureActivite">Date et heure de l'activité</label>
                        <input type="text" class="form-control" id="dateHeureActivite" name="dateHeureActivite" maxlength="19" Value="<?= $idees['date_evenement']; ?>"/>
                        <label for="description">Description (255 caractères max)</label>
                        <textarea style="resize:none" class="form-control" id="description" name="description" maxlength="255"><?= $idees['description_evenement']; ?></textarea>

                        <input type='hidden' name="id_evenement" Value="<?= $idees['ID_evenement']; ?>"/>
                        <tr>
                            <td><button type="submit" class="btn btn-warning ADM" name="saveIdee">Enregistrer les changements</button></td>
                            <td><button class="btn btn-danger ADM droite" name="supprIdee">Suppression de l'évenement</button></td>
                        </tr>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>

        <?php   } $readIdeas->closeCursor();?>


        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
