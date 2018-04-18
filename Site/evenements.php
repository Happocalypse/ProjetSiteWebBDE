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

        if(isset($_SESSION['id'])) {
            //Vérifier si l'utilisateur est membre du BDE
            if($_SESSION['groupe']==2){
        ?>
        <a href="gestionEvenement.php" class="btn btn-primary btn-lg" role="button" aria-disabled="true" id="gestionEvenement">Administrer les évenements</a><br /><br /><br />


        <?php }}
        include('script/connexionBDD.php');

        $readIdeas = $bdd->query('SELECT nom_evenement, description_evenement, date_evenement, ID_evenement FROM evenements WHERE valide=1 ORDER BY date_evenement ASC');
        while($idees = $readIdeas->fetch()){

        ?>


        <form method="post" action="script/scriptvoteE.php">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 event">
                    <div class="presentation">
                        <h1><?php echo $idees['nom_evenement']; ?></h1>

                        <p class="dateE">Evenement proposée le : <?php echo $idees['date_evenement']; ?></p>
                    </div>
                    <p class="descriptionE"><?= $idees['description_evenement']; ?> </p>
                    <input type='hidden' name="id_evenement" value="<?= $idees['ID_evenement']; ?>"/>
                    <?php
            if(isset($_SESSION['id'])) {

                $nbParticiper=$bdd->query( 'SELECT COUNT( ID_evenement ) AS nbParticiper FROM PARTICIPER WHERE ID_evenement='.$idees['ID_evenement']);
                $participer = $nbParticiper->fetch();

                    ?>
                    <button type="submit" class="btn btn-primary">Participé à l'évenement ! <span class="badge badge-light"> <?= $participer['nbParticiper'] ?> </span></button>
                    <?php } ?>
                </div>
                <div class="col-md-2"></div>
            </div>
        </form>



        <?php   } $readIdeas->closeCursor();?>
        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
