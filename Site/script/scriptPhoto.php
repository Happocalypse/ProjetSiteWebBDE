<?php
session_start();
include('connexionBDD.php');

    if(isset($_SESSION['id'])) {

            // Stockage du like lié à une photo dans la BDD
            if(isset($_POST['likeButton']) and isset($_POST['idPhoto']) )
            {
                $reponse=$bdd->query('SELECT (ID_photo) FROM AIMER WHERE ID_utilisateur='.$_SESSION['id'].' and ID_photo='.$_POST['idPhoto'].' LIMIT 0,1');
                $data=$reponse->fetch();
                    if($data==NULL){
                        $sql = 'INSERT INTO AIMER (ID_utilisateur, ID_photo) VALUES ('.$_SESSION['id'].','.$_POST['idPhoto'].')';
                        $bdd->exec($sql);
                    }else{
                        $sql='DELETE FROM AIMER WHERE ID_utilisateur='.$_SESSION['id'].' AND ID_photo='.$_POST['idPhoto'];
                        $bdd->exec($sql);
                    }
                 $reponse->closeCursor();
            }
            // Fermeture pour permettre d'être de nouveau exécutée



                // Stockage du commentaire lié à une photo dans la BDD
                if(isset($_POST['sendButton']) and isset($_POST['idPhotoComment']) and isset($_POST['comment']) )
                {
                    $sql = 'INSERT INTO COMMENTER (commentaire, ID_utilisateur, ID_photo) VALUES ("'.$_POST['comment'].'",'.$_SESSION['id'].','.$_POST['idPhotoComment'].')';
                    $bdd->exec($sql);
                }
        }
header("Location: ../photos.php");
exit;
?>
