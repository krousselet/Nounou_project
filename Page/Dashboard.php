<?php include __DIR__.'/../partsPhp/loader.php';?>

<div class="happy-body-container">
    <div class="blur">
      <?php 
      
        $dashboard = new Dashboard();
        $dashboard->Display();
      ?>
      <div id="eventModal" class="card form-log-reg form-ajout-enfant mt-2 col-10 col-sm-8 col-md-6 col-lg-4 flex-column justify-content-center align-items-center" style="display:none; ">
          <h2 class="text-center mt-2 mb-2">Ajouter une tranche horaire</h2>
          <form class="" id="addEventForm">
              <label class="register-label" for="eventDateStart">Debut:</label>
              <input class="fs-5 register-input" type="time" name="eventDateStart">
              <label class="register-label" for="eventDateEnd">Fin:</label>
              <input class="fs-5 register-input" type="time" name="eventDateEnd">
              <div class="d-flex justify-content-center align-items-center mt-2 mb-2 ">
                <label class="register-input mb-3" for="eventRepeat">Répéter</label>
                 <input class="fs-5 register-input me-5" type="checkbox" name="eventRepeat" id="eventRepeat">
              </div>
              <label for="eventDate">Jour Commencement</label>
              <input class="fs-5 register-input" type="date" id="eventDate" name="eventDate">
              <label class="register-label" for="eventEndDate">Fin répetition</label>
              <input class="fs-5 register-input" type="date" id="eventEndDate" name="eventEndDate" value="">
              <input class="btn-custom-color fs-5 register-input" type="submit" value="Ajouter">
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
