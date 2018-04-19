<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/photos.css">
        <title>Administration des photos et commentaires</title>
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>
    <header><?php include 'navbar.php' ?> </header>
    <body>
        <?php include('script/connexionBDD.php'); ?>
        <div style="display:flex;justify-content:center;">
            <a class="btn btn-primary" href="gestionPhoto.php" role="button">Administration des photos</a>
            <a class="btn btn-primary" href="gestionPhoto.php?page=commentaires" role="button">Administration des commentaires</a>
            </div>
        <?php

        if (isset($_GET['page']) and $_GET['page']=='commentaires'){

            $reponse=$bdd->query('SELECT commentaire, COMMENTER.ID_utilisateur, COMMENTER.ID_photo, utilisateurs.nom, utilisateurs.prenom, photos.url_image FROM COMMENTER INNER JOIN utilisateurs ON COMMENTER.ID_utilisateur = utilisateurs.ID_utilisateur INNER JOIN photos ON COMMENTER.ID_photo = photos.ID_photo');
            //$reponse=$bdd->query('SELECT commentaire, COMMENTER.ID_utilisateur, ID_photo, utilisateurs.nom, utilisateurs.prenom FROM COMMENTER INNER JOIN utilisateurs ON COMMENTER.ID_utilisateur = utilisateurs.ID_utilisateur');

            $data=$reponse->fetch();
            if($data==NULL){
                echo "<h1>Il n'y a pas de commentaire</h1>";
            }else{
                 ?>
                <div class="container-fluid">

                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Commentaires</th>
                                <th scope="col">Publiée par</th>
                                <th scope="col">Lien de la photo</th>
                                <th scope="col">Opérations</th>
                            </tr>
                            <?php do{ ?>
                             <form method="post" action="script/resultGestionPhoto.php">
                                <tr>
                                    <?php
                                    echo '<th scope="col"> <input class="form-control" type="text" name="commentaire" value="'.$data['commentaire'].'" /> </th>';
                                    echo '<th scope="col">'.$data['prenom'].' '.$data['nom'].'</th>';
                                    //echo '<th scope="col">'.$data['ID_photo'].'</th>';
                                    ?><th scope="col"><a href="http://localhost/Projet/Site/<?php echo $data['url_image']; ?>">Image</a></th>

                                    <th scope="col"><button type="submit" class="btn btn-secondary" name="editButtonComment">Editer</button>
                                    <button type="submit" class="btn btn-danger" name="deleteButtonComment">Supprimer</button></th>

                                    <?php
                                        echo '<input type="hidden" name="idPhotoComment" value='.$data['ID_photo'].' />';
                                        echo '<input type="hidden" name="idUserComment" value='.$data['ID_utilisateur'].' />';
                                    ?>

                                </tr>
                                </form>
                            <?php } while($data=$reponse->fetch()); $reponse->closeCursor(); ?>
                        </table>
                </div>
            <?php }

        }else{
            $reponse=$bdd->query('SELECT ID_photo, titre_photo, date_publication, url_image, evenements.nom_evenement, utilisateurs.nom, utilisateurs.prenom FROM photos INNER JOIN evenements ON photos.ID_evenement = evenements.ID_evenement INNER JOIN utilisateurs ON photos.ID_utilisateur= utilisateurs.ID_utilisateur');

            $data=$reponse->fetch();
            if($data==NULL){
                echo "<h1>Il n'y a pas de photo</h1>";
            }else{
                ?>
                <div class="container-fluid">

                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Titre photo</th>
                                <th scope="col">Date de publication</th>
                                <th scope="col">Lié à l'événement</th>
                                <th scope="col">Publiée par</th>
                                <th scope="col">Opérations</th>
                            </tr>
                            <?php do{ ?>
                             <form method="post" action="script/resultGestionPhoto.php">
                                <tr>
                                    <?php
                                    echo '<th scope="col"> <input class="form-control" type="text" name="titrePhoto" value="'.$data['titre_photo'].'"/> </th>';
                                    echo '<th scope="col">'.$data['date_publication'].'</th>';
                                    echo '<th scope="col">'.$data['nom_evenement'].'</th>';
                                    ?>

                                    <th scope="col"><p><?php echo $data['prenom'].' '.$data['nom'] ?></th>
                                    <th scope="col"><button type="submit" class="btn btn-secondary" name="editButton">Editer</button>
                                    <button type="submit" class="btn btn-danger" name="deleteButton">Supprimer</button></th>
                                    <?php
                                    echo '<input type="hidden" name="idPhoto" value='.$data['ID_photo'].' />';
                                    ?>

                                </tr>
                                </form>
                            <?php } while($data=$reponse->fetch()); $reponse->closeCursor(); ?>
                        </table>

                </div>
            <?php
            }

        }?>



    </body>
</html>
