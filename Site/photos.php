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
    $reponse=$bdd->query('SELECT (ID_evenement)FROM PARTICIPER WHERE ID_utilisateur=11');
    $data=$reponse->fetch();

        if($data==NULL){
            echo "<h1 class='my-4 text-center text-lg-left'>Vous avez participé à aucun événement.</h1>";
        }else{

            echo "<a href=\"addPhoto.php\" class=\"btn btn-primary btn-lg\" role=\"button\" aria-disabled=\"true\" id=\"buttonAjouter\">Ajouter une photo</a>";

            $i=0;
        do{

            $nom_evenents[$i]=$data['ID_evenement'];
            $i++;

        } while($data=$reponse->fetch());

        $reponse->closeCursor();

        echo '<pre>';
        print_r ($nom_evenements);
        echo '</pre>';
        }
    ?>

    </div>

        <?php include 'script/scriptBootStrapBody.php' ?>
</body>

</html>
