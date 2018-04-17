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
        <section id="admin">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Role</th>
                        <th scope="col">Assos</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <!--                <form method="post" action="script/deleteFromTable.php">-->
                    <?php
    include 'script/connexionBDD.php';

        $utilisateurs = $bdd->prepare("SELECT * FROM utilisateurs");
        $utilisateurs->execute();

        foreach($utilisateurs as $row){
            echo '<form method="post" action="script/deleteFromTable.php"><th scope="row"><input type="text" readonly class="form-control-plaintext" name="id" value="'.$row["ID_utilisateur"].'"></th>'.
                '<td>'.$row["nom"].'</td>'.
                '<td>'.$row["prenom"].'</td>'.
                '<td>'.$row["mail"].'</td>'.
                '<td>'.$row["ID_groupe"].'</td>'.
                '<td>'.$row["ID_association"].'</td>'.
                '<td><button type="submit" class="btn btn-danger">Supprimer</button></td></form>'.
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
