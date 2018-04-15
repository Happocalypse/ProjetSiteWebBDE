<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/boiteAIdeesProp.css">
        <title>Propositions</title>
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <h1 class="proposition">Propositions</h1>
        <?php include 'script/scriptBootStrapBody.php' ?>


    <section>
        <div class="mx-auto" style="width: 800px;">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <form method="post" action="script/srciptBoiteAIdeesProp.php" autocomplete="on">

                        <div class="form-group">
                             <label for="nomActivite">Nom de l'activité</label>
                             <input type="text" class="form-control" id="nomActivite" name="nomActivite" maxlength="100" placeholder="Entrer le nom de l'activité"/>
                        </div>
                        <div class="form-group">
                             <label for="dateHeureActivite">Date et heure de l'activité</label>
                             <input type="text" class="form-control" id="dateHeureActivite" name="dateHeureActivite" maxlength="19" placeholder="aaaa-mm-jj hh:mm:ss"/>
                        </div>

                        <div class="form-group">
                            <label for="description">Description (255 caractères max)</label>
                            <textarea style="resize:none" class="form-control" id="description" name="description" maxlength="255" placeholder="Décrivez l'activité proposée"></textarea>
                        </div>

                       <button align="center" type="submit" class="btn btn-outline-danger">Soumettre</button>
                    </form>
                </div>
            </div>
         </div>
    </section>

    </body>
</html>
