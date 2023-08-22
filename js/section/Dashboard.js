import { panda } from "https://pandatown.fr/lib/pandalib.js";

const page = {
  init: function () {
    document.querySelector(".btn_d_addChild").addEventListener("click", () => {
      let form = panda.util.newelem("form", {
        className:
          "form_d_addChild d-flex flex-column justify-content-center align-items-center mt-2 card form-log-reg form-ajout-enfant",
      });
      form.appendChild(
        panda.util.newelem("h1", {
          textContent: "Ajouter un enfant",
          className: "fs-5 text-center mt-2 mb-2 card-title",
        })
      );
      form.appendChild(
        panda.util.newelem("input", {
          type: "text",
          name: "Child_name",
          placeholder: "Nom de l'enfant",
          className: "fs-5 register-input mt-2",
        })
      );
      form.appendChild(
        panda.util.newelem("input", {
          type: "text",
          name: "Child_prenom",
          placeholder: "Prenom de l'enfant",
          className: "fs-5 register-input mt-2",
        })
      );
      form.appendChild(
        panda.util.newelem("input", {
          type: "number",
          name: "Child_age",
          placeholder: "Age de l'enfant",
          className: "fs-5 register-input mt-2",
        })
      );
      form.appendChild(
        panda.util.newelem("input", {
          type: "number",
          name: "Child_prix",
          placeholder: "Tarif horaire",
          className: "fs-5 register-input mt-2",
        })
      );
      let sendbtn = panda.util.newelem("input", {
        type: "submit",
        name: "Add_Child",
        className: "btn_d_addChildS btn btn-custom-color m-3 fs-5",
      });

      form.appendChild(sendbtn);
      document.querySelector(".blur").innerHTML = form.outerHTML;
      document
        .querySelector(".form_d_addChild > .btn_d_addChildS")
        .addEventListener("click", (e) => {
          console.log(e);
          e.preventDefault();
          let forme = document.querySelector(".form_d_addChild");
          const nom = forme.querySelector("input[name=Child_name]").value;
          const prenom = forme.querySelector("input[name=Child_prenom]").value;
          const age = forme.querySelector("input[name=Child_age]").value;
          panda.ajax(
            "./ajax/dashboard.php",
            {
              action: "addCharges",
              Child_name: nom,
              Child_prenom: prenom,
              Child_age: age,
            },
            (data) => {
              console.log(data);
            }
          );
        });
      // panda.ajax('./ajax/dashboard.php', {"action":"getCharges"} , (data) => {

      // });
    });
  },
  loadcalendat: function () {
    const calendarEl = document.getElementById("calendar");

    const calendar = new FullCalendar.Calendar(calendarEl, {
      //Représentation sur un mois//
      initialView: "dayGridMonth",
      events: [
        //objets pour peupler les cellules//
        {
          title: "Jean Euze",
          start: "2023-08-15T08:00:00",
          end: "2023-08-15T09:30:00",
        },
      ],
    });
    calendar.render();
  },
};

export { page };
