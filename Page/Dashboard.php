<?php include __DIR__.'/../partsPhp/loader.php';?>

<div class="happy-body-container">
    <div class="blur">
      <?php 
      
        $dashboard = new Dashboard();
        $dashboard->Display();
      ?>
      <!-- <div id="calendar"></div> -->
    </div>
  </div>

<embed src="./Page/aaaaa.php" type="application/pdf" style="
    width: 100%;
    height: 100vh;
">
