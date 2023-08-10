import Panda from "https://pandatown.fr/lib/pandalib.php";

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
