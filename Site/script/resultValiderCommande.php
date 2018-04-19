<?php
include('connexionBDD.php');
session_start();

if(isset($_POST['validerCommande'])){

    date_default_timezone_set('Europe/Paris');
    $today = date("Y-m-d H:i:s");

    // Insère la commande
    $sql='INSERT INTO commandes (date_commande, ID_utilisateur) VALUES ("'.$today.'",'.$_SESSION['id'].')';
    $bdd->exec($sql);

    // Récupère l'ID de la commande
    $reponse=$bdd->query('SELECT (ID_commande) FROM commandes ORDER BY ID_commande Desc LIMIT 0,1');
    $data=$reponse->fetch();
    $reponse->closeCursor();

    $idCommande=$data['ID_commande'];

    // SELECT LA TABLE PANIER
    $reponse=$bdd->query('SELECT quantite, ID_produit FROM PANIER WHERE ID_utilisateur='.$_SESSION['id']);
    $data=$reponse->fetch();

    if(!$data==NULL){

        // INSERT INTO DANS LA TABLE COMPORTER
        do{
        $sql='INSERT INTO COMPORTER (quantite_vendu, ID_commande, ID_produit) VALUES ('.$data['quantite'].','.$idCommande.','.$data['ID_produit'].')';
        $bdd2->exec($sql);
        } while($data=$reponse->fetch());
    }
    $reponse->closeCursor();

    // SUPPRIMER PANIER
    $sql='DELETE FROM PANIER WHERE ID_utilisateur='.$_SESSION['id'];
    $bdd->exec($sql);

//ENVOIE LE MAIL A UN MEMBRE DU BDE
//    $reponse=$bdd->query('SELECT quantite, ID_produit FROM PANIER WHERE ID_utilisateur='.$_SESSION['id']);
//    while($MAIL=$reponse->fetch()){
//
//        $to = 'membre.bde@viacesi.fr';
//        $subject = 'Signalement d\'une image';
//        $message = 'L\'ID numero .$_SESSION['id']. a effectuer une commande comportant  ;
//        mail($to, $subject, $message);
//
//    }$reponse->closeCursor();
}

echo('<script>alert("Votre commande à été envoyé!");</script>');
echo("<script>window.location = '../boutique.php';</script>");

?>
