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

if($mail == $connexionMail['mail'] && password_verify($mdp,$connexionMdp['mot_de_passe']) == true){
    session_start();
    $requeteNom = $bdd->prepare("SELECT nom FROM utilisateurs WHERE mail = :mail");
    $requetePrenom = $bdd->prepare("SELECT prenom FROM utilisateurs WHERE mail = :mail");
    $requeteID = $bdd->prepare("SELECT ID_utilisateur FROM utilisateurs WHERE mail = :mail");
    $requeteNom->bindValue(':mail',$mail,PDO::PARAM_STR);
    $requetePrenom->bindValue(':mail',$mail,PDO::PARAM_STR);
    $requeteID->bindValue(':mail',$mail,PDO::PARAM_STR);
    $requeteNom->execute();
    $requetePrenom->execute();
    $requeteID->execute();
    $nom = $requeteNom->fetch();
    $prenom = $requetePrenom->fetch();
    $id = $requeteID->fetch();

    $_SESSION['Nom'] = $nom['nom'];
    $_SESSION['Prenom'] = $prenom['prenom'];
    $_SESSION['id'] = $id['id'];
    $idverif = $_SESSION['id'];
    $bdd=null;
    header("Location: ../accueil.php");
    exit;
}
else{
    header("Location: ../formsConnexion.php");
    $bdd = null;
}
?>
