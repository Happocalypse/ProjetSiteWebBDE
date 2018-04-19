<?php
include('connexionBDD.php');
session_start();

// Partie photo
if(isset($_POST['idPhoto']) and isset($_POST['titrePhoto']) and isset($_POST['editButton'])){

    $_POST['titrePhoto']=htmlspecialchars($_POST['titrePhoto']);

    $sql = 'UPDATE photos SET titre_photo="'.$_POST['titrePhoto'].'" WHERE ID_photo='.$_POST['idPhoto'];
    $bdd->exec($sql);

}

if(isset($_POST['deleteButton']) and isset($_POST['idPhoto']))
{
    $sql = 'DELETE FROM photos WHERE ID_photo='.$_POST['idPhoto'];
    $bdd->exec($sql);
}

// Partie commentaire

if(isset($_POST['editButtonComment']) and isset($_POST['commentaire']) and isset($_POST['idPhotoComment'])and isset($_POST['idUserComment'])){

    $_POST['commentaire']=htmlspecialchars($_POST['commentaire']);

    $sql = 'UPDATE COMMENTER SET commentaire="'.$_POST['commentaire'].'" WHERE ID_utilisateur='.$_POST['idUserComment'].' AND ID_photo='.$_POST['idPhotoComment'];
    $bdd->exec($sql);

}

if(isset($_POST['deleteButtonComment']) and isset($_POST['idPhotoComment'])and isset($_POST['idUserComment']))
{
    $sql = 'DELETE FROM COMMENTER WHERE ID_utilisateur='.$_POST['idUserComment'].' AND ID_photo='.$_POST['idPhotoComment'];
    $bdd->exec($sql);
}


header('Location: ../gestionPhoto.php');
exit;
?>
