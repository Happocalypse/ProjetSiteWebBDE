<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/connexion.css">
        <title>Connexion/Inscription</title>
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
                                <input type="email" class="form-control" id="mailConnexion" name="mailConnexion" placeholder="Entrer votre email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de Passe</label>
                                <input type="password" class="form-control" id="mdpConnexion" name="mdpConnexion" placeholder="Mot de Passe" required>
                            </div>
                            <button type="submit" class="btn btn-outline-danger" >Se connecter</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form method="post" action="script/inscription.php" autocomplete="on" onsubmit="return validationEnvoi()">
                            <h1>Inscription</h1>
                            <div class="form-group">
                                <label for="mail">Adresse mail</label>
                                <input type="email" class="form-control" id="mailInscription" name="mailInscription" aria-describedby="descEmail" placeholder="prenom.nom@viacesi.fr" onblur="verifMail()" required />
                                <small id="descEmail" class="form-text text-muted">Nous ne partagerons jamais votre email.</small>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="password">Mot de Passe</label>
                                    <input type="password" class="form-control" id="motDePasseInscription" name="mdpInscription" aria-describedby="descMdP" placeholder="Mot de Passe" onblur="verifMdp()" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Confirmation</label>
                                    <input type="password" class="form-control" id="motDePasseInscriptionConfirm" name="mdpInscriptionConfirm" placeholder="Mot de passe" onblur="verifMdpConfirm()" required>
                                </div>
                                <small id="descMdP" class="form-text text-muted">Votre mot de passe doit contenir une majuscule et un chiffre.</small>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="inputNom">Nom</label>
                                    <input type="text" class="form-control" id="Nom" name="nom" placeholder="Nom" onblur="verifNom()" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPrenom">Prenom</label>
                                    <input type="text" class="form-control" id="Prenom" name="prenom" placeholder="Prenom" onblur="verifPrenom()" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Adresse</label>
                                <input type="text" class="form-control" id="Adresse" name="adresse" aria-describedby="descAdresse" placeholder="Adresse" onblur="verifAdresse()" required>
                                <small id="descAdresse" class="form-text text-muted">ex: 1 rue Solférino 64000 Pau</small>
                            </div>
                            <button type="submit" class="btn btn-outline-danger" >S'inscrire</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script>
            var motDePasse = false;
            var motDePasseConfirme = false;
            var nomValid = false;
            var prenomValid = false;
            var adresseValid = false;
            var mailValid = false;

            function verifMdpConfirm(){
                var mdp = document.getElementById("motDePasseInscription");
                var confirm = document.getElementById("motDePasseInscriptionConfirm");
                if(mdp.value == confirm.value && mdp.value != ""){
                    confirm.classList.add("is-valid");
                    motDePasseConfirme = true;
                }
                else if(mdp.value == ""){
                    mdp.classList.remove("is-invalid");
                    mdp.classList.remove("is-valid");
                    motDePasseConfirme = false;
                }
                else{
                    confirm.classList.add("is-invalid");
                    motDePasseConfirme = false;
                }
            }
            function verifMdp(){
                var mdp1 = document.getElementById("motDePasseInscription");
                var regexMdp = new RegExp('(?=.*\\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$');
                if(regexMdp.test(mdp1.value)){
                    mdp1.classList.remove("is-invalid");
                    mdp1.classList.remove("is-valid");
                    mdp1.classList.add("is-valid");
                    motDePasse = true;
                }
                else if(mdp1.value == ""){
                    mdp1.classList.remove("is-invalid");
                    mdp1.classList.remove("is-valid");
                    motDePasse = false;
                }
                else{
                    mdp1.classList.remove("is-valid");
                    mdp1.classList.remove("is-invalid");
                    mdp1.classList.add("is-invalid");
                    motDePasse = false;
                }
            }
            function verifMail(){
                var mail = document.getElementById("mailInscription");
                var regexMail = new RegExp('([\\w]{0,})[.]?([\\w]{1,})[@](viacesi.fr|cesi.fr)')
                if(regexMail.test(mail.value)){
                    mail.classList.remove("is-invalid");
                    mail.classList.remove("is-valid");
                    mail.classList.add("is-valid");
                    mailValid = true;
                }
                else if(mail.value == ""){
                    mail.classList.remove("is-invalid");
                    mail.classList.remove("is-valid");
                    mailValid = false;
                }
                else{
                    mail.classList.remove("is-invalid");
                    mail.classList.remove("is-valid");
                    mail.classList.add("is-invalid");
                    mailValid = false;
                }
            }
            function verifNom(){
                var nom = document.getElementById("Nom");
                if(nom.value == ""){
                    nom.classList.remove("is-valid");
                    nom.classList.remove("is-invalid");
                    nom.classList.add("is-invalid");
                    nomValid = false;
                }
                else{
                    nom.classList.remove("is-valid");
                    nom.classList.remove("is-invalid");
                    nom.classList.add("is-valid");
                    nomValid = true;
                }
            }
            function verifPrenom(){
                var prenom = document.getElementById("Prenom");
                if(prenom.value == ""){
                    prenom.classList.remove("is-valid");
                    prenom.classList.remove("is-invalid");
                    prenom.classList.add("is-invalid");
                    prenomValid = false;
                }
                else{
                    prenom.classList.remove("is-valid");
                    prenom.classList.remove("is-invalid");
                    prenom.classList.add("is-valid");
                    prenomValid = true;
                }
            }
            function verifAdresse(){
                var adresse = document.getElementById("Adresse");
                if(adresse.value == ""){
                    adresse.classList.remove("is-valid");
                    adresse.classList.remove("is-invalid");
                    adresse.classList.add("is-invalid");
                    adresseValid = false;
                }
                else{
                    adresse.classList.remove("is-invalid");
                    adresse.classList.remove("is-valid");
                    adresse.classList.add("is-valid");
                    adresseValid = true;
                }
            }
            function validationEnvoi(){
                if(motDePasse & motDePasseConfirme & nomValid & prenomValid & adresseValid & mailValid){
                    return true;
                }
                else{
                    alert("Veuillez valider tous les champs");
                    return false;
                }
            }
        </script>
<!--        <?php include 'footer.php' ?>-->
        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
