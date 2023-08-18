import { panda } from 'https://pandatown.fr/lib/pandalib.php';

const page = {
    init : function () {
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
    }
}

export { page };