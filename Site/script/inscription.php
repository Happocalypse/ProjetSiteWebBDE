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
    $code = uniqid();
    $url = 'http://localhost/Projet_BDE/Site/confirmationMail.php?code='.$code;
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"ExiaBDEPau.com"<no-reply@exiapau.fr>'.'\n';
    $header.='Content-Type:test/html; charset="utf-8"'.'\n';
    $header.='Content-Transfer-Encoding: 8bit';

    $message = '
    <html>
        <body>
            <div align="center">
                Bonjour'.$nom.' '.$prenom.',</br>
                Confirmez votre adresse mail en cliquant <a href="'.$url.'">ici</a></br>
                Si vous ne pouvez pas copier le liens suivant :</br>
                '.$url.'
            </div>
        </body>
    </html>';

    $inscription = $bdd->prepare("INSERT INTO utilisateurs (nom, prenom, mdp, adresse, mail, code)
    VALUES (:nom, :prenom, :mdp, :adresse, :mail, :code)");
    $inscription->bindValue(':nom',$nom,PDO::PARAM_STR);
    $inscription->bindValue(':prenom',$prenom,PDO::PARAM_STR);
    $inscription->bindValue(':mdp',$mdp_hash,PDO::PARAM_STR);
    $inscription->bindValue(':adresse',$adresse,PDO::PARAM_STR);
    $inscription->bindValue(':mail',$mail,PDO::PARAM_STR);
    $inscription->bindValue(':code',$code,PDO::PARAM_STR);
    $inscription->execute($mail,"Do not reply - validation par mail", $message, $header);

    mail($mail, "Do not reply - Verification email", $message, $header);

    header("Location: ../accueil.php");
    exit;
}
?>
