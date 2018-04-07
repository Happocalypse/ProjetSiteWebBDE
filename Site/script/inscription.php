<?php
try{
    $bdd = new PDO('mysql:host=178.62.4.64;dbname=SiteBDEG1','groupeMN','1234')
}
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

function securite_bdd($string)
{
    if(ctype_digit($string))//si la string est un entier
    {
        $string = intval($string);//on force le int
    }
    else// Pour tous les autres types
    {
        $string = mysql_real_escape_string($string);//echappement des caractères particulier
        $string = addcslashes($string, '%_');//echappement du %
    }
    return $string;
}

$mail = securite_bdd($_POST['mail']);
$mdp = securite_bdd($_POST['mdp']);
$nom = secutite_bdd($_POST['nom']);
$prenom = securite_bdd($_POST['prenom']);
$adresse = securite_bdd($_POST['adresse']);

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
?>
