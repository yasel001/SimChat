let affFormConnexion = document.querySelector("#connexion");
let formulaireConnexion = document.querySelector(".form-connexion");

let pseudoConnexion = null;
let passwordConnexion = null;

affFormConnexion.addEventListener("click", afficherFormulaireConnexion);
function afficherFormulaireConnexion() {
  document.title = "SimChat - Connexion";
  formulaireConnexion.style.display = "flex";
  formulaireInscription.style.display = "none";
  affFormConnexion.style.display = "none";
  affFormInscription.style.display = "flex";
}

formulaireConnexion.addEventListener("submit", seConnecter);
function seConnecter(event) {
  event.preventDefault();
  pseudoConnexion = document.querySelector("#pseudoConnexion");
  if (pseudoConnexion.value == "") {
    alert("Le pseudo est vide !");
    pseudoConnexion.focus();
    return;
  }

  passwordConnexion = document.querySelector("#passConnexion");
  if (passwordConnexion.value == "") {
    alert("Le mot de passe ne peut être vide !");
    passwordConnexion.focus();
    return;
  }

  let jsonData = JSON.stringify({
    pseudo: pseudoConnexion.value,
    pass: passwordConnexion.value,
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
  location.href = "index.php?action=afficherChat";
}

function errorCallbackConnexion(error) {
  viderChampsConnexion();
  alert(error);
}

function viderChampsConnexion() {
  pseudoConnexion.value = null;
  passwordConnexion.value = null;
}
