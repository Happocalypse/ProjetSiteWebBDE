<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/boutique.css">
    <title>Boutique</title>
    <?php include 'script/scriptBootStrapHead.php' ?>
</head>

<body>
    <?php include 'navbar.php' ?>
    <h1>Boutique</h1>
    <section>
        <article>
            <div id="shopCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#shopCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#shopCarousel" data-slide-to="1"></li>
                    <li data-target="#shopCarousel" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="images/slide1.jpg" alt="First slide">
                        <div class="carousel-caption">
                            <h3 class="h3-responsive">Light mask</h3>
                            <p>First text</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/slide2.jpg" alt="Second slide">
                        <div class="carousel-caption">
                            <h3 class="h3-responsive">Strong mask</h3>
                            <p>Secondary text</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/slide3.jpg" alt="Third slide">
                        <div class="carousel-caption">
                            <h3 class="h3-responsive">Slight mask</h3>
                            <p>Third text</p>
                        </div>
                    </div>
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#shopCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
                <a class="carousel-control-next" href="#shopCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
                <!--/.Controls-->
            </div>
        </article>
    </section>

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
        $reponse=$bdd->query('SELECT (ID_produit) FROM produits ORDER BY ID_produit Desc LIMIT 0,1');

        $data=$reponse->fetch();
        $reponse->closeCursor();
            if($data==NULL){

                echo "<br /><br /><br /><br /><br /><h1>Il n'y a pas de produit dans la base de données</h1>";

            }else{

                $nbLigneMax=5;
                $nombre=$data['ID_produit'];


                $nbLigne=$nombre/$nbLigneMax;

                $lastLigne = ceil($nbLigne);    /*Nombre de ligne totale (dernière ligne)*/

                $nbItemLastLigne=$nombre-($nbLigneMax * (floor($nbLigne))); /*nombre d'item sur la dernière ligne */

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
                                <h5 class="card-title"><?php echo $data['nom_produit'] ?></h5>
                                <p class="card-text"><?php echo $data['description_produit'] ?></p>
                                <button type="button" class="btn float-right btn-outline-primary" id="button_">Ajouter au panier</button>

                            </div>
                            <div class="card-footer"><?php echo $data['prix_produit'] ?>€</div>
                        </div>

                        <?php }?>

            </section>
            <?php }$reponse->closeCursor();?>


            <?php } ?>

            <?php include 'script/scriptBootStrapBody.php' ?>
</body>

</html>
