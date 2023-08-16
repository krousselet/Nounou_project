  <div class="happy-body-container">
    <img src="./img/dashboard/happy-body.svg" class="moving-rect happy-body" alt="image d'une personne les bras ouverts" srcset="./img/dashboard/happy-body-desktop.svg 2048w" sizes="(max-width: 2048px) 100vw, 50vw">
    <div class="blur">
      <div class="form-container">
        <form>
          <label for="email" class="fade">Email:</label>
          <input type="email" id="email" name="email" required>
          <br>
          <label for="password" class="fade">Mot de passe:</label>
          <input type="password" id="password" name="password" required>
          <br>
          <button type="submit" class="styled-button">
          <span>Valider</span>
          </button>
          <button type="submit" class="styled-button">
          <span>Mot de passe oublié ?</span>
          </button>
        </form>  
      </div>
      <div id="calendar"></div>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.js"></script>
    <script defer>
  document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');

    const calendar = new FullCalendar.Calendar(calendarEl, {
      //Représentation sur un mois//
      initialView: 'dayGridMonth',
      events: [
        //objets pour peupler les cellules//
        {
    title: 'Jean Euze',
    start: '2023-08-15T08:00:00',
    end: '2023-08-15T09:30:00',
  },
      ],
    });

    calendar.render();
  });
  </script>
</body>
</html>