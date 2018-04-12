<?php session_start(); ?>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="barmenu">
        <a class="navbar-brand" href="accueil.php"><img src="images/bear-footprint.png" width="50" height="50" alt=""></a>
        <div class="collapse navbar-collapse d-flex justify-content-center wrapper" id="navbarSupportedContent">
            <ul class="navbar-nav menuPrincipal">
                <li class="nav-item link-wrapper accueil yes">
                    <a class="nav-link link sixth before after" href="accueil.php">Accueil</a>
                </li>
                <li class="nav-item link-wrapper staff yes">
                    <a class="nav-link link sixth before after" href="staff.php">Staff</a>
                </li>
                <li class="nav-item link-wrapper evenements yes">
                    <a class="nav-link link sixth before after" href="evenements.php">Evenements</a>
                </li>
                <?php if(isset($_SESSION['id'])){ ?>
                <li class="nav-item link-wrapper boiteAIdees yes">
                    <a class="nav-link link sixth before after" href="boiteAIdees.php">Boite à idées</a>
                </li>
                <?php } ?>
                <li class="nav-item link-wrapper photos yes">
                    <a class="nav-link link sixth before after" href="photos.php">Photos</a>
                </li>
                <li class="nav-item link-wrapper boutique yes">
                    <a class="nav-link link sixth before after" href="boutique.php">Boutique</a>
                </li>
                <?php if(isset($_SESSION['id'])){ ?>
                <li class="nav-item link-wrapper profil yes">
                    <a class="nav-link link sixth before after" href="#">Profil</a>
                </li>
                <?php if($_SESSION['groupe'] == 2){ ?>
                <li class="nav-item link-wrapper admin yes">
                    <a class="nav-link link sixth before after" href="#">Admin</a>
                </li>
                <?php } ?>
                <li class="nav-item link-wrapper deconnexion yes">
                    <a class="nav-link link sixth before after" href="script/deconnexion.php">Deconnexion</a>
                </li>
                <?php } else{ ?>
                <li class="nav-item link-wrapper connexion yes">
                    <a class="nav-link link sixth before after" href="formsConnexion.php">Connexion</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
</div>
