<?php
session_start();
$nomPrenom = $_POST['nomSession'];
$mail = $_POST['mail'];
$adresse = $_POST['adresse'];

$info = explode(" ",$nomPrenom);

include 'connexionBDD.php';

$majInfo= $bdd->prepare("UPDATE utilisateurs SET nom= :nom , prenom= :prenom , adresse= :adresse , mail= :mail WHERE ID_utilisateur = :id");
$majInfo->bindValue(':nom',$info[0],PDO::PARAM_STR);
$majInfo->bindValue(':prenom',$info[1],PDO::PARAM_STR);
$majInfo->bindValue(':mail',$mail,PDO::PARAM_STR);
$majInfo->bindValue(':adresse',$adresse,PDO::PARAM_STR);
$majInfo->bindValue(':id',$_SESSION['id'],PDO::PARAM_INT);
$majInfo->execute();

$_SESSION['nom'] = $info[0];
$_SESSION['prenom'] = $info[1];
$_SESSION['mail'] = $mail;
$_SESSION['adresse'] = $adresse;

header("Location: ../profil.php");
exit;
?>
