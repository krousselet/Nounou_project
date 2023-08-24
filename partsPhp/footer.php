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

<div class="footer text-center">Crée par 
  <a href="https://github.com/PandaMan16">J.François</a>, 
    <a href="https://github.com/lambert-j">J.Lambert</a>
  <a href="https://github.com/krousselet">K.Rousselet</a>
</div>
<div class="text-center">
<a href="#" >Mentions légales</a>
</div>
<script defer src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.js"></script>
<!-- <script src='https://fullcalendar.io/releases/fullcalendar/5.5.1/locales/fr.js'></script> -->
<!-- <script src="./dist/bundle.js"></script> -->
<script type="module" src="./js/app.js"></script>

</body>
</html>