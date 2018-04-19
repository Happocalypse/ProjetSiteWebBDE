<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/article.css">
        <title>Editer ou modifier des articles</title>
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>
    <header><?php include 'navbar.php' ?> </header>
    <body>
        <?php include('script/connexionBDD.php'); ?>

        <?php

        if(isset($_POST['editButton']) and isset($_POST['idProduit']))
        {
            $sql = 'UPDATE produits SET nom_produit="'.$_POST['nomProduit'].'", description_produit="'.$_POST['descriptionProduit'].'", prix_produit="'.$_POST['prixProduit'].'" WHERE ID_produit='.$_POST['idProduit'];

            $bdd->exec($sql);
        }
        if(isset($_POST['deleteButton'])){
try{

			$sql='DELETE FROM photos WHERE ID_photo='.$_POST['idPhoto'];
			$bdd->exec($sql);
//
//            $sql='DELETE FROM COMPORTER WHERE ID_produit='.$_POST['idProduit'];
//            $bdd->exec($sql);
//
            $sql='DELETE FROM produits WHERE ID_produit ='.$_POST['idProduit'];
            $bdd->exec($sql);
//
//            $slq='DELETE FROM PANIER WHERE ID_produit='.$_POST['idProduit'];
//            $bdd->exec($sql);


}catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}


        }

        $reponse=$bdd->query('SELECT ID_produit, nom_produit, description_produit, prix_produit, photos.ID_photo FROM produits INNER JOIN photos ON produits.ID_photo = photos.ID_photo');
        $data=$reponse->fetch();
            if($data==NULL){
                echo "<h1>Il n'y a pas de produit dans la boutique</h1>";
            }else{
                ?>
                <div class="container-fluid">

                        <table class="table table-striped">
                            <tr>
                                <th scope="col">Nom du produit</th>
                                <th scope="col">Description du produit</th>
                                <th scope="col">Prix du produit</th>
                                <th scope="col">Opérations</th>
                            </tr>
                            <?php do{ ?>
                             <form method="post" action="">
                                <tr>
                                    <?php
                                    echo '<th scope="col"> <input class="form-control" type="text" name="nomProduit" value="'.$data['nom_produit'].'"/> </th>';
                                    echo '<th scope="col"><textarea class="form-control"  name="descriptionProduit">'.$data['description_produit'].'</textarea></th>';
                                    echo '<th scope="col"> <input class="form-control" type="number" name="prixProduit" value='.$data['prix_produit'].' /> </th>';


                                    ?>

                                    <th scope="col"><button type="submit" class="btn btn-secondary" name="editButton">Editer</button>
                                    <button type="submit" class="btn btn-danger" name="deleteButton">Supprimer</button></th>
                                    <?php
                                    echo '<input type="hidden" name="idProduit" value='.$data['ID_produit'].' />';
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
