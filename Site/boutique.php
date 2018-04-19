<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/boutique.css">
    <link rel="stylesheet" href="CSS/editButton.css">
    <link rel="stylesheet" href="CSS/panier.css">
    <title>Boutique</title>
    <?php include 'script/scriptBootStrapHead.php' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>
    <?php include 'navbar.php' ?>
	    <!-- Vérifier si l'utilisateur est membre du BDE -->
    <?php include 'script/connexionBDD.php';
    if(isset($_SESSION['id'])) {

            if($_SESSION['groupe']==2){
                ?>

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

                    <!-- Left and right carousel controls -->
                    <a class="carousel-control-prev" href="#shopCarousel" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
                    <a class="carousel-control-next" href="#shopCarousel" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

                </div>
            </article>

            <div id="categorieCard">
                <?php include 'panier.php' ?>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                    Trier par :
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="boutique.php">Défaut</a>
                        <a class="dropdown-item" href="boutique.php?categorie=croissant">Prix croissant</a>
                        <a class="dropdown-item" href="boutique.php?categorie=decroissant">Prix décroissant</a>
                        <a class="dropdown-item" href="boutique.php?categorie=categorie">Catégorie</a>
                    </div>
                </div>
            </div>
        </section>

        <?php

        if (isset($_GET['categorie'])){
            if ($_GET['categorie']=='croissant'){
                $reponse=$bdd->query('SELECT produits.ID_produit, `nom_produit` , photos.url_image, `description_produit` , `prix_produit`  FROM `produits` INNER JOIN photos ORDER BY prix_produit');

            }if ($_GET['categorie']=='decroissant'){
                $reponse=$bdd->query('SELECT produits.ID_produit, `nom_produit` , photos.url_image, `description_produit` , `prix_produit`  FROM `produits` INNER JOIN photos ORDER BY prix_produit DESC');
            }

            if ($_GET['categorie']=='categorie'){
                $reponse=$bdd->query('SELECT produits.ID_produit,  `nom_produit` , photos.url_image, `description_produit` , `prix_produit` , `ID_evenement` FROM  `produits`  INNER JOIN photos ORDER BY ID_categorie');
        }

        }else{
            $reponse=$bdd->query('SELECT produits.ID_produit,  `nom_produit` , photos.url_image, `description_produit` , `prix_produit` FROM `produits` INNER JOIN photos ON produits.ID_photo= photos.ID_photo');

        }

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
             ?>
                        <div class="col-s-5">
                            <div class="card">
                                <img class="card-img-top" src="<?php echo $data['url_image'] ?>" alt="Product Card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $data['nom_produit'] ?>
                                    </h5>
                                    <p class="card-text text-justify">
                                        <?php echo $data['description_produit'] ?>
                                    </p>

                                    <?php if(isset($_SESSION['id'])){  ?>

                                    <form method="post" action="script/resultBoutique.php">
                                        <?php echo '<input type="hidden" name="idProduit" value='.$data['ID_produit'].' />' ?>
                                        <button type="submit" name="submitPanier" class="btn float-right btn-outline-primary">Ajouter au panier</button>
                                    </form>

                                    <?php }  ?>

                                </div>
                                <div class="card-footer text-right">
                                    <?php echo $data['prix_produit'] ?> €
                                </div>
                            </div>
                        </div>


        	<?php }while($data=$reponse->fetch());
         	$reponse->closeCursor();
         	} ?>
                </div>
            </div>


        <?php include 'script/scriptBootStrapBody.php' ?>

    <?php include 'footer.php' ?>
</body>

</html>
