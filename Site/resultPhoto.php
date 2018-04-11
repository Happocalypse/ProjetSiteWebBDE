<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" href="CSS/photos.css">
        <meta http-equiv="refresh" content="10; URL=photos.php">
        <?php include 'script/scriptBootStrapHead.php' ?>
        <title>Publication d'une photo</title>

    </head>
    <header><?php include 'navbar.php';?></header>
    <body>
       <?php
// Test si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if(isset($_FILES['monfichier']['name']) AND $_FILES['monfichier']['error'] == 0){

    // Test la taille du fichier
    if($_FILES['monfichier']['size'] <= 15000000){

        // Test si l'extension est autorisé
        $infosfichier=pathinfo($_FILES['monfichier']['name']);
        $extension_upload=$infosfichier['extension'];
        $extension_autorisees=array('jpg','jpeg','png');

        if(isset($_POST['username']) AND isset($_POST['titre_photo']) AND isset($_POST['choix'])){

            include('script/connexionBDD.php');
            // On récupère le contenu du champ nom_evenement
                $reponse=$bdd->query('SELECT (ID_photo) FROM photos ORDER BY ID_photo Desc LIMIT 0,1');

                if($donnees = $reponse->fetch()){
                    $donnees['ID_photo']++;
                }
                else{
                    $donnees['ID_photo']=1;
                }
                $reponse->closeCursor();

            $today=date("Y-m-d H:i:s");

            $sql = "INSERT INTO photos (titre_photo, date_publication, url_image, ID_utilisateur, ID_evenement) VALUES ('".$_POST["titre_photo"]."','". $today ."','".'uploads/'.$donnees['ID_photo'] . '.' . $extension_upload."',".(int)$_POST['username'].",".(int)$_POST['choix'].")";

            $bdd->exec($sql);


        }
            if(in_array($extension_upload, $extension_autorisees)){

                // Création automatique du répertoire
                if (!file_exists("uploads")) {
                    mkdir("uploads", 0777, true);
                }


                // Validation du fichier et stockage définitif sur le serveur à l'adresse uploads/
                move_uploaded_file($_FILES['monfichier']['tmp_name'],'uploads/' . $donnees['ID_photo'] . '.' . $extension_upload);
                echo "<h1>L'envoi a bien été effectué</h1>
                <p>Redirection automatique dans 10s ou <a href='photos.php'>cliquez ici</a></p>";
            }
    }
}

?>


        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
