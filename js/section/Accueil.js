import { panda } from 'https://pandatown.fr/lib/pandalib.js';

const page = {
    app: null,
    init : function (app) {
        this.app = app;
        document.querySelector('').addEventListener('click', () => {
            this.app.base.updatepage("Login");
        });
        document.querySelector('').addEventListener('click', () => {
            this.app.base.updatepage("Register");
        });
    }
}

export { page };