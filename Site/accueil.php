<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS/accueil.css">
        <title>Accueil</title>
        <?php include 'script/scriptBootStrapHead.php' ?>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <section id="intro">
            <h1 id="titre">Bienvenue sur le site du BDE de l'Exia.cesi de Pau !</h1>
            <div class="container-fluid">
                <div class="row justify-content-around">
                    <div class="col-md-auto">
                        <h3 id="titreMaps">Où sommes-nous ?</h3>
                        <div id="map"></div>
                    </div>
                    <div class="col-md-auto">
                        <h3 id="titreDiscord">Rejoins notre Discord !</h3>
                        <div id="discord">
                            <iframe src="https://discordapp.com/widget?id=401825719195402240&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="assos">
            <h1 id="titreAssos">Associations</h1>
            <div class="container-fluid">
                <div class="card-deck">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jeux De Role</h5>
                            <p class="card-text">On fait des JDR et parfois des jeux de plateaux. </p>
                            <p class="card-text"><small class="text-muted">Président : Maxime Lavergne</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Squash</h5>
                            <p class="card-text">La seule Asso de Sport de école actuellement si tu veux casser le cliché de l'informaticien qui ne sort jamais et qui ne sais pas faire deux pas sans être éssoufflé viens te défouler  au squash !</p>
                            <p class="card-text"><small class="text-muted">Président : Robin Montcoutié</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Crypto</h5>
                            <p class="card-text">Excuses pour pouvoir partir le jeudi après-midi</p>
                            <p class="card-text"><small class="text-muted">Président : Jean Lacadée</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Hacking</h5>
                            <p class="card-text">Le but est de pouvoir s'exercer à la pratique d'intrusions système, élevations de privillège, faille logiciel...</p>
                            <p class="card-text"><small class="text-muted">Président : Maxime Neuville</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function initMap() {
                var pau = {lat: 43.317501, lng: -0.308964};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 18,
                    center: pau
                });
                var marker = new google.maps.Marker({
                    position: pau,
                    map: map
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtbpZd2fJeL9cJJ1SWGs6XRp-BzuL3ZU0&callback=initMap">
        </script>
        <link rel="stylesheet" href="CSS/footer.css">
        <?php include 'footer.php' ?>
        <?php include 'script/scriptBootStrapBody.php' ?>
    </body>
</html>
