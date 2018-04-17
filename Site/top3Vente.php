<?php include'script/connexionBDD.php' ?>

<?php
    $reponse=$bdd->query('SELECT photos.url_image, produits.nom_produit,produits.description_produit,produits.prix_produit, SUM(quantite_vendu) AS quantite_vendu FROM produits INNER JOIN COMPORTER ON produits.ID_produit=COMPORTER.ID_produit INNER JOIN photos ON produits.ID_photo=photos.ID_photo GROUP BY COMPORTER.ID_produit ORDER BY quantite_vendu DESC LIMIT 0,3');
$data=$reponse->fetch();

        $urlTop1=$data[0];
        $nomTop1=$data[1];
        $descriptionTop1=$data[2];
        $prixTop1=$data[3];

$data=$reponse->fetch();

        $urlTop2=$data[0];
        $nomTop2=$data[1];
        $descriptionTop2=$data[2];
        $prixTop2=$data[3];

$data=$reponse->fetch();

        $urlTop3=$data[0];
        $nomTop3=$data[1];
        $descriptionTop3=$data[2];
        $prixTop3=$data[3];

   $reponse->closeCursor();

?>
