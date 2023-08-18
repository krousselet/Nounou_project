// import { page } from './js/sections/page.js';

//panda.ajax(url, data , callback)
//panda.ajax("./endpoint.php", {id:1}, (e) => {console.log("Reponse",e)})

import { panda } from 'https://pandatown.fr/lib/pandalib.php';

let app = {
    nav : {
        init : function(){
            let login = document.querySelector('nav .btn_login');
            let logout = document.querySelector('nav .btn_logout');
            console.log(login);
            if(login){
                login.addEventListener('click', ()=>{
                    app.base.updatepage('Login');
                });
                document.querySelector('nav .btn_regis').addEventListener('click', ()=>{
                    app.base.updatepage('Login');
                });
            }
            if(logout){
                logout.addEventListener('click', ()=>{
                    panda.ajax('./ajax/ajax.php', { action: "logout"}, (e) => {
                        if(e == "true") {
                            window.location.href = "./index.php";
                            return;
                        }
                    });
                });
            }
        }
    },
    base : {
        updatepage : async function (page) {
            import("./section/"+page+".js").then((module)=>{
                // console.log(module);
                let newpage = module.page;
                this.page = newpage;
                let htmlpage = document.querySelector('#page');
                panda.ajax("./Page/"+page+".php", newpage.data, (e) => {
                    htmlpage.innerHTML = e;
                });
                setTimeout(()=>{this.page.init()},500);
            });
        }
    },
    page : null,
}
app.base.updatepage('Acceuil');
app.nav.init();
