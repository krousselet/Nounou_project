import { panda } from "https://pandatown.fr/lib/pandalib.js";
// import { Calendar } from '/node_modules/@fullcalendar/core/index.js';
// import dayGridPlugin from '/node_modules/@fullcalendar/daygrid/index.js';
// import timeGridPlugin from '/node_modules/@fullcalendar/timegrid/index.js';
// import listPlugin from '/node_modules/@fullcalendar/list/index.js';


const page = {
    init : function () {
        document.querySelector('.btn_d_addChild').addEventListener('click', () => {
            let form = panda.util.newelem('form',{className:"form_d_addChild  d-flex flex-column justify-content-center align-items-center mt-2"});
            form.appendChild(panda.util.newelem("h1", {textContent: "Ajouter un enfant",className: "fs-5 text-center mt-2 mb-2"})
            );
            form.appendChild(panda.util.newelem('input',{"type":"text","name":"Child_name","placeholder":"Nom de l'enfant","className": "fs-5 register-input mt-2"}));
            form.appendChild(panda.util.newelem('input',{"type":"text","name":"Child_prenom","placeholder":"Prenom de l'enfant","className": "fs-5 register-input mt-2"}));
            form.appendChild(panda.util.newelem('input',{"type":"number","name":"Child_age","placeholder":"Age de l'enfant","className": "fs-5 register-input mt-2"}));
            form.appendChild(panda.util.newelem('input',{"type":"number","name":"Child_prix","placeholder":"Tarif horaire","className": "fs-5 register-input mt-2"}));
            let sendbtn = panda.util.newelem('input',{"type":"submit","name":"Add_Child","className":"btn_d_addChildS btn btn-custom-color m-3 fs-5"});
            
            form.appendChild(sendbtn);
            document.querySelector('.blur').innerHTML = form.outerHTML;
            document.querySelector('.form_d_addChild > .btn_d_addChildS').addEventListener('click', (e) => {
              // console.log(e);
              e.preventDefault();
              let forme = document.querySelector('.form_d_addChild');
              const nom = forme.querySelector("input[name=Child_name]").value;
              const prenom = forme.querySelector("input[name=Child_prenom]").value;
              const age = forme.querySelector ("input[name=Child_age]").value;
              
              const prix = 0;
              if(type == "nounou"){
                prix = forme.querySelector("input[name=Child_prix]").value;
              }
              panda.util.log(nom+" "+prenom+" "+age+" "+prix,"gold");
              panda.ajax('./ajax/dashboard.php', {"action":"addChild","Child_name":nom,"Child_prenom":prenom,"Child_age":age,"Child_prix":prix}, (data) => {
                app.base.updatepage("Accueil");
              });
            });
          // panda.ajax('./ajax/dashboard.php', {"action":"getCharges"} , (data) => {
            
          // });
        });
        document.querySelector('.btn_d_calendar').addEventListener('click', () => {
          // document.querySelector()
          document.querySelector('.blur').querySelectorAll('& > *').forEach(element => {
            element.style.display = 'none';
          });
          calendar.style.display = '';
          this.loadcalendat();
        });
    },
    loadcalendat: function(){
      const calendarEl = document.getElementById('calendar');
      const modal = document.getElementById('eventModal');
      // let disponibiliter = {};
      
      // console.log(list);
      let calendar = new FullCalendar.Calendar(calendarEl, {
        //Représentation sur un mois//
        // plugins: [ dayGridPlugin, timeGridPlugin, listPlugin ],
        initialView: 'timeGridWeek',
        themeSystem: 'bootstrap5',
        timezone: 'local',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,dayGridWeek,listWeek'
        },
        locale: 'fr',
        events: [],
        dateClick: function(info) {
            // Affichez le formulaire lorsque l'utilisateur clique sur une date
            modal.style.display = 'block';
            calendarEl.style.display = 'none';
            // Remplissez le champ caché avec la date sur laquelle l'utilisateur a cliqué
            var eventDateInput = document.getElementById('eventDate');
            eventDateInput.value = info.dateStr;
        }  
      });

      // calendar.render();
      panda.ajax('./ajax/dashboard.php',{ action: 'getPlaning'}, (data) => {
        let planing = JSON.parse(data);
        let lists = [];
        if(planing[0].length > 0){
          planing[0].forEach(element => {
            let t_end = null;
            let list = {title: 'Disponibilité - '+planing[1]};
            let name = panda.ajax(element, )
            list.startRecur = element['jour_start'];
            
            list.startTime = element['heure_debut'];
            list.endTime = element['heure_fin'];
            if(element['repeater'] == 1){
              let day = new Date(element['jour_start']).getDay();
                // if(day == 0){
                //   day = 7;
                // }
              list.daysOfWeek = [day];
              if(element['Jour_end'] != null){
                list.endRecur = element['Jour_end'];
              }
            }
            panda.util.log(JSON.stringify(list), "gold");
            calendar.addEvent(list);
            // daysOfWeek: [1],  // 1 représente le lundi
            // startTime: '10:00',  // Heure de début
            // endTime: '12:00',  // Heure de fin
            // // Vous pouvez également ajouter d'autres propriétés comme la date de début et de fin
            // startRecur: element['jour_start'],
            // endRecur: end};
            
          });
          // console.log(lists);
          // var newEvent = {
          //   title: 'Mon événement',
          //   daysOfWeek: [1],  // 0 = Dimanche, 1 = Lundi, etc.
          //   startTime: '10:00',  // Exemple de temps de début
          //   endTime: '12:00',    // Exemple de temps de fin
          //   startRecur: '2023-08-23',
          //   endRecur: '2023-10-23'
          // };
          // calendar.addEvent(newEvent);
          // console.log(calendar);
          calendar.render();
          // calendar.refetchEvents();

          return;
        }else{
          return;
        }
      });
      document.getElementById('addEventForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const form = e.target;
        form.querySelector('input[type=submit]').disabled = true;
        const start = form.querySelector('input[name=eventDateStart]').value;
        const end = form.querySelector('input[name=eventDateEnd]').value;
        const date = form.querySelector('input[name=eventDate]').value;
        const repeat = form.querySelector('input[name=eventRepeat]').value;
        panda.ajax('./ajax/dashboard.php', {"action":"addPlaning","eventDateStart":start,"eventDateEnd":end,"eventRepeat":repeat,"eventDate":date}, (data) => {
          modal.style.display = 'none';
          calendarEl.style.display = '';
        });
      });     
    }
}

export { page };
