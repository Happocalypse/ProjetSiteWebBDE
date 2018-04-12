<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/photos.css">
    <?php include 'script/scriptBootStrapHead.php' ?>
    <title>Album photo</title>

</head>
    <header><?php include 'navbar.php';?></header>

<body>

    <!-- Vérifier si l'utilisateur est membre du BDE -->
    <a href="addPhoto.php" class="btn btn-primary btn-lg" role="button" aria-disabled="true" id="buttonAjouter">Ajouter une photo</a>


    <?php include('script/connexionBDD.php');

    //TASK : MODIFIER ID_utilisateur
    $reponse=$bdd->query('SELECT (ID_evenement)FROM PARTICIPER WHERE ID_utilisateur=1');
    $data=$reponse->fetch();


        if($data==NULL){
            echo "<h1 class='my-4 text-center text-lg-left'>Il n'y a aucun événement</h1>";
        }else{

            $i=0;
            $nom_evenements=array();
            do{
                array_push($nom_evenements,$data['ID_evenement']);

            } while($data=$reponse->fetch());

            $reponse->closeCursor();
            ?><div class="container-fluid" style="float:left;"><?php

            for($index=0;$index<sizeof($nom_evenements);$index++){
                $reponse=$bdd->query('SELECT photos.ID_evenement, evenements.nom_evenement, photos.url_image, titre_photo FROM photos INNER JOIN evenements ON (photos.ID_evenement =
                evenements.ID_evenement) WHERE photos.ID_evenement ='.$nom_evenements[$index]);
                $data=$reponse->fetch();?>
        <h1><?php echo $data['nom_evenement']; ?></h1>

        <?php
                echo "<div class=\"row\">";



                if($data == NULL){
                        echo "Il y a aucune photo sur l'événénement.";
                    }else{
                        do{
                            ?>
                            <div class="col-s-5">
                            <div class="thumbnail">
                              <a href="<?php echo $data['url_image']; ?>">
                                <img src="<?php echo $data['url_image']; ?>" alt="<?php echo $data['titre_photo']; ?>" style="width:100%">
                              </a>
                            </div>
                          </div>

                         <?php
                        } while ($data=$reponse->fetch());
                        echo "</div>";
                    }

                $reponse->closeCursor();

            }


        }



    ?>

    </div>

        <?php include 'script/scriptBootStrapBody.php' ?>
</body>

</html>
