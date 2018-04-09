<?php
// Test si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if(isset($_FILES['monfichier']['name']) AND $_FILES['monfichier']['error'] == 0){

    // Test la taille du fichier
    if($_FILES['monfichier']['size'] <= 15000000000){

        // Test si l'extension est autorisé
        $infosfichier=pathinfo($_FILES['monfichier']['name']);
        $extension_upload=$infosfichier['extension'];
        $extension_autorisees=array('jpg','jpeg','png');

        if(isset($_POST['username']) AND isset($_POST['titre_photo']) AND isset($_POST['choix'])){

            try
                {
                    // On se connecte à MySQL
                    $bdd = new PDO('mysql:host=localhost;dbname=bddphoto','root','');
                }
                catch(Exception $e)
                {
                    // En cas d'erreur, on affiche un message et on arrête tout
                    die('Erreur : '.$e->getMessage());
                }

            // On récupère le contenu du champ nom_evenement
                $reponse=$bdd->query('SELECT (ID_photo) FROM photos ORDER BY ID_photo Desc LIMIT 0,1');

                if($donnees = $reponse->fetch()){
                    $donnees['ID_photo']++;
                }
                $reponse->closeCursor();

            $today=date("Y-m-d H:i:s");
            echo $today;

            //$sql = "INSERT INTO photos (titre_photo, url_image, ID_utilisateur, ID_evenement) VALUES ('".$_POST["titre_photo"]."','".$donnees['ID_photo'] . '.' . $extension_upload."',".(int)$_POST['username'].",".(int)$_POST['username'].")";
            $sql = "INSERT INTO photos (titre_photo,date_publication, url_image, ID_utilisateur, ID_evenement) VALUES ('".$_POST["titre_photo"]."','". $today ."','".$donnees['ID_photo'] . '.' . $extension_upload."',".(int)$_POST['username'].",".(int)$_POST['username'].")";


            $bdd->exec($sql);

            echo $_POST["titre_photo"];
            echo 'Nom utilisateur : ' . (int)$_POST['username'] .'<br />';
            echo 'Titre de l\'image : ' .$donnees['ID_photo'] . '.' . $extension_upload.'<br />';
            echo 'Nom événement : ' .$_POST['choix'].'<br />';


        }
            if(in_array($extension_upload, $extension_autorisees)){

                // Création automatique du répertoire
                if (!file_exists("../uploads/")) {
                    mkdir("../uploads/", 0777, true);
                }


                // Validation du fichier et stockage définitif sur le serveur à l'adresse uploads/
                move_uploaded_file($_FILES['monfichier']['tmp_name'],'../uploads/' . $donnees['ID_photo'] . '.' . $extension_upload);
                echo "L'envoi a bien été effectué <br />";
            }
    }
}

?>
