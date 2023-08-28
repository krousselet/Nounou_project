import { panda } from "https://pandatown.fr/lib/pandalib.js";
// import { Calendar } from '/node_modules/@fullcalendar/core/index.js';
// import dayGridPlugin from '/node_modules/@fullcalendar/daygrid/index.js';
// import timeGridPlugin from '/node_modules/@fullcalendar/timegrid/index.js';
// import listPlugin from '/node_modules/@fullcalendar/list/index.js';

const page = {
  app: null,
  init : function (app) {
      this.app = app;
      const dash = document.querySelector('.role-container');
      if(document.querySelector('.btn_d_addChild')){
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
            dash.innerHTML = form.outerHTML;
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
              // panda.util.log(nom+" "+prenom+" "+age+" "+prix,"gold");
              panda.ajax('./ajax/dashboard.php', {"action":"addChild","Child_name":nom,"Child_prenom":prenom,"Child_age":age,"Child_prix":prix}, (data) => {
                app.base.updatepage("Accueil");
              });
            });
          // panda.ajax('./ajax/dashboard.php', {"action":"getCharges"} , (data) => {
            
          // });
        });
      }
      if(document.querySelector('.btn_d_calendar')){
        document.querySelector('.btn_d_calendar').addEventListener('click', () => {
          // document.querySelector()
          document.querySelector('.blur').querySelectorAll('& > *').forEach(element => {
            element.style.display = 'none';
          });
          calendar.style.display = '';
          this.loadcalendat_nounou();
        });
      }
      if(document.querySelector('.btn_d_listChild')){
        document.querySelector('.btn_d_listChild').addEventListener('click', () => {
          let childsdiv = panda.util.newelem('div',{"className":""});
          childsdiv.appendChild(panda.util.newelem('h1', {textContent: "Liste des enfants",className: "fs-5 text-center mt-2 mb-2"}));
          panda.ajax('./ajax/dashboard.php', {"action":"getListChild"}, (data) => {
            let childs = JSON.parse(data);
            childs.forEach(element => {
              let child = panda.util.newelem('div',{"className":""}); //Nom Prenom Age
              child.appendChild(panda.util.newelem('p', {textContent: element.nom,className: "fs-5 text-center mt-2 mb-2"}));
              child.appendChild(panda.util.newelem('p', {textContent: element.prenom,className: "fs-5 text-center mt-2 mb-2"}));
              child.appendChild(panda.util.newelem('p', {textContent: element.age,className: "fs-5 text-center mt-2 mb-2"}));
              childsdiv.appendChild(child);
              dash.innerHTML = childsdiv.outerHTML;
            });
          });
        });
      }
      if(document.querySelector('.btn_d_DispoNounou')){
        document.querySelector('.btn_d_DispoNounou').addEventListener('click', () => {
          document.querySelector('.blur').querySelectorAll('& > *').forEach(element => {
            element.style.display = 'none';
          });
          calendar.style.display = '';
          this.loadcalendar_dispo();
        });
      }
      
    },
    loadcalendat_nounou: function(){
      const calendarEl = document.getElementById('calendar');
      const modal = document.getElementById('eventModal');
      // let disponibiliter = {};
      
      // console.log(list);
      let calendar = new FullCalendar.Calendar(calendarEl, {
        selectable: true,
        buttonText: {
          today: 'Aujourd\'hui',
          month: 'Mois',
          week: 'Semaine',
          day: 'Jour'
        },
        initialView: 'timeGridWeek',
        themeSystem: 'bootstrap5',
        timeZone: 'local',
        nowIndicator: true,
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek'
        },
        locale: 'fr',
        events: [],
        select: function(info) {
          modal.style.display = 'block';
          calendarEl.style.display = 'none';
          if(info.startStr == info.endStr){
            var eventDateInput = document.getElementById('input[name=eventDate]');
            eventDateInput.value = info.startStr;
          }else{
            var eventDateInput = document.querySelector('input[name=eventDate]');
            // console.log("date",info.start.getFullYear()+'-'+(info.start.getMonth()+1)+'-'+info.start.getDate());
            let c_1 = info.start.getFullYear()+'-';
            if(info.start.getMonth() < 10){
              c_1 += '0';
            }
            c_1 += (info.start.getMonth()+1)+'-';
            if(info.start.getDate() < 10){
              c_1 += '0';
            }
            c_1 += info.start.getDate();
            eventDateInput.value = c_1;
            // console.log(eventDateInput.value);
            let h_1 = "";
            if(info.start.getHours() < 10){
              h_1 += '0';
            }
            h_1 += info.start.getHours();
            let m_1 = "";
            if(info.start.getMinutes() < 10){
              m_1 += '0';
            }
            m_1 += info.start.getMinutes();
            let h_2 = "";
            if(info.end.getHours() < 10){
              h_2 += '0';
            }
            h_2 += info.end.getHours();
            let m_2 = "";
            if(info.end.getMinutes() < 10){
              m_2 += '0';
            }
            m_2 += info.end.getMinutes();
            document.querySelector('input[name=eventDateStart]').value = h_1+':'+m_1;
            document.querySelector('input[name=eventDateEnd]').value = h_2+':'+m_2;
          }
        }
      });

      panda.ajax('./ajax/dashboard.php',{ action: 'getPlaning'}, (data) => {
        let planing = JSON.parse(data);
        let lists = [];
        if(planing[0].length > 0){
          planing[0].forEach(element => {
            let list = {title: 'Disponibilité - '+planing[1]};
            list.startRecur = element['jour_start'];
            list.startTime = element['heure_debut'];
            list.endTime = element['heure_fin'];
            if(element['repeater'] == 1){
              let day = new Date(element['jour_start']).getDay();
              list.daysOfWeek = [day];
              if(element['Jour_end'] != null){
                list.endRecur = element['Jour_end'];
              }
            }
            // panda.util.log(JSON.stringify(list), "gold");
            calendar.addEvent(list);
          });
          calendar.render();

          return;
        }else{
          calendar.render();
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
    },
    loadcalendar_dispo: function(){
      const calendarEl = document.getElementById('calendar');
      let calendar = new FullCalendar.Calendar(calendarEl, {
        buttonText: {
          today: 'Aujourd\'hui',
          month: 'Mois',
          week: 'Semaine',
          day: 'Jour'
        },
        initialView: 'timeGridWeek',
        themeSystem: 'bootstrap5',
        timeZone: 'local',
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek'
        },
        nowIndicator: true,
        locale: 'fr',
        events: [],
        eventClick: this.ValidReserv
      });
      panda.ajax('./ajax/dashboard.php',{ action: 'getDisponibility'}, (data) => {
        let planing = JSON.parse(data);
        let lists = [];
        if(planing.length > 0){
          planing.forEach(element => {
            let list = {title: 'Disponibilité - '+element.nom+' '+element.prenom};
            list.startRecur = element['jour_start'];
            
            list.startTime = element['heure_debut'];
            list.endTime = element['heure_fin'];
            if(element['repeater'] == 1){
              let day = new Date(element['jour_start']).getDay();
              list.daysOfWeek = [day];
              if(element['Jour_end'] != null){
                list.endRecur = element['Jour_end'];
              }
            }
            list.id = element.Id_Disponibilités;
            list.name = element.nom+' '+element.prenom;
            // panda.util.log(JSON.stringify(list), "gold");
            calendar.addEvent(list);
          });
          calendar.render();
          return;
        }else{
          calendar.render();
          return;
        }
      });
    },
    ValidReserv: function(info) {
      // panda.util.log(JSON.stringify(info), "dodgerblue");
      let event = info.event; // content title start end and Id_Disponibilités(id)
      // panda.util.log(JSON.stringify(event), "dodgerblue");
      let blur = document.querySelector('.blur');
      // form choix des plusieure enfant et si tout les semaines
      let form = panda.util.newelem('form',{"className":"form-group reserve-form"});
      panda.ajax("./ajax/dashboard.php", {"action":"getListChild"}, (data) => { 
        let childs = JSON.parse(data);
        // panda.util.log(JSON.stringify(info), "dodgerblue");

        form.appendChild(panda.util.newelem('h1', {textContent: "Valiation de la réservation",className: "fs-5 text-center mt-2 mb-2"}));
        form.appendChild(panda.util.newelem('p', {textContent: "Veuillez choisir les enfants de la réservation.",className: "fs-5 text-center mt-2 mb-2"}));
        form.appendChild(panda.util.newelem('p', {textContent: "Nounou : "+event.extendedProps.name, className: "fs-5 text-center mt-2 mb-2"}));
        form.appendChild(panda.util.newelem('input',{"type":"hidden","name":"Id","value":event.id}));
        childs.forEach(element => {
          form.appendChild(panda.util.newelem('input',{"type":"checkbox","id":"child_"+element.Id_Enfants,"name":"child_"+element.Id_Enfants,"style":"display:none"}));
          form.appendChild(panda.util.newelem('label',{"htmlFor":"child_"+element.Id_Enfants,"textContent":element.nom+" "+element.prenom}));
        });
        form.appendChild(panda.util.newelem('br',{}));
        form.appendChild(panda.util.newelem('input',{"type":"checkbox","id":"allweek","name":"allweek","style":"display:none"}));
        form.appendChild(panda.util.newelem('label',{"htmlFor":"allweek","textContent":"Toutes les semaines"}));
        let validbutton = panda.util.newelem('input',{"type":"submit","value":"Valider la réservation","className":"btn btn-primary mt-2 mb-2"});
        form.appendChild(validbutton);
        blur.appendChild(form);
        validbutton.addEventListener('click',(e) => {
          e.preventDefault();
          // panda.util.log(JSON.stringify(e),"orange");
          let children = [];
          childs.forEach(element => {
            if(document.getElementById('child_'+element.Id_Enfants).checked){
              children.push(element.Id_Enfants);
            }
          });
          // panda.util.log(JSON.stringify(children),"orange");
          panda.ajax("./ajax/dashboard.php", {"action":"addReservation","Id":event.id,"allweek":document.getElementById('allweek').checked,"children":children},(data) => {
            page.app.base.updatepage("Dashboard");
          });

          // panda.ajax("./ajax/dashboard.php", {"action":"addReservation","Id":event.id,"allweek":document.getElementById('allweek').checked}, (data) => {
          //   this.app.base.updatepage("Dashboard");
          // });
        })
        document.getElementById('calendar').style.display = 'none';

      });
      
      
    }
}

export { page };
