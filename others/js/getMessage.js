function getDiscussion() {
  sendRequest(
    "GET",
    "index.php",
    "action=listeMsg",
    "",
    callbackRecup,
    fctErrorCallback
  );
}

function callbackRecup(response) {
  let tabMsg = JSON.parse(response);
  const html = tabMsg
    .reverse()
    .map(function (message) {
      return `
        <div class="message espace-bas-blanc">
        <span class="author">${message["pseudo"]}: </span>
            ${message["message"]}
        </div>


    `;
    })
    .join("");

  const blocMessages = document.querySelector("#container");
  blocMessages.innerHTML = html;
}

setInterval(() => {
  getDiscussion();
}, 500);
