<?php
session_start();
include 'connexionBDD.php';


if(isset($_POST['saveIdee'])){
    if(isset($_POST['valide'])){
        $valide = $_POST['valide'];
    }else{
        $valide=1;
    }

    $nom_evenement = $_POST['nomActivite'];
    $description_evenement = $_POST['description'];
    $date_evenement = $_POST['dateHeureActivite'];
    $id_evenement = $_POST['id_evenement'];


    $majIdees= $bdd->prepare("UPDATE evenements SET nom_evenement= :nom_evenement , description_evenement= :description_evenement , date_evenement= :date_evenement, valide= :valide WHERE ID_evenement= :id_evenement");
    $majIdees->bindValue(':nom_evenement',$nom_evenement,PDO::PARAM_STR);
    $majIdees->bindValue(':description_evenement',$description_evenement,PDO::PARAM_STR);
    $majIdees->bindValue(':date_evenement',$date_evenement,PDO::PARAM_STR);
    $majIdees->bindValue(':id_evenement',$id_evenement,PDO::PARAM_INT);
    $majIdees->bindValue(':valide',$valide,PDO::PARAM_INT);
    $majIdees->execute();
}

if(isset($_POST['supprIdee'])){

    $id_event = $_POST['id_evenement'];


    $suppr = $bdd->prepare("DELETE FROM VOTER WHERE ID_evenement = :id_event");
    $suppr->bindValue(':id_event',$id_event,PDO::PARAM_INT);
    $suppr->execute();
    $suppr2 = $bdd->prepare("DELETE FROM PARTICIPER WHERE ID_evenement = :id_event");
    $suppr2->bindValue(':id_event',$id_event,PDO::PARAM_INT);
    $suppr2->execute();
    $suppr3 = $bdd->prepare("DELETE FROM evenements WHERE ID_evenement = :id_event");
    $suppr3->bindValue(':id_event',$id_event,PDO::PARAM_INT);
    $suppr3->execute();


}
header("Location: ../evenements.php");
exit;
?>
