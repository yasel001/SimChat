let form = document.querySelector("#form");
let message = null;

form.addEventListener("submit", function (e) {
  e.preventDefault();

  message = document.querySelector("#msg");
  if (message.value == "") {
    message.focus();
    alert("Veuillez saisir votre message !");
    return;
  }
  if (message.value.length > 300) {
    message.focus();
    alert("Le message ne peut faire plus de 300 caractères !");
    return;
  }

  let jsonSendData = JSON.stringify({
    msg: message.value,
  });

  sendRequest(
    "POST",
    "index.php",
    "action=postMessage&data=" + jsonSendData,
    callbackInsert,
    fctErrorCallback
  );
});

function callbackInsert(response) {
  console.log(response);
  viderChamps();
}

function fctErrorCallback(error) {
  alert(error);
  viderChamps();
}

function viderChamps() {
  message.value = null;
}
