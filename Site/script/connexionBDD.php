<?php

try{
    $bdd = new PDO('mysql:host=178.62.4.64;dbname=Projet_BDE','groupeMN','1234');
}
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
