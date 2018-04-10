<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=SiteBDE','root','0');
}
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
