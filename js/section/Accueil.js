import { panda } from 'https://pandatown.fr/lib/pandalib.js';

const page = {
    app: null,
    init : function (app) {
        this.app = app;
        document.querySelector('.btn-accueil-connect').addEventListener('click', () => {
            this.app.base.updatepage("Login");
        });
        document.querySelector('.btn-accueil-register').addEventListener('click', () => {
            this.app.base.updatepage("Register");
        });
    }
}

export { page };