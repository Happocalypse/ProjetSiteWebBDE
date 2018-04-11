<?php

        try
        {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=178.62.4.64;dbname=Projet_BDE','groupeMN','1234');
        }
        catch(Exception $e)
        {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
        }
    $reponse=$bdd->query('SELECT `nom_produit`, `image_produit`, `description_produit`, `prix_produit`, `quantite_produit` FROM `produits`');

    $data=$reponse->fetch();
    $reponse->closeCursor();
echo "<pre>";
print_r($data);
echo "</pre>";

?>
