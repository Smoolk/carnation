<?php
//en tête de toutes les pages de admin/pages
include ('lib/php/verifier_connexion.php');
?>
<nav class="navbar-default navbar-expand-md navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <img href="./index.php?page=accueil.php" src="..//admin/images/admin.png" height="60" alt="admin"/>&nbsp;
        <h1>ADMINISTRATEUR</h1>
        <span class="navbar-toggler-icon"></span>&nbsp;
        <a href="index.php?page=login.php" class="black font-weight-bold">
            <i class="fas fa-key"></i> <!-- ou autre icône -->
        </a>
    </button>


    <div class="collapse navbar-collapse navbar-inverse" id="navbarSupportedContent">
        <a href="./index.php?page=accueil.php" class="navbar-brand collapse navbar-collapse">
            <img href="./index.php?page=accueil.php" src="..//admin/images/admin.png" alt="logo" class="topLogo" height="90"/>&nbsp 
            <h1>ADMINISTRATEUR</h1>
        </a>
        <ul class="navbar-nav mr-auto">

            <a  href="./index.php?page=accueil.php"class="btn btn-success">Accueil</a>&nbsp

            <a class="btn btn-warning" href="./index.php?page=tableau.php">Tableau dynamique</a>&nbsp

            <a class="btn btn-primary" href="index.php?page=disconnect.php">Déconnexion</a>&nbsp

            <a class="btn btn-light" href="#" tabindex="-1" aria-disabled="true">Ride safe</a>

        </ul>
    </div>
</nav>
<br/>
