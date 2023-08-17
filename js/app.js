// import { page } from './js/sections/page.js';

//panda.ajax(url, data , callback)
//panda.ajax("./endpoint.php", {id:1}, (e) => {console.log("Reponse",e)})

let app = {
    base : {
        updatepage : async function (page) {
            import("./section/"+page+".js").then((module)=>{
                // console.log(module);
                let newpage = module.page;
                this.page = newpage;
                setTimeout(()=>{this.page.init()},500);
            });
        }
    },
    page : null,
}
app.base.updatepage('Login');
