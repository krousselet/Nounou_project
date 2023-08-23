// import { page } from './js/sections/page.js';

//panda.ajax(url, data , callback)
//panda.ajax("./endpoint.php", {id:1}, (e) => {console.log("Reponse",e)})

import { panda } from 'https://pandatown.fr/lib/pandalib.js';

let app = {
    nav: {
        init: function () {
            let login = document.querySelector('nav .btn_login');
            let logout = document.querySelector('nav .btn_logout');
            let profil = document.querySelector('nav .btn_profil');
            console.log(profil);
            if (login) {
                login.addEventListener('click', (e) => {
                    e.preventDefault();
                    app.base.updatepage('Login');
                });
                document.querySelector('nav .btn_regis').addEventListener('click', (e) => {
                    e.preventDefault();
                    app.base.updatepage('Register');
                });
            }
            if (logout) {
                logout.addEventListener('click', (e) => {
                    e.preventDefault();
                    panda.ajax('./ajax/ajax.php', { action: "logout" }, (e) => {
                        if (e == "true") {
                            window.location.href = "./index.php";
                            return;
                        }
                    });
                });
                document.querySelector('nav .btn_dash').addEventListener('click', (e) => {
                    e.preventDefault();
                    app.base.updatepage('Dashboard');
                })
            }
            if (profil) {
                profil.addEventListener('click', (e) => {
                    e.preventDefault();
                    app.base.updatepage('Profil');
                })
            }
            document.querySelector('nav .btn_home').addEventListener('click', (e) => {
                e.preventDefault();
                app.base.updatepage('Accueil');
            })
        }
    },
    base: {
        updatepage: async function (page) {
            import("./section/" + page + ".js").then((module) => {
                // console.log(module);
                let newpage = module.page;
                this.page = newpage;
                let htmlpage = document.querySelector('#page');
                panda.ajax("./Page/" + page + ".php", newpage.data, (e) => {
                    htmlpage.innerHTML = e;
                });
                setTimeout(() => {
                    if (typeof type !== 'undefined') {
                        this.page.init(type)
                    } else {
                        this.page.init()
                    }
                }, 500);
            });
        }
    },
    page: null,
}
app.base.updatepage('Accueil');
app.nav.init();
