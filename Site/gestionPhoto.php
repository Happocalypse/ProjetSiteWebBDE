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

        <?php

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
                                    echo '<th scope="col"> <input class="form-control" type="text" name="datePublication" value="'.$data['date_publication'].'" /></th>';
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
            } ?>

    </body>
</html>
