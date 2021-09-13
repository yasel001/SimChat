let affFormInscription = document.querySelector("#inscription");
let formulaireInscription = document.querySelector(".form-inscription");

affFormInscription.addEventListener("click", afficherFormulaire);

function afficherFormulaire() {
  formulaireInscription.style.display = "flex";
  affFormInscription.style.display = "none";
  formulaireConnexion.style.display = "none";
  affFormConnexion.style.display = "block";
}
