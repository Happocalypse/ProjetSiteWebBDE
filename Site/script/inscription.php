<?php
include 'connexionBDD.php';

$mail = $_POST['mailInscription'];
$mdp = $_POST['mdpInscription'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

$requeteVerifMail = $bdd->prepare("SELECT mail FROM utilisateurs WHERE mail= :mail");
$requeteVerifMail->bindValue(':mail',$mail,PDO::PARAM_STR);
$requeteVerifMail->execute();

$verifMail = $requeteVerifMail->fetch();

if($mail == $verifMail['mail']){
    echo '<script>alert("mail already use")</script>';
}
else{
    echo '<script>alert("Je prépare les requetes")</script>';

    $inscription = $bdd->prepare("INSERT INTO utilisateurs (nom, prenom, mdp, adresse, mail)
    VALUES (:nom, :prenom, :mdp, :adresse, :mail)");
    $inscription->bindValue(':nom',$nom,PDO::PARAM_STR);
    $inscription->bindValue(':prenom',$prenom,PDO::PARAM_STR);
    $inscription->bindValue(':mdp',$mdp_hash,PDO::PARAM_STR);
    $inscription->bindValue(':adresse',$adresse,PDO::PARAM_STR);
    $inscription->bindValue(':mail',$mail,PDO::PARAM_STR);
    $inscription->execute();
    header("Location: ../accueil.php");
    exit;
}
?>
