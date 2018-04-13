<?php
session_start();
include 'connexionBDD.php';

$id = $_POST['id'];

$suppr = $bdd->prepare("DELETE FROM utilisateurs WHERE ID_utilisateur = :id");
$suppr->bindValue(':id',$id,PDO::PARAM_INT);
$suppr->execute();

header('Location: ../admin.php');
exit;
?>
