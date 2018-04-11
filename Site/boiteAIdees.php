<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/boiteAIdees.css">
        <title>Boite à idées</title>
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <h1 class="BAI" >Boite à Idées</h1>
        <?php include 'script/scriptBootStrapBody.php' ?>

    <div align="center">
      <a class="prop" href="boiteAIdeesProp.php">Proposez vos idées</a>
    </div>


        <?php
        /*mysql_connect("178.62.4.64", "groupeMN", "1234");
        mysql_select_db("Projet_BDE");

        $reponse = mysql_query("SELECT nom_evenement, description_evenement, date_evenement FROM evenements WHERE valide=0");
        ?>

        <table>
            <tr>
                <td>nom</td>
                <td>date</td>
                <td>desc</td>
            </tr>
         <?php/
            while($donnees = mysql_fetch_array($reponse))
            {
            ?>
                <tr>
                    <td><?php echo $donnees['nom_evenement'];?></td>
                    <td><?php echo $donnees['date_evenement'];?></td>
                    <td><?php echo $donnees['description_evenement'];?></td>
                </tr>
         <?php
            }
            mysql_close();*/
            ?>










        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
