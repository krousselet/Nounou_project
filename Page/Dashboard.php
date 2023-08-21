<?php include __DIR__.'/../partsPhp/loader.php';?>

<div class="happy-body-container">
  <img
  src="./img/dashboard/happy-body.svg"
  class="moving-rect happy-body"
  alt="image d'une personne les bras ouverts"
  srcset="./img/dashboard/happy-body-desktop.svg 970w, ./img/dashboard/happy-body.svg 320w"
  sizes="(min-width: 320px) and (max-width: 979px) 100vw, (min-width: 980px) and (max-width: 1920px) 970px, 100vw"
  >
    <div class="blur">
      <?php 
      
        $dashboard = new Dashboard();
        $dashboard->Display();
      ?>
      <!-- <div id="calendar"></div> -->
    </div>
  </div>

<?php
//   -- Le calendrier reste le même, il est simplement peuplé différemment en fonction des infos de la base de donnée.
//   -- Ajouter un selecteur pour nourrir le tableu en fonction des rôles utilisateur
//   -- Si l'utilisateur est nounou, le calendrier est appellé "agenda". Le sélecteur permettra donc de visualiser les disponibilités des emplacements par nounou
//   -- Si l'utilisateur est parent :

?>