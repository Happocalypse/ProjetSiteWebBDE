     <?php
include 'connexionBDD.php';

   if(isset($_POST['editButton']) and isset($_POST['idProduit']))
        {
            $sql = 'UPDATE produits SET nom_produit="'.$_POST['nomProduit'].'", description_produit="'.$_POST['descriptionProduit'].'", prix_produit="'.$_POST['prixProduit'].'" WHERE ID_produit='.$_POST['idProduit'];

            $bdd->exec($sql);
        }
        if(isset($_POST['deleteButton']) and isset($_POST['idProduit']) and isset($_POST['idPhoto'])){
try{

            $sql='DELETE FROM produits WHERE ID_produit ='.$_POST['idProduit'];
            $bdd->exec($sql);

            $sql='DELETE FROM  `Projet_BDE_Final`.`photos` WHERE  `photos`.`ID_photo` ='.$_POST['idPhoto'];
			$bdd->exec($sql);

            $sql='DELETE FROM COMPORTER WHERE ID_produit='.$_POST['idProduit'];
            $bdd->exec($sql);

            $slq='DELETE FROM PANIER WHERE ID_produit='.$_POST['idProduit'];
            $bdd->exec($sql);


}catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
        }


header('Location: ../editDelArticle.php');

?>
