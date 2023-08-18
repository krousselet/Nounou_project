  <div class="happy-body-container">
  <img
  src="./img/dashboard/happy-body.svg"
  class="moving-rect happy-body"
  alt="image d'une personne les bras ouverts"
  srcset="./img/dashboard/happy-body-desktop.svg 970w, ./img/dashboard/happy-body.svg 320w"
  sizes="(min-width: 320px) and (max-width: 979px) 100vw, (min-width: 980px) and (max-width: 1920px) 970px, 100vw"
>
    <div class="blur">
      <div id="calendar"></div>
    </div>
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