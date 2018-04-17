<?php
session_start();
include 'connexionBDD.php';


$id_event=$_POST['id_evenement'];
$id_user=$_SESSION['id'];


$voteIdee=$bdd->prepare('SELECT * FROM PARTICIPER WHERE ID_utilisateur= :id_user AND ID_evenement= :id_event');
$voteIdee->bindValue(':id_user',$id_user, PDO::PARAM_INT);
$voteIdee->bindValue(':id_event',$id_event, PDO::PARAM_INT);
$voteIdee->execute();
$data=$voteIdee->fetch();

if($data==null){
    $sql = 'INSERT INTO PARTICIPER (ID_utilisateur, ID_evenement) VALUES ('.$_SESSION['id'].','.$_POST['id_evenement'].')';
    $bdd->exec($sql);

}
$voteIdee->closeCursor();

echo $id_event;
echo $id_user;


//header("Location: ../evenements.php");
//exit;
?>
