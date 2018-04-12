<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="CSS/photos.css">
    <?php include 'script/scriptBootStrapHead.php' ?>
    <title>Album photo</title>

</head>
    <header><?php include 'navbar.php';?></header>

<body>
    <div class="container">



    <?php include('script/connexionBDD.php');

    //TASK : MODIFIER ID_utilisateur
    $reponse=$bdd->query('SELECT (ID_evenement)FROM PARTICIPER WHERE ID_utilisateur=1');
    $data=$reponse->fetch();

        if($data==NULL){
            echo "<h1 class='my-4 text-center text-lg-left'>Vous avez participé à aucun événement.</h1>";
        }else{

            echo "<a href=\"addPhoto.php\" class=\"btn btn-primary btn-lg\" role=\"button\" aria-disabled=\"true\" id=\"buttonAjouter\">Ajouter une photo</a>";

            $i=0;
            $nom_evenements=array();
        do{
            array_push($nom_evenements,$data['ID_evenement']);

        } while($data=$reponse->fetch());

        $reponse->closeCursor();

        echo '<pre>';
        print_r ($nom_evenements);
        echo '</pre>';

         for($index=0;$index<sizeof($nom_evenements);$index++){

            $reponse=$bdd->query('SELECT (url_image)FROM photos WHERE ID_evenement='. $nom_evenements[$index]);
            $data=$reponse->fetch();

                if($data==NULL AND $index=0){
                    echo "Il y a aucune photo sur l'événénement.";
                }else{
                    do{
                        echo '<br />'.$data['url_image'];
                    } while ($data=$reponse->fetch());
                }

            $reponse->closeCursor();

        }
    }


    ?>

    </div>

        <?php include 'script/scriptBootStrapBody.php' ?>
</body>

</html>
