<?php
include 'securite.php';

include 'connexionBDD.php';

$mail = $_POST['mailInscription'];
$mdp = $_POST['mdpInscription'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);

$requeteVerifMail = $bdd->prepare("SELECT mail FROM Utilisateur WHERE mail= :mail");
$requeteVerifMail->bindValue(':mail',$mail,PDO::PARAM_STR);
$requeteVerifMail->execute();

$verifMail = $requeteVerifMail->fetch();

if($mail == $verifMail['mail']){
    echo '<script>alert("mail already use")</script>';
    header("Location: ../formsConnexion.php");
}
else{
    $inscription = $bdd->prepare("INSERT INTO Utilisateur (nom, prenom, mot_de_passe, adresse, mail)
    VALUES (:nom, :prenom, :mdp, :adresse, :mail)");
    $inscription->bindValue(':nom',$nom,PDO::PARAM_STR);
    $inscription->bindValue(':prenom',$prenom,PDO::PARAM_STR);
    $inscription->bindValue(':mdp',$mdp_hash,PDO::PARAM_STR);
    $inscription->bindValue(':adresse',$adresse,PDO::PARAM_STR);
    $inscription->bindValue(':mail',$mail,PDO::PARAM_STR);
    $inscription->execute();
    echo '<script>alert("Je suis la")</script>';
}
$bdd=null;
$requeteVerifMail=null;
$inscription=null;
?>
