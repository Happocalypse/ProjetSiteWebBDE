<?php

$reponse=$bdd->query('SELECT produits.ID_produit,  `nom_produit` , photos.url_image,  `description_produit` ,  `prix_produit`  FROM  `produits`  INNER JOIN photos WHERE photos.ID_photo = produits.ID_photo ORDER BY prix_produit');

?>
