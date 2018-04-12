<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="">
    <?php include 'script/scriptBootStrapHead.php' ?>
    <script type="text/javascript" src=""></script>
    <title>TEST PANIER</title>
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#panier">
    <span>Panier</span>
    </button>


    <!-- Modal -->
    <div class="modal fade cart-modal" id="panier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Votre panier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                </div>
                <!--Body-->
                <div class="modal-body">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom du produit</th>
                                <th>Prix</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Product 1</td>
                                <td>100$</td>
                                <td><a class="text-center">X</a></td>
                            </tr>

                        </tbody>
                    </table>

                    <button class="btn btn-primary">Commander</button>

                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <?php include 'script/scriptBootStrapBody.php' ?>
</body>

</html>
