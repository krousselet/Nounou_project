
import { panda } from 'https://pandatown.fr/lib/pandalib.js';

const page = {
    init: function () {
        document.querySelector('#Login').addEventListener('click', this.Login);
        // document.querySelector('#Logout').addEventListener('click', this.Logout);
        panda.util.log('page loaded');
    },
    Logout: function () {
        panda.ajax('./ajax/ajax.php', { action: "logout" }, (e) => {
            window.location.href = "./index.php";
        });
    },
    Login: function (ee) {
        ee.preventDefault();
        let email = document.querySelector("#form-login #mail-connect").value;
        let password = document.querySelector("#form-login #mdp-connect").value;
        if (email == "" || password == "") {
            alert("Veuillez remplir tous les champs");
            return;
        }
        panda.ajax('./ajax/ajax.php', { action: "login", email: email, password: password }, (e) => {
            console.log(e);
            if (e == "true") {
                window.location.href = "./index.php";
                //app.base.updatepage("Accueil");
                return;
            } else {
                // zone message error
            }
        });
    }
}

export { page };