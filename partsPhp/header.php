<?php 
include __DIR__.'/loader.php';

$session = new Session(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>I'm IN</title>
    <!-- <base href="/Nounou_project"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<script>
    <?php if($session->isLogin()){
        echo "type = '".$session->GetRole()."'";
    }?>
</script>
<nav class="navbar navbar-expand-lg bg-primary text-light">
    <div class="container-fluid">
        <!-- Logo à gauche -->
        <a class="navbar-brand text-light" href="#"><img src="./img/Logo.png" alt="Logo" height="32" loading="Nounou Project X"> Nounou Project X</a>

        <!-- Bouton pour les écrans de petite taille -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu à droite -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light btn_home" href="">Accueil</a>
                </li>
                <?php if($session->isLogin()){?>
                    <li class="nav-item">
                        <a class="nav-link text-light btn_dash">Dashboard</a>
                    </li>
                <?php }?>
                <!-- Dropdown pour le compte -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#s" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Compte
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end bg-secondary" aria-labelledby="accountDropdown">
                        <?php if($session->isLogin()) { ?>
                        <li><a class="dropdown-item btn_profil text-light" href="#">Profil</a></li>
                        <li><a class="dropdown-item btn_logout text-light" href="#">Déconnexion</a></li>
                        <?php }else{?>
                        <li><a class="dropdown-item btn_login text-light" href="#">Connexion</a></li>
                        <li><a class="dropdown-item btn_regis text-light" href="#">Inscription</a></li>
                        <?php }?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ttitre de la modal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Texte à l'intérieur de la modal
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-custom-color" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>