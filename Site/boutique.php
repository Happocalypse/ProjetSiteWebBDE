<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/boutique.css">
    <link rel="stylesheet" href="CSS/editButton.css">
    <title>Boutique</title>
    <?php include 'script/scriptBootStrapHead.php' ?>
</head>

<body>
    <?php include 'script/connexionBDD.php' ?>
    <?php include 'navbar.php' ?>

    <?php include('editButton.php');?>
    <?php include('top3Vente.php');?>

    <section>

        <article>
            <div id="shopCarousel" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#shopCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#shopCarousel" data-slide-to="1"></li>
                    <li data-target="#shopCarousel" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo "../".$urlTop1 ?>" alt="Los Angeles">
                        <div class="carousel-caption">
                            <h3><?php echo $nomTop1 ?></h3>
                            <!-- <p><?php echo $descriptionTop1 ?></p> -->
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo "../".$urlTop2 ?>" alt="Chicago">
                        <div class="carousel-caption">
                            <h3><?php echo $nomTop2 ?></h3>
                            <!-- <p><?php echo $descriptionTop2 ?></p> -->
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo "../".$urlTop3 ?>" alt="New York">
                        <div class="carousel-caption">
                            <h3><?php echo $nomTop3 ?></h3>
                            <!-- <p><?php echo $descriptionTop3 ?></p> -->
                        </div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#shopCarousel" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
                <a class="carousel-control-next" href="#shopCarousel" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

            </div>
        </article>
    </section>


    <?php
        // On récupère le contenu du champ nom_evenement
        $reponse=$bdd->query('SELECT (ID_produit) FROM produits ');

        $data=$reponse->fetch();


            if($data==NULL){

                echo "<br /><br /><br /><br /><br /><h1>Il n'y a pas de produit dans la base de données</h1>";

            }else{

                $nbTotalProduits=0;

                do{
                    $nbTotalProduits++;

                } while($data=$reponse->fetch());

                $reponse->closeCursor();
                $nbLigneMax=5;

                $nbLigne=$nbTotalProduits/$nbLigneMax;

                $lastLigne = ceil($nbLigne);    /*Nombre de ligne totale (dernière ligne)*/

                $nbItemLastLigne=$nbTotalProduits-($nbLigneMax * (floor($nbLigne))); /*nombre d'item sur la dernière ligne */

                echo '<br /> Nombre d\'item sur la '.$lastLigne .'ème ligne : ' . $nbItemLastLigne;

                    if($nbItemLastLigne==0){
                        $nbItemLastLigne=5;
                    }
    ?>

        <?php
                $reponse=$bdd->query('SELECT `nom_produit`, `image_produit`, `description_produit`, `prix_produit` FROM `produits`');

                for($ligne=1;$ligne<=$lastLigne;$ligne++){?>
            <section id="flex_card">
                <?php

                        if($ligne == $lastLigne){
                            $nbLigneMax=$nbItemLastLigne;
                        }
                    ?>
                    <?php
                    for($colonne=0;$colonne<$nbLigneMax;$colonne++){
                            $data=$reponse->fetch();?>
                        <div class="card">
                            <img class="card-img-top" src="images/pull.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $data['nom_produit'] ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $data['description_produit'] ?>
                                </p>
                                <button type="button" class="btn float-right btn-outline-primary" id="button_">Ajouter au panier</button>

                            </div>
                            <div class="card-footer">
                                <?php echo $data['prix_produit'] ?>€</div>
                        </div>

                        <?php }?>
            </section>
            <?php }$reponse->closeCursor();?>


            <?php } ?>

            <?php include 'script/scriptBootStrapBody.php' ?>
</body>

</html>
