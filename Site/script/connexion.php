<?php
include 'securite.php';

try{
    $bdd = new PDO('mysql:host=178.62.4.64;dbname=SiteBDEG1','groupeMN','1234')
}
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$mail = Securite::bdd($_POST['mail']);
$mdp = Securite::bdd($_POST['mdp']);

$verifConnexionMail = $bdd->prepare("SELECT mail FROM utilisateurs WHERE mail = :mail");
$verifConnexionMdp = $bdd->prepare("SELECT mot_de_passe FROM utilisateurs WHERE mail = :mail");
$verifConnexionMail->bindValue(':mail',$mail,PDO::PARAM_STR);
$verifConnexionMdp->bindValue(':mail',$mail,PDO::PARAM_STR);
$verifConnexionMail->execute();
$verifConnexionMdp->execute();

$connexionMail = $verifConnexionMail->fetch();
$connexionMdp = $verifConnexionMdp->fetch();

if($mail == $connexionMail['mail'] && $mdp == $connexionMdp['mdp']){
    //établir le lien avec la page d'accueil une fois l'utilisateur connecté
}
else{
    echo '<script>alert("Password or Mail incorrect")</script>';
}
$bdd=null;
?>
