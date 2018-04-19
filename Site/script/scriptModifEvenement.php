<?php
session_start();
include 'connexionBDD.php';


if(isset($_POST['saveIdee'])){
    if(isset($_POST['valide'])){
        $valide = $_POST['valide'];
    }else{
        $valide=1;
    }

    $nom_evenement = $_POST['nomActivite'];
    $description_evenement = $_POST['description'];
    $date_evenement = $_POST['dateHeureActivite'];
    $id_evenement = $_POST['id_evenement'];


    $majIdees= $bdd->prepare("UPDATE evenements SET nom_evenement= :nom_evenement , description_evenement= :description_evenement , date_evenement= :date_evenement, valide= :valide WHERE ID_evenement= :id_evenement");
    $majIdees->bindValue(':nom_evenement',$nom_evenement,PDO::PARAM_STR);
    $majIdees->bindValue(':description_evenement',$description_evenement,PDO::PARAM_STR);
    $majIdees->bindValue(':date_evenement',$date_evenement,PDO::PARAM_STR);
    $majIdees->bindValue(':id_evenement',$id_evenement,PDO::PARAM_INT);
    $majIdees->bindValue(':valide',$valide,PDO::PARAM_INT);
    $majIdees->execute();

header("Location: ../evenements.php");
exit;
}
if(isset($_POST['supprIdee'])){

    $id_event = $_POST['id_evenement'];


    $suppr = $bdd->prepare("DELETE FROM VOTER WHERE ID_evenement = :id_event");
    $suppr->bindValue(':id_event',$id_event,PDO::PARAM_INT);
    $suppr->execute();
    $suppr2 = $bdd->prepare("DELETE FROM PARTICIPER WHERE ID_evenement = :id_event");
    $suppr2->bindValue(':id_event',$id_event,PDO::PARAM_INT);
    $suppr2->execute();
    $suppr3 = $bdd->prepare("DELETE FROM evenements WHERE ID_evenement = :id_event");
    $suppr3->bindValue(':id_event',$id_event,PDO::PARAM_INT);
    $suppr3->execute();

header("Location: ../evenements.php");
exit;
}
if(isset($_POST['dlCsvEvent'])){

    $id_evenement = $_POST['id_evenement'];

    $statement = $bdd->prepare("SELECT nom, prenom FROM utilisateurs INNER JOIN PARTICIPER ON PARTICIPER.ID_utilisateur = utilisateurs.ID_utilisateur AND PARTICIPER.ID_evenement = :id_event");

    $statement->bindValue(':id_event',$id_evenement,PDO::PARAM_INT);

    //Executre our SQL query.
    $statement->execute();

    //Fetch all of the rows from our MySQL table.
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    //Get the column names.
    $columnNames = array();
    if(!empty($rows)){
        //We only need to loop through the first row of our result
        //in order to collate the column names.
        $firstRow = $rows[0];
        foreach($firstRow as $colName => $val){
            $columnNames[] = $colName;
        }
    }

    //Setup the filename that our CSV will have when it is downloaded.
    $fileName = 'Fiche_evenement.csv';

    //Set the Content-Type and Content-Disposition headers to force the download.
    header('Content-Type: application/excel');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');

    //Open up a file pointer
    $fp = fopen('php://output', 'w');

    //Start off by writing the column names to the file.
    fputcsv($fp, $columnNames);

    //Then, loop through the rows and write them to the CSV file.
    foreach ($rows as $row) {
        fputcsv($fp, $row);
    }

    //Close the file pointer.
    fclose($fp);


}
?>
