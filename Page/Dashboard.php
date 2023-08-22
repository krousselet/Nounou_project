<?php include __DIR__.'/../partsPhp/loader.php';?>

<div class="happy-body-container">
    <div class="blur">
      <?php 
      
        $dashboard = new Dashboard();
        $dashboard->Display();
      ?>
      <div id="eventModal" style="display:none;">
          <h2>Ajouter une tranche horaire</h2>
          <form id="addEventForm">
              <label for="eventDateStart">Debut:</label>
              <input type="time" name="eventDateStart">
              <label for="eventDateEnd">Fin:</label>
              <input type="time" name="eventDateEnd">
              <label for="eventRepeat">Répéter</label>
              <input type="checkbox" name="eventRepeat" id="eventRepeat">
              <input type="date" id="eventDate" name="eventDate">
              <input type="submit" value="Ajouter">
          </form>
      </div>
      <div id="calendar" style="display: none;"></div>
    </div>
  </div>

<embed src="./Page/aaaaa.php" type="application/pdf" style="
    width: 100%;
    height: 100vh;
    display: none;
">
