<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/boiteAIdees.css">
        <title>Boite à Idées</title>
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>

    <body>
        <?php include 'navbar.php' ?>

        <h1 class="BAI" >Boite à Idées</h1>
        <div align="center">
            <a class="prop" href="boiteAIdeesProp.php">Proposez vos idées</a><br /><br />
        </div>




        <?php
    include('script/connexionBDD.php');

        if(isset($_SESSION['id'])) {
            //Vérifier si l'utilisateur est membre du BDE
            if($_SESSION['groupe']==2){
        ?>
        <a href="gestionIdees.php" class="btn btn-primary btn-lg" role="button" aria-disabled="true" id="gestionIdees">Administrer les idées</a><br /><br /><br />


        <?php
            }}
        $readIdeas = $bdd->query('SELECT nom_evenement, description_evenement, date_evenement, ID_evenement FROM evenements WHERE valide=0 ORDER BY date_evenement ASC');
        while( $idees = $readIdeas->fetch()){

        ?>


        <form method="post" action="script/scriptevote.php" >
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 idees">
                    <div class="presentationI">
                        <h1><?= $idees['nom_evenement']; ?></h1>
                        <p>Idée proposée le : <?= $idees['date_evenement']; ?></p>
                    </div>
                    <p class="descriptionI">
                        <?= $idees['description_evenement']; ?> </p>

                    <input type='hidden' name="id_evenement" value="<?= $idees['ID_evenement']; ?>"/>

                    <button type="submit" class="btn btn-primary">Voter pour cette idée !</button>
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>

        <?php   } $readIdeas->closeCursor();?>

        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
