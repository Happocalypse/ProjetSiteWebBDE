<?php
session_start();
include 'connexionBDD.php';

$nom_evenement = $_POST['nomActivite'];
$description_evenement = $_POST['description'];
$date_evenement = $_POST['dateHeureActivite'];
$id_evenement = $_POST['id_evenement'];


$majIdees= $bdd->prepare("UPDATE evenements SET nom_evenement= :nom_evenement , description_evenement= :description_evenement , date_evenement= :date_evenement WHERE ID_evenement= :id_evenement");
$majIdees->bindValue(':nom_evenement',$nom_evenement,PDO::PARAM_STR);
$majIdees->bindValue(':description_evenement',$description_evenement,PDO::PARAM_STR);
$majIdees->bindValue(':date_evenement',$date_evenement,PDO::PARAM_STR);
$majIdees->bindValue(':id_evenement',$id_evenement,PDO::PARAM_INT);
$majIdees->execute();


header("Location: ../boiteAIdees.php");
exit;
?>
