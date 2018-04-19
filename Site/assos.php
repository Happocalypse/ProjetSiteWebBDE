<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/assos.css">
        <title>Accueil</title>
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <section id="assos">
            <h1>ADMIN - Associations</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Président</th>
                        <th scope="col">Description</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    include 'script/connexionBDD.php';
        function supprUsers($idCurrent){
            $suppr = $bdd->prepare("");
            $suppr->bindValue(':id',$idCurrent,PDO::PARAM_INT);
            $suppr->execute();
        }
        $utilisateurs = $bdd->prepare("SELECT * FROM associations");
        $utilisateurs->execute();

        foreach($utilisateurs as $row){
            echo '<form method="post" action="script/dlPDF.php"><th scope="row"><input type="text" readonly class="form-control-plaintext" name="idAssos" value="'.$row["ID_association"].'"></th>'.
                '<td>'.$row["nom_association"].'</td>'.
                '<td>'.$row["president_association"].'</td>'.
                '<td>'.$row["description_association"].'</td>'.
                '<td><button type="submit" class="btn btn-danger">Telecharger</button></td></form>'.
                '</tr>';
        }
                    ?>
                </tbody>
            </table>
        </section>
        <?php include 'footer.php' ?>
        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
