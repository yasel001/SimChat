let affFormInscription = document.querySelector("#inscription");
let formulaireInscription = document.querySelector(".form-inscription");

let pseudoInscription = null;
let passwordInscription = null;
let passConfirmation = null;

affFormInscription.addEventListener("click", afficherFormulaireInscription);
function afficherFormulaireInscription() {
  document.title = "SimChat - Inscription";
  formulaireInscription.style.display = "flex";
  affFormInscription.style.display = "none";
  formulaireConnexion.style.display = "none";
  affFormConnexion.style.display = "block";
}

formulaireInscription.addEventListener("submit", inscrire);
function inscrire(event) {
  event.preventDefault();

  pseudoInscription = document.querySelector("#pseudoInscription");
  if (pseudoInscription.value == "") {
    alert("Le pseudo ne peut être vide !");
    pseudoInscription.focus();
    return;
  }

  passwordInscription = document.querySelector("#passInscription");
  if (passwordInscription.value == "") {
    alert("Le mot de passe ne peut être vide !");
    passwordInscription.focus();
    return;
  }

  passConfirmation = document.querySelector("#passConfirmInscription");
  if (passConfirmation.value == "") {
    alert("Le champ confirmation mot de passe ne peut être vide !");
    passConfirmation.focus();
    return;
  }

  if (passConfirmation.value !== passwordInscription.value) {
    alert("Les mots de passe ne correspondent pas !");
    passwordInscription.focus();
    passwordInscription.value = "";
    passConfirmation.value = "";
    return;
  }

  let jsonDataInscription = JSON.stringify({
    pseudo: pseudoInscription.value,
    password: passwordInscription.value,
    passwordConfirm: passConfirmation.value,
  });

  sendRequest(
    "POST",
    "index.php",
    "action=inscription&data=" + jsonDataInscription,
    callbackInscription,
    errorCallbackInscription
  );
}

function callbackInscription(response) {
  console.log(response);
  afficherFormulaireConnexion();
}

function errorCallbackInscription(error) {
  viderChampsInscription();
  alert(error);
}

function viderChampsInscription() {
  pseudoInscription.value = null;
  passwordInscription.value = null;
  passConfirmation.value = null;
}
