<?php
try{
    $bdd = new PDO('mysql:host=178.62.4.64;dbname=SiteBDEG1','groupeMN','1234')
}
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$mail = Securite::bdd($_POST['mail']);
$mdp = Securite::bdd($_POST['mdp']);
$nom = Securite::bdd($_POST['nom']);
$prenom = Securite::bdd($_POST['prenom']);
$adresse = Securite::bdd($_POST['adresse']);

$requeteVerifMail = $bdd->prepare("SELECT mail FROM utilisateurs WHERE mail= :mail");
$requeteVerifMail->bindValue(':mail',$mail,PDO::PARAM_STR);
$requeteVerifMail->execute();

$verifMail = $requeteVerifMail->fetch();

if($mail == $verifMail['mail']){
    echo '<script>alert("mail already use")</script>';
}
else{
    $inscription = $bdd->prepare("INSERT INTO utilisateurs (nom, prenom, mot_de_passe, adresse, mail)
    VALUES (:nom, :prenom, :mdp, :adresse, :mail)");
    $inscription->bindValue(':nom',$nom,PDO::PARAM_STR);
    $inscription->bindValue(':prenom',$prenom,PDO::PARAM_STR);
    $inscription->bindValue(':mdp',$mdp,PDO::PARAM_STR);
    $inscription->bindValue(':adresse',$adresse,PDO::PARAM_STR);
    $inscription->bindValue(':mail',$mail,PDO::PARAM_STR);
    $inscription->execute();
}
$bdd=null;
$requeteVerifMail=null;
$inscription=null;
?>
