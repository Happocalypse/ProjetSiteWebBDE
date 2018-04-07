<?php
try{
    $bdd = new PDO('mysql:host=178.62.4.64;dbname=SiteBDEG1','groupeMN','1234')
}
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
