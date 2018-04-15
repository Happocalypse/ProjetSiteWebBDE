<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/boiteAIdees.css">
        <title>Staff</title>
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

        $readIdeas = $bdd->query('SELECT nom_evenement, description_evenement, date_evenement FROM evenements WHERE valide=0');
        while( $ideas = $readIdeas->fetch()){

        ?>


        <form>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 idees">

                    <h1><?php echo $ideas['nom_evenement']; ?></h1>

                    <p class="date">Idée proposée le : <?php echo $ideas['date_evenement']; ?></p>

                    <p class="description">
                        <?php echo $ideas['description_evenement']; ?> </p>

                </div>
                <div class="col-md-2"></div>
            </div>
        </form>



        <?php   } $readIdeas->closeCursor();?>

        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
