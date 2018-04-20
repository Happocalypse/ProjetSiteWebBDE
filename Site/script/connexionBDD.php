<?php
try{

    $bdd = new PDO('mysql:host=localhost;dbname=Projet_BDE_Final','root','');
    $bdd2 = new PDO('mysql:host=localhost;dbname=Projet_BDE_Final','root','');
    $bdd3 = new PDO('mysql:host=localhost;dbname=Projet_BDE_Final','root','');
    $bdd->exec("set names utf8");
}
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
