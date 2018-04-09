<?php
// Test si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if(isset($_FILES['monfichier']['name']) AND $_FILES['monfichier']['error'] == 0){

    // Test la taille du fichier
    if($_FILES['monfichier']['size'] <= 15000000000){

        // Test si l'extension est autorisé
        $infosfichier=pathinfo($_FILES['monfichier']['name']);
        $extension_upload=$infosfichier['extension'];
        $extension_autorisees=array('jpg','jpeg','png');

        if(in_array($extension_upload, $extension_autorisees)){

            // Validation du fichier et stockage définitif sur le serveur à l'adresse uploads/
            move_uploaded_file($_FILES['monfichier']['tmp_name'],'uploads/'.basename($_FILES['monfichier']['name']));
            echo "L'envoi a bien été effectué <br />";
        }
        // Vérifie si le transfert des données
        if(isset($_POST['username']) AND isset($_POST['title_image']) AND isset($_POST['choix'])){
            echo 'Nom utilisateur : ' . $_POST['username'] .'<br />';
            echo 'Titre de l\'image : ' .$_POST['title_image'].'<br />';
            echo 'Nom événement : ' .$_POST['choix'].'<br />';
        }
    }
}

?>
