<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/profil.css">
        <title>PROFIL</title>
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <section>
            <h1>Profil</h1>
            <form method="post" action="script/modificationInfo.php">
                <div class="form-group row">
                    <label for="nomSession" class="col-sm-2 col-form-label">Connecté en tant que :</label>
                    <div class="col-sm-10">
                        <input id="nomSession" type="text" readonly class="form-control-plaintext" name="nomSession" value="<?php echo $_SESSION['nom'].' '.$_SESSION['prenom']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mail" class="col-sm-2 col-form-label">Mail :</label>
                    <div class="col-sm-10">
                        <input id="mail" type="text" readonly class="form-control-plaintext" name="mail" value="<?php echo $_SESSION['mail']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="adresse" class="col-sm-2 col-form-label">Adresse :</label>
                    <div class="col-sm-10">
                        <input id="adresse" type="text" readonly class="form-control-plaintext" name="adresse" value="<?php echo $_SESSION['adresse']; ?>">
                    </div>
                </div>
                <button type="button" class="btn btn-warning" onclick="modifier()">Modifier</button>
                <button type="submit" class="btn btn-warning">Valider</button>
            </form>

        </section>
        <script>
            function modifier(){
                document.getElementById('nomSession').removeAttribute('readonly');
                document.getElementById('nomSession').classList.remove('form-control-plaintext');
                document.getElementById('nomSession').classList.add('form-control');

                document.getElementById('mail').removeAttribute('readonly');
                document.getElementById('mail').classList.remove('form-control-plaintext');
                document.getElementById('mail').classList.add('form-control');

                document.getElementById('adresse').removeAttribute('readonly');
                document.getElementById('adresse').classList.remove('form-control-plaintext');
                document.getElementById('adresse').classList.add('form-control');
            }
        </script>
        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
