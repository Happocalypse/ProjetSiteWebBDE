<?php

session_start();
include 'connexionBDD.php';

$nom_evenement = $_POST['nomActivite'];
$description_evenement = $_POST['description'];
$date_evenement = $_POST['dateHeureActivite'];
$id_user = $_SESSION['id'];


$ideeEvenement = $bdd->prepare("INSERT INTO evenements (nom_evenement, description_evenement, date_evenement,ID_utilisateur)
VALUES(:nom_evenement, :description_evenement, :date_evenement, :ID_utilisateur)");
$ideeEvenement->bindValue(':nom_evenement',$nom_evenement,PDO::PARAM_STR);
$ideeEvenement->bindValue(':description_evenement',$description_evenement,PDO::PARAM_STR);
$ideeEvenement->bindValue(':date_evenement',$date_evenement,PDO::PARAM_STR);
$ideeEvenement->bindValue(':ID_utilisateur',$id_user,PDO::PARAM_STR);
$ideeEvenement->execute();


$bdd=null;
$ideeEvenement=null;
header("Location: ../boiteAIdees.php");
exit;
?>
