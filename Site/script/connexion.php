<?php
include 'connexionBDD.php';

$mail = $_POST['mailConnexion'];
$mdp = $_POST['mdpConnexion'];

$verifConnexionMail = $bdd->prepare("SELECT mail FROM utilisateurs WHERE mail = :mail");
$verifConnexionMdp = $bdd->prepare("SELECT mdp FROM utilisateurs WHERE mail = :mail");
$verifConnexionMail->bindValue(':mail',$mail,PDO::PARAM_STR);
$verifConnexionMdp->bindValue(':mail',$mail,PDO::PARAM_STR);
$verifConnexionMail->execute();
$verifConnexionMdp->execute();

$connexionMail = $verifConnexionMail->fetch();
$connexionMdp = $verifConnexionMdp->fetch();

if($mail == $connexionMail['mail'] && password_verify($mdp,$connexionMdp['mdp']) == true){
    session_start();
    $requeteNom = $bdd->prepare("SELECT nom FROM utilisateurs WHERE mail = :mail");
    $requetePrenom = $bdd->prepare("SELECT prenom FROM utilisateurs WHERE mail = :mail");
    $requeteID = $bdd->prepare("SELECT ID_utilisateur FROM utilisateurs WHERE mail = :mail");
    $requeteGroupe = $bdd->prepare("SELECT ID_groupe FROM utilisateurs WHERE mail = :mail");
    $requeteAdresse = $bdd->prepare("SELECT adresse FROM utilisateurs WHERE mail = :mail");

    $requeteNom->bindValue(':mail',$mail,PDO::PARAM_STR);
    $requetePrenom->bindValue(':mail',$mail,PDO::PARAM_STR);
    $requeteID->bindValue(':mail',$mail,PDO::PARAM_STR);
    $requeteGroupe->bindValue(':mail',$mail,PDO::PARAM_STR);
    $requeteAdresse->bindValue(':mail',$mail,PDO::PARAM_STR);

    $requeteNom->execute();
    $requetePrenom->execute();
    $requeteID->execute();
    $requeteGroupe->execute();
    $requeteAdresse->execute();

    $nom = $requeteNom->fetch();
    $prenom = $requetePrenom->fetch();
    $id = $requeteID->fetch();
    $groupe = $requeteGroupe->fetch();
    $adresse = $requeteAdresse->fetch();

    $_SESSION['nom'] = $nom['nom'];
    $_SESSION['prenom'] = $prenom['prenom'];
    $_SESSION['id'] = $id['ID_utilisateur'];
    $_SESSION['groupe'] = $groupe['ID_groupe'];
    $_SESSION['mail'] = $connexionMail['mail'];
    $_SESSION['adresse'] = $adresse['adresse'];

    $bdd=null;
    header("Location: ../accueil.php");
    exit;
}
else{
    $bdd = null;
    header("Location: ../formsConnexion.php");
    exit;
}
?>
