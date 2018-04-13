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
    <?php include('script/connexionBDD.php');

    // TASK : Faire un inner join pour récupérer le nom du groupe au lieu de l'ID du groupe
        if(isset($_SESSION['id'])) {

            if($_SESSION['groupe']=1 or $_SESSION['groupe']=2){
                ?>
                 <!-- Vérifier si l'utilisateur est membre du BDE -->
                <a href="addPhoto.php" class="btn btn-primary btn-lg" role="button" aria-disabled="true" id="buttonAjouter">Ajouter une photo</a>
                <?php
            }
            if(isset($_POST['SubmitButton']))
            {
                // TASK : Ne pas oublier ajouter ID de l'image
                $sql = 'INSERT INTO LIKER (ID_utilisateur, ID_evenement) VALUES ('.(int)$_POST['idUtilisateur'].','.(int)$_POST['idEvenement'].')';

            $bdd->exec($sql);
            }

        }
    ?>

    <?php

    $reponse=$bdd->query('SELECT (ID_evenement)FROM evenements WHERE valide=\'1\' ORDER BY date_evenement DESC');
    $data=$reponse->fetch();


        if($data==NULL){
            echo "<h1 class='my-4 text-center text-lg-left'>Il n'y a aucun événement</h1>";
        }else{

            // Déclation d'un tableau qui contiendra l'ID des événements
            $nom_evenements=array();

                // Ajout des événements dans le tableau $nom_evenements
                do{
                    array_push($nom_evenements,$data['ID_evenement']);

                } while($data=$reponse->fetch());

            $reponse->closeCursor();
            ?>

            <div class="container-fluid" style="float:left;">
            <?php

                for($index=0;$index<sizeof($nom_evenements);$index++){
                    $reponse=$bdd->query('SELECT photos.ID_evenement, evenements.nom_evenement, photos.url_image, titre_photo FROM photos INNER JOIN evenements ON (photos.ID_evenement =
                    evenements.ID_evenement) WHERE photos.ID_evenement ='.$nom_evenements[$index]);
                    $data=$reponse->fetch();
                    ?>
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
                                    <div class="caption">
                                        <form method="post" action=''>
                                            <?php
                                                if(isset($_SESSION['id']) and isset($data['ID_evenement']) ) {
                                                    echo '<input type=hidden name="idUtilisateur" value='.$_SESSION['id'].' />';
                                                    echo '<input type=hidden name="idEvenement" value='.$data['ID_evenement'].' />';
                                                }
                                            ?>
                                            <!-- TASK : Réservé le bouton téléchargement aux membres du groupe 'CESI' -->
                                            <a style="float:right;" download="custom-filename.jpg" href="<?php echo $data['url_image'] ?>" title="Téléchargement de l'image">
                                                <img src="https://icon-icons.com/icons2/692/PNG/32/seo-social-web-network-internet_12_icon-icons.com_61498.png" alt="" style="width:70%" />
                                                <!-- TASK : Afficher le nombre de like -->


                                            </a>
                                            <button style="float:left;" type="submit" class="btn btn-link" name="SubmitButton"><img src="https://icon-icons.com/icons2/909/PNG/32/thumb-up_icon-icons.com_70845.png" alt="" style="width:70%" /></button>
                                        </form>
                                    </div>
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
