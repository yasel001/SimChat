let affFormConnexion = document.querySelector("#connexion");
let formulaireConnexion = document.querySelector(".form-connexion");
let password = null;

affFormConnexion.addEventListener("click", afficherFormulaire);
function afficherFormulaire() {
  formulaireConnexion.style.display = "flex";
  formulaireInscription.style.display = "none";
  affFormConnexion.style.display = "none";
  affFormInscription.style.display = "flex";
}

formulaireConnexion.addEventListener("submit", seConnecter);
function seConnecter(event) {
  event.preventDefault();
  let pseudo = document.querySelector("#pseudoConnexion");
  if (pseudo.value == "") {
    alert("Le pseudo est vide !");
    pseudo.focus();
    return;
  }

  password = document.querySelector("#passConnexion");
  if (password.value == "") {
    alert("Le mot de passe ne peut être vide !");
    password.focus();
    return;
  }

  let jsonData = JSON.stringify({
    pseudo: pseudo.value,
    pass: password.value,
  });

  sendRequest(
    "POST",
    "index.php",
    "action=connexion&data=" + jsonData,
    callbackConnexion,
    errorCallbackConnexion
  );
}

function callbackConnexion(response) {
  console.log(response);
  location.href = "chat.php";
}

function errorCallbackConnexion(error) {
  alert(error);
  pseudo.value = null;
  password.value = null;
}
