<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/evenements.css">
        <title>Evenement</title>
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <h1 class="E">Evenements</h1>






        <?php
    include('script/connexionBDD.php');

        $readIdeas = $bdd->query('SELECT nom_evenement, description_evenement, date_evenement FROM evenements WHERE valide=1');
        while( $ideas = $readIdeas->fetch()){

        ?>


        <form>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 event">
<div class="presentation">
                    <h1><?php echo $ideas['nom_evenement']; ?></h1>

                    <p class="dateE">Evenement proposée le : <?php echo $ideas['date_evenement']; ?></p>
</div>
                    <p class="descriptionE">
                        <?php echo $ideas['description_evenement']; ?> </p>

                </div>
                <div class="col-md-2"></div>
            </div>
        </form>



        <?php   } $readIdeas->closeCursor();?>
        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
