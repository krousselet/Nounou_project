import { panda } from 'https://pandatown.fr/lib/pandalib.js';

const page = {
    app: null,
    init : function (app) {
        this.app = app;
        document.querySelector('#pwd_change_confirm').addEventListener('click', (i) => {
            i.preventDefault();
            let form = document.querySelector('.chg_pass > form');
            let oldpass = form.querySelector('#opwd').value;
            let newpass = form.querySelector('#pwd').value;
            let confirmpass = form.querySelector('#pwd_confirm').value;
            if(oldpass != '' || newpass != '' || confirmpass != '') {
                if(newpass == confirmpass) {
                    panda.ajax('./ajax/ajax.php',{"action":"change_password","oldpass":oldpass,"newpass":newpass},(data) => {
                        if(data == "true") {
                            this.app.base.updatepage("Profil");
                        }
                    });
                }
            }
        });
        document.querySelector('#page > .chg_pass').style.display = 'none';
        document.querySelector('#page > .card .mdp').addEventListener('click', (i) => {
            i.preventDefault();
            document.querySelector('#page > .chg_pass').style.display = '';
            document.querySelector('#page > .card').style = 'display:none!important';
        })
    }
}

export { page };