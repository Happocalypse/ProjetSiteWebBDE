<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="CSS/photos.css">
        <meta http-equiv="refresh" content="10; URL=boutique.php">
        <?php include 'script/scriptBootStrapHead.php' ?>
        <title>Publication d'un article</title>
    </head>
    <header><?php include 'navbar.php';?></header>
    <body>
       <?php
// Test si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if(isset($_FILES['monfichier']['name']) and $_FILES['monfichier']['error'] == 0){

        // Test si l'extension est autorisé
        $infosfichier=pathinfo($_FILES['monfichier']['name']);
        $extension_upload=$infosfichier['extension'];
        $extension_autorisees=array('jpg','jpeg','png');

        if(isset($_POST['nomProduit']) and isset($_POST['prixProduit']) and isset($_POST['descriptionProduit']) and isset($_POST['categorie'])){

            include('script/connexionBDD.php');

            $_POST['nomProduit']=htmlspecialchars($_POST['nomProduit']);
            $_POST['prixProduit']=htmlspecialchars($_POST['prixProduit']);
            $_POST['descriptionProduit']=htmlspecialchars($_POST['descriptionProduit']);
            $_POST['categorie']=htmlspecialchars($_POST['categorie']);

            // On récupère le contenu du champ nom_evenement
            $reponse=$bdd->query('SELECT (ID_photo) FROM photos ORDER BY ID_photo Desc LIMIT 0,1');

                if($donnees = $reponse->fetch()){
					//TASK - FAIRE UN TRUC MIEUX\\
                    $donnees['ID_photo']++;
                }
                else{
                    $donnees['ID_photo']=1;
                }
            $reponse->closeCursor();

            $today=date("Y-m-d H:i:s");

            $sql = "INSERT INTO photos (titre_photo, date_publication, url_image, ID_utilisateur) VALUES ('".$_POST["nomProduit"]."','". $today ."','".'uploads_articles/'.$donnees['ID_photo'] . '.' . $extension_upload."',".$_SESSION['id'].")";
            $bdd->exec($sql);

            $sql = "INSERT INTO produits (nom_produit, description_produit, prix_produit, ID_categorie , ID_photo) VALUES ('".$_POST["nomProduit"]."','".$_POST["descriptionProduit"]."',". (int)$_POST['prixProduit'].",". (int)$_POST['categorie'].",". $donnees['ID_photo'] .")";

            $bdd->exec($sql);

        }
            if(in_array($extension_upload, $extension_autorisees)){

                // Création automatique du répertoire
                if (!file_exists("uploads_articles")) {
                    mkdir("uploads_articles", 0777, true);
                }
                // Validation du fichier et stockage définitif sur le serveur à l'adresse uploads/
                move_uploaded_file($_FILES['monfichier']['tmp_name'],'uploads_articles/' . $donnees['ID_photo'] . '.' . $extension_upload);
                echo "<h1>L'article a bien été ajouté</h1>
                <p>Redirection automatique dans 10s ou <a href='boutique.php'>cliquez ici</a></p>";
            }
}
?>
        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
