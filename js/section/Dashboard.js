import { panda } from 'https://pandatown.fr/lib/pandalib.php';

const page = {
    init : function () {
                document.querySelector('.btn_d_addChild').addEventListener('click', () => {
          let form = panda.util.newelem('form',{className:""});
            form.appendChild(panda.util.newelem('input',{"type":"text","name":"Child_name","placeholder":"Nom de l'enfant"}));
            form.appendChild(panda.util.newelem('input',{"type":"number","name":"Child_prenom","placeholder":"Prenom de l'enfant"}));
            form.appendChild(panda.util.newelem('input',{"type":"number","name":"Child_age","placeholder":"Age de l'enfant"}));
            let sendbtn = panda.util.newelem('input',{"type":"submit","name":"Add_Child"});
            sendbtn.addEventListener('click', () => {
              panda.ajax('./ajax/dashboard.php', {"action":"addCharges","Child_name":form.Child_name.value,"Child_prenom":form.Child_prenom.value,"Child_age":form.Child_age.value}, (data) => {
                console.log(data);
              });
            })
            form.appendChild(sendbtn);
            document.querySelector('.blur').innerHTML = form.outerHTML;
          // panda.ajax('./ajax/dashboard.php', {"action":"getCharges"} , (data) => {
            
          // });
        });
    },
    loadcalendat: function(){
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