
import { panda } from 'https://pandatown.fr/lib/pandalib.js';

const page = {
    init : function () {
        document.querySelector('#Register').addEventListener('click', this.Register);
        panda.util.log('page loaded');
    },
    Logout : function(){
        panda.ajax('./ajax/ajax.php', {action:"logout"}, (e) => {
            window.location.href = "./index.php";
        });
    },
    Register : function() {
        let nom = document.querySelector("#form-register-champ #nom").value;
        let prenom = document.querySelector("#form-register-champ #prenom").value;
        let email = document.querySelector("#form-register-champ #email").value;
        let password = document.querySelector("#form-register-champ #mot-de-passe").value;
        let password2 = document.querySelector("#form-register-champ #mot-de-passe-verif").value;
        let date_naissance = document.querySelector("#form-register-champ #naissance").value;
        let role = document.querySelector("#form-register-champ #role").value;
        let tel = document.querySelector("#form-register-champ #telephone").value;
        if (password != password2) {
            alert("Les mots de passe ne correspondent pas");
            return;
        }
        if (nom == "" || prenom == "" || email == "" || password == "" || password2 == "" || date_naissance == "" || role == "" || tel == "") {
            alert("Veuillez remplir tous les champs");
            return;
        }
        panda.ajax('./ajax/ajax.php', { action: "add", nom: nom, prenom: prenom, email: email, password: password, date_naissance: date_naissance, role: role, tel: tel }, (e) => {
            //zone message confirmation
            // alert(e.message);
            app.base.updatepage("Login");
        });
    }
}

export { page };