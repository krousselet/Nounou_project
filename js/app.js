import { panda } from 'https://pandatown.fr/lib/pandalib.php';

//panda.ajax(url, data , callback)
//panda.ajax("./endpoint.php", {id:1}, (e) => {console.log("Reponse",e)})

function getFullBook() {
    let titleLength = document.getElementById("titlesearch");
    let authorLength = document.getElementById("authorsearch");

    //LIEN DU FICHIER PHP ETFONCTION PHP
    let url = "endpoint.php?action=search";

    let xhr = new XMLHttpRequest();

    //CHOISIR GET OU POST SELON MDP
    xhr.open("GET", url, true);

    xhr.onload = function () {
        if (this.status == 200) {
            //RECUPERE LA REPONSE
            let data = JSON.parse(this.responseText);
            //INSERER CODE FONCTION
            console.log(data);
        }
    };
    xhr.send();
}

document.querySelector('#Register').addEventListener('click', Register);
document.querySelector('#Login').addEventListener('click', Login);
document.querySelector('#Logout').addEventListener('click', Logout);


function Logout(){
    panda.ajax('./ajax/ajax.php', {action:"logout"}, (e) => {
        // alert(e);
    });
}

function Login() {
    let email = document.querySelector("#form-login #email").value;
    let password = document.querySelector("#form-login #mot-de-passe").value;
    if (email == "" || password == "") {
        alert("Veuillez remplir tous les champs");
        return;
    }
    panda.ajax('./ajax/ajax.php', { action: "login", email: email, password: password }, (e) => {
        // alert(e);
    });
}

function Register() {
    let nom = document.querySelector("#form-register #nom").value;
    let prenom = document.querySelector("#form-register #prenom").value;
    let email = document.querySelector("#form-register #email").value;
    let password = document.querySelector("#form-register #mot-de-passe").value;
    let password2 = document.querySelector("#form-register #mot-de-passe-verif").value;
    let date_naissance = document.querySelector("#form-register #naissance").value;
    let role = document.querySelector("#form-register #role").value;
    let tel = document.querySelector("#form-register #tel").value;
    if (password != password2) {
        alert("Les mots de passe ne correspondent pas");
        return;
    }
    if (nom == "" || prenom == "" || email == "" || password == "" || password2 == "" || date_naissance == "" || role == "" || tel == "") {
        alert("Veuillez remplir tous les champs");
        return;
    }
    panda.ajax('./ajax/ajax.php', { action: "add", nom: nom, prenom: prenom, email: email, password: password, date_naissance: date_naissance, role: role, tel: tel }, (e) => {
        // alert(e);
    });
}