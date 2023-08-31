
import { panda } from 'https://pandatown.fr/lib/pandalib.js';

const page = {
    app: null,
    init : function (app) {
        this.app = app;
        document.querySelector('#Login').addEventListener('click', this.Login);
        // document.querySelector('#Logout').addEventListener('click', this.Logout);
        // panda.util.log('page loaded');
        document.querySelector('.reset_pass').addEventListener('click', (e) => {e.preventDefault(); this.ResetPass1();});
        document.querySelector('#Pass1').addEventListener('click', (e) => {
            e.preventDefault();
            let mail = document.querySelector('#mail-reset').value;
            mail = document.querySelector('#mail-reset').value;
            console.log(mail);
            panda.ajax('./ajax/ajax.php', { action: "reset_sendmail", mail: mail }, (reponse) => {
                if(reponse == "true") {
                    this.ResetPass2();
                }
            });
        });
        document.querySelector('#Pass2').addEventListener('click', (e) => {
            e.preventDefault();
            let mail = document.querySelector('#mail-reset').value;
            let code = document.querySelector('#code').value;
            if(code != "") {
                panda.ajax('./ajax/ajax.php', { action: "reset_checkCode", mail: mail, code: code }, (reponse) => {
                    if(reponse == "true") {
                        this.ResetPass3();
                    }
                });
            }else{
                alert("Veuillez remplir le code");
                return;
            }
        });
        document.querySelector('#Pass3').addEventListener('click', (e) => {
            e.preventDefault();
            let mail = document.querySelector('#mail-reset').value;
            let code = document.querySelector('#code').value;
            let pass1 = document.querySelector('#n_pass1').value;
            let pass2 = document.querySelector('#n_pass2').value;
            if(pass1 != pass2) {
                alert("Les mots de passe ne correspondent pas");
                return;
            }
            panda.ajax('./ajax/ajax.php', { action: "reset_password", mail: mail, code: code, pass: pass1 }, (reponse) => {
                if(reponse == "true") {
                    this.app.base.updatepage("Login");
                }
            });
        });
    },
    ResetPass1: function () {
        document.querySelector('#form-login').style = "display:none!important";
        document.querySelector('#reset-pass1').style.display = "";
        let mail = document.querySelector('#form-login #mail-connect').value;
        if(mail != "") {
            document.querySelector('#mail-reset').value = mail;
        }
    },
    ResetPass2: function () {
        document.querySelector('#reset-pass1').style = "display:none!important";
        document.querySelector('#reset-pass2').style.display = "";
    },
    ResetPass3: function () {
        document.querySelector('#reset-pass2').style = "display:none!important";
        document.querySelector('#reset-pass3').style.display = "";
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
        console.log(email, password);
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