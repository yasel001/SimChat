let form = document.querySelector("#form");

form.addEventListener("submit", function (e) {
  e.preventDefault();

  let pseudo = document.querySelector("#pseudo");
  if (pseudo.value == "") {
    pseudo.focus();
    alert("Le pseudo ne peut être vide");
    return;
  }
  if (pseudo.value.length > 20) {
    pseudo.value = null;
    pseudo.focus();
    alert("Le pseudo ne peut faire plus de 20 caractère");
    return;
  }

  let message = document.querySelector("#msg");
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
    pseudo: pseudo.value,
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
}

function fctErrorCallback(error) {
  alert(error);
}
