<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/confirmation.css">
        <title>Accueil</title>
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>

        <h1 id="Merci">Merci, votre mail à été confirmé ! Vous pouvez désormais vous connecter</h1>

        <?php
            include 'script/connexionBDD.php';
            $confirmOk = $bdd->prepare("UPDATE  `utilisateurs` SET `code` = NULL, `mail_verif` =1 WHERE code = :code");
            $confirmOk->bindValue(':code', $_GET['code'],PDO::PARAM_STR);
            $confirmOk->execute();
        ?>
        <?php include 'footer.php' ?>
        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
