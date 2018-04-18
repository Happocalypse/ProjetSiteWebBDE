<?php
session_start();
include 'connexionBDD.php';


$id_event=$_POST['id_evenement'];
$id_user=$_SESSION['id'];


$voteIdee=$bdd->prepare('SELECT * FROM VOTER WHERE ID_utilisateur= :id_user AND ID_evenement= :id_event');
$voteIdee->bindValue(':id_user',$id_user, PDO::PARAM_INT);
$voteIdee->bindValue(':id_event',$id_event, PDO::PARAM_INT);
$voteIdee->execute();
$data=$voteIdee->fetch();

if($data==null){
    $sql = 'INSERT INTO VOTER (ID_utilisateur, ID_evenement) VALUES ('.$_SESSION['id'].','.$_POST['id_evenement'].')';
    $bdd->exec($sql);

}else{
    $sql='DELETE FROM VOTER WHERE ID_utilisateur='.$_SESSION['id'].' AND ID_evenement='.$_POST['id_evenement'];
    $bdd->exec($sql);
}
$voteIdee->closeCursor();

header("Location: ../boiteAIdees.php");
exit;
?>
