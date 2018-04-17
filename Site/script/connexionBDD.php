<?php
try{
    $bdd = new PDO('mysql:host=178.62.4.64;dbname=Projet_BDE_Final','groupeMN','1234');
    $bdd2 = new PDO('mysql:host=178.62.4.64;dbname=Projet_BDE2','groupeMN','1234');
    $bdd3 = new PDO('mysql:host=178.62.4.64;dbname=Projet_BDE2','groupeMN','1234');
    $bdd->exec("set names utf8");
}
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
