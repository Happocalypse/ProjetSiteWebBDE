<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/boutique.css">
    <link rel="stylesheet" href="CSS/editButton.css">
    <title>Boutique</title>
    <?php include 'script/scriptBootStrapHead.php' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
    <?php include 'navbar.php' ?>
    <?php include 'script/connexionBDD.php';
    if(isset($_SESSION['id'])) {

            if($_SESSION['groupe']==2){
                ?>
    <!-- Vérifier si l'utilisateur est membre du BDE -->
    <?php include 'editButton.php'?>
    <?php
            }
        }
    ?>
        <?php include 'top3Vente.php';?>

        <section>

            <article>
                <div id="shopCarousel" class="carousel slide" data-ride="carousel">

                    <ul class="carousel-indicators">
                        <li data-target="#shopCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#shopCarousel" data-slide-to="1"></li>
                        <li data-target="#shopCarousel" data-slide-to="2"></li>
                    </ul>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo $urlTop1 ?>" alt="Slide1">
                            <div class="carousel-caption">
                                <h3>
                                    <?php echo $nomTop1 ?>
                                </h3>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $urlTop2 ?>" alt="Slide2">
                            <div class="carousel-caption">
                                <h3>
                                    <?php echo $nomTop2 ?>
                                </h3>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $urlTop3 ?>" alt="Slide3">
                            <div class="carousel-caption">
                                <h3>
                                    <?php echo $nomTop3 ?>
                                </h3>
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

                $reponse=$bdd->query('SELECT `nom_produit`, `image_produit`, `description_produit`, `prix_produit`, `ID_produit` FROM `produits`');
                $data=$reponse->fetch();

             if($data==NULL){
                echo '<h1>Il n\'y a pas de produit dans la base de donnée.</h1>';
             }

            else

            { ?>
            <div class="container-fluid">
            <div class="row">
                <?php
            do{

//                echo '<pre>'.print_r($data).'</pre>';
             ?>



                <div class="col-s-5">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo $data['image_produit'] ?>" alt="Product Card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $data['nom_produit'] ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $data['description_produit'] ?>
                            </p>
                            <button type="button" class="btn float-right btn-outline-primary" id="button_ajout_panier">Ajouter au panier</button>

                        </div>
                        <div class="card-footer">
                            <?php echo $data['prix_produit'] ?>€
                        </div>
                    </div>
                </div>


        <?php }while($data=$reponse->fetch()); ?>
        <?php } ?>
            </div>
        </div>

        <?php include 'script/scriptBootStrapBody.php' ?>
</body>

</html>
