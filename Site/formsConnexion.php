<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/connexion.css">
        <title>TITRE</title>
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <section id="form_connexion">
            <div class="mx-auto" id="formulaire" style="width: 700px;">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <form method="post" action="script/connexion.php" autocomplete="on">
                            <h1>Connexion</h1>
                            <div class="form-group">
                                <label for="mail">Adresse mail</label>
                                <input type="email" class="form-control" id="mailConnexion" name="mailConnexion" placeholder="Entrer votre email"/>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de Passe</label>
                                <input type="password" class="form-control" id="mdpConnexion" name="mdpConnexion" placeholder="Mot de Passe">
                            </div>
                            <button type="submit" class="btn btn-outline-danger" >Se connecter</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form method="post" action="script/inscription.php" autocomplete="on">
                            <h1>Inscription</h1>
                            <div class="form-group">
                                <label for="mail">Adresse mail</label>
                                <input type="email" class="form-control" id="mailInscription" name="mailInscription" aria-describedby="descEmail" placeholder="prenom.nom@viacesi.fr" onblur="verifMail()" />
                                <small id="descEmail" class="form-text text-muted">Nous ne partagerons jamais votre email.</small>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">Mot de Passe</label>
                                    <input type="password" class="form-control" id="motDePasseInscription" name="mdpInscription" aria-describedby="descMdP" placeholder="Mot de Passe" onblur="verifMdp()">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Confirmation</label>
                                    <input type="password" class="form-control" id="motDePasseInscriptionConfirm" name="mdpInscriptionConfirm" placeholder="Mot de passe" onblur="verifMdpConfirm()">
                                </div>
                                <small id="descMdP" class="form-text text-muted">Votre mot de passe doit contenir une majuscule et un chiffre.</small>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputNom">Nom</label>
                                    <input type="text" class="form-control" id="Nom" name="nom" placeholder="Nom">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPrenom">Prenom</label>
                                    <input type="text" class="form-control" id="Prenom" name="prenom" placeholder="Prenom">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Adresse</label>
                                <input type="text" class="form-control" id="Adresse" name="adresse" aria-describedby="descAdresse" placeholder="Adresse">
                                <small id="descAdresse" class="form-text text-muted">ex: 1 rue Solférino 64000 Pau</small>
                            </div>
                            <button type="submit" class="btn btn-outline-danger" >S'inscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function verifMdpConfirm(){
                var mdp = document.getElementById("motDePasseInscription");
                var confirm = document.getElementById("motDePasseInscriptionConfirm");
                if(mdp.value == confirm.value){
                    confirm.classList.add("is-valid");
//                    mdp.classList.add("is-valid");
                }
                else{
                    confirm.classList.add("is-invalid");
//                    mdp.classList.add("is-invalid");
                }

                function verifMdp(){
                    var mdp1 = document.getElementById("motDePasseInscription").value;
                    var regexMdp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
                    if(regexMdp.test(mdp1)){
                        mdp1.classList.add("is-valid");
                    }
                    else{
                        mdp1.classList.add("is-invalid");
                    }
                }
            }
        </script>
        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
