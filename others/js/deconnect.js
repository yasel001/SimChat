let btn = document.querySelector("#btnDeconnect");

btn.addEventListener("click", deconnexion);

function deconnexion(e) {
  e.preventDefault();

  sendRequest("POST", "index.php", "action=deconnexion", callbackDeco, null);
}

function callbackDeco() {
  location.href = "index.php";
}
