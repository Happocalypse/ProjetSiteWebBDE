<?php

include 'connexionBDD.php';

$nom_evenement = $_POST['nomActivite'];
$description_evenement = $_POST['description'];
$date_evenement = $_POST['dateHeureActivite'];


$ideeEvenement = $bdd->prepare("INSERT INTO evenements (nom_evenement, description_evenement, date_evenement)
VALUES(:nom_evenement, :description_evenement, :date_evenement)");
$ideeEvenement->bindValue(':nom_evenement',$nom_evenement,PDO::PARAM_STR);
$ideeEvenement->bindValue(':description_evenement',$description_evenement,PDO::PARAM_STR);
$ideeEvenement->bindValue(':date_evenement',$date_evenement,PDO::PARAM_STR);
$ideeEvenement->execute();
echo '<script>alert("jen ai marre")</script>'


//$bdd=null;
//$ideeEvenement=null;
?>
