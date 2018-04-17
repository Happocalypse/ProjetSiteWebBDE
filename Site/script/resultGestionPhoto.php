<?php
include('connexionBDD.php');

if(isset($_POST['idPhoto']) and isset($_POST['titrePhoto']) and isset($_POST['datePublication']) and isset($_POST['editButton'])){

            $sql = 'UPDATE photos SET titre_photo="'.$_POST['titrePhoto'].'" WHERE ID_photo='.$_POST['idPhoto'];
            $bdd->exec($sql);

}

if(isset($_POST['deleteButton']) and isset($_POST['idPhoto']))
{
    $sql = 'DELETE FROM photos WHERE ID_photo='.$_POST['idPhoto'];

    $bdd->exec($sql);
}

header('Location: ../gestionPhoto.php');
exit;
?>
