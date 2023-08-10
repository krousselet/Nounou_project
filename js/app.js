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

document.querySelector('#saveBook').addEventListener('click', saveNewBook);

function saveNewBook(){
    let nom = document.querySelector("#form-register #nom").value;
    let prenom = document.querySelector("#form-register #prenom").value;
    let email = document.querySelector("#form-register #email").value;
    let password = document.querySelector("#form-register #mot-de-passe").value;
    let password2 = document.querySelector("#form-register #mot-de-passe-verif").value;
    let date_naissance = document.querySelector("#form-register #naissance").value;
    let role = document.querySelector("#form-register #role").value;
    if(password!= password2){
        alert("Les mots de passe ne correspondent pas");
        return;
    }
    if(nom == "" || prenom == "" || email == "" || password == "" || password2 == "" || date_naissance == "" || role == ""){
        alert("Veuillez remplir tous les champs");
        return;
    }
    
    console.log(nom, prenom, email, password, password2, date_naissance, role);
}