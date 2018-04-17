<div class="container">
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Mon panier
  </button>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Mon panier</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Produit</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <?php $reponse=$bdd->query('SELECT nom_produit, quantite, prix_produit, produits.ID_produit FROM PANIER INNER JOIN produits WHERE PANIER.ID_produit = produits.ID_produit');
                        $data=$reponse->fetch();


 if($data==NULL){
        echo '<h1>Votre panier est vide.</h1>';
         }else{?>

                        <?php   }do{?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $data['nom_produit'] ?>
                                </td>
                                <td>
                                    <?php echo $data['quantite'] ?>
                                </td>
                                <td>
                                    <?php echo $data['prix_produit'] ?>
                                </td>
                                <td>
                                    <form method="post" action="script/resultPanier.php">
                                        <?php echo '<input type="hidden" name="idProduit" value='.$data['ID_produit'].' />' ?>
                                        <button type="submit" name="DeletePanier" class="btn"><img src="images/delete.svg" /></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        <?php }while($data=$reponse->fetch());
                        $reponse->closeCursor(); ?>



                    </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                        <form method="post" action="script/resultValiderCommande.php">
                            <button name="validerCommande" type="submit" class="btn btn-primary">Valider le panier</button>
                        </form>

                </div>

            </div>
        </div>
    </div>

</div>
