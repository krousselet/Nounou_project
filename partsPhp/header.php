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

?>

<nav class="navbar bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <img src="./img/Logo.png" alt="bug" id="logo-nav">
    <a class="navbar-brand" href="#">Nounou Project X</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Se Connecter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">S'Enregistrer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Nous Contacter</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
