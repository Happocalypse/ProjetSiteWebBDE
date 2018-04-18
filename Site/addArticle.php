<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" href="CSS/article.css">
        <?php include 'script/scriptBootStrapHead.php' ?>
        <title>Publication d'un article</title>

    </head>

    <header><?php include 'navbar.php';?></header>
    <body>

        <div class="container" id="placement">
        <h1>Formulaire publication article</h1>
        <form method="post" action="resultArticle.php" enctype="multipart/form-data">

        <div class="form-group">
            <label for="nomProduit">Nom produit :</label>
            <input class="form-control" type="text" name="nomProduit" id="nomProduit"/>
        </div>

        <div class="form-group">
        <label for="descriptionProduit">Description du produit : </label>
        <textarea class="form-control" rows="5" id="descriptionProduit" name="descriptionProduit"></textarea>
        </div>

        <div class="form-group">
        <label for="categorie_">Catégorie : </label>
        <input class="form-control" type="number" id="categorie_" name="categorie_" min="1" max="3" placeholder="1 = vêtement ; 2 = goodies ; 3 = nourriture"/>
        </div>

        <div class="form-group">
        <label for="prixProduit">Prix :</label>
        <input class="form-control" type="number" name="prixProduit" id="prixProduit"/>
        </div>

        <div class="form-group">
            <label for="piecejointe">Pièce Jointe :</label>
            <input class="form-control" type="file" name="monfichier" id="piecejointe" />
            <label for="piecejointe">Format accepté : png, jpeg et jpg</label>
        </div>
        <!-- TASK : Changer 1 par le nom de l'utilisateur -->
        <input type="hidden" name="username" value=1 />
        <button type="submit" class="btn btn-default">Publier</button>

        </form>
        </div>

        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
