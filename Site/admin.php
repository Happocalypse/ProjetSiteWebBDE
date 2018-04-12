<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/admin.css">
        <title>ADMIN</title>
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <h1>ADMIN - Users List</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Role</th>
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
        $utilisateurs = $bdd->prepare("SELECT * FROM utilisateurs");
        $utilisateurs->execute();

        foreach($utilisateurs as $row){
            echo '<th scope="row">'.$row["ID_utilisateur"].'</th>'.
                    '<td>'.$row["nom"].'</td>'.
                    '<td>'.$row["prenom"].'</td>'.
                    '<td>'.$row["mail"].'</td>'.
                    '<td>'.$row["ID_groupe"].'</td>'.
                    '<td><button type="button" class="btn btn-danger">Supprimer</button></td>'.
                    '</tr>';
        }

                ?>
                <?php include 'script/scriptBootStrapBody.php' ?>
            </tbody>
        </table>
    </body>
</html>
