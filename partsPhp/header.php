<?php 
spl_autoload_register(function ($class_name) {
  $class_path = __DIR__.'/../Class/'.$class_name . '.php';
  if (file_exists($class_path)) {
      require_once $class_path;
  }else{
      echo 'Class'.$class_name.' not found';
      die();
  }
});

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

</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary text-light">
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
                <a class="nav-link text-light" href="">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="">Dashboard</a>
            </li>
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
</nav>
